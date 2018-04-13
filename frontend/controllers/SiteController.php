<?php

namespace frontend\controllers;

use common\components\ApiData;
use linslin\yii2\curl\Curl;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->session->get('_id')) {
            return $this->redirect('/site/login');
        }
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (Yii::$app->session->get('_id')) {
            return $this->goHome();
        }
        $model = new LoginForm();
        $post = Yii::$app->request->post();
        if ($post) {
            $options['email'] = $post['LoginForm']['email'];
            $options['password'] = $post['LoginForm']['password'];
            list($data, $curl) = $this->getorpInfoCreate($options);
            if ($data['err_code'] == 1000) {
                Yii::$app->session->set('_id', $data['user_email']);
                $temp = $curl->responseHeaders['Set-Cookie'];
                Yii::$app->response->headers->set('Set-Cookie', $temp);//添加页面cookie
            }
        }
        $err_msg = isset($data) ? $data['err_msg'] : '';
        if (Yii::$app->session->get('_id')) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
                'err_msg' => $err_msg,
            ]);
        }
    }

    /**
     * 登陆接口
     * @param email
     * @param passsword
     * @return mixed
     */
    public function getorpInfoCreate($options)
    {
        $url = Yii::$app->params['api_frontend']['address'] . Yii::$app->params['api_frontend']['login'];
        $options['key'] = yii::$app->params['api_key']['corpInfo_key'];
        $key = 'UMP-KEY';
        $apiData = new ApiData();
        list($data, $curl) = $apiData->postCurl($url, $key, $options);
        return [$data, $curl];
    }


    /**
     * 退出登录
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->session->set('_id', '');
        return $this->redirect('login');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
