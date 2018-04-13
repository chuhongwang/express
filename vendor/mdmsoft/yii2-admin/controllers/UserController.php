<?php

namespace mdm\admin\controllers;

use mdm\admin\components\Helper;
use mdm\admin\models\form\ChangePassword;
use mdm\admin\models\form\Login;
use mdm\admin\models\form\PasswordResetRequest;
use mdm\admin\models\form\ResetPassword;
use mdm\admin\models\form\Signup;
use mdm\admin\models\searchs\User as UserSearch;
use mdm\admin\models\UmpDepartment as UmpDepartmentModel;
use mdm\admin\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\base\UserException;
use yii\filters\VerbFilter;
use yii\mail\BaseMailer;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * User controller
 */
class UserController extends Controller
{
    private $_oldMailPath;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'access' => [
            //                'class' => AccessControl::className(),
            //                'rules' => [
            //                    [
            //                        'actions' => ['signup', 'reset-password', 'login', 'request-password-reset'],
            //                        'allow' => true,
            //                        'roles' => ['?'],
            //                    ],
            //                    [
            //                        'actions' => ['logout', 'change-password', 'index', 'view', 'delete', 'activate'],
            //                        'allow' => true,
            //                        'roles' => ['@'],
            //                    ],
            //                ],
            //            ],
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete'   => ['post'],
                    'logout'   => ['post'],
                    'activate' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->has('mailer') && ($mailer = Yii::$app->getMailer()) instanceof BaseMailer) {
                /* @var $mailer BaseMailer */
                $this->_oldMailPath = $mailer->getViewPath();
                $mailer->setViewPath('@mdm/admin/mail');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if ($this->_oldMailPath !== null) {
            Yii::$app->getMailer()->setViewPath($this->_oldMailPath);
        }
        return parent::afterAction($action, $result);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel   = new UserSearch();
        $dataProvider  = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionReset($id)
    {
        if ($id) {
            $user = User::findOne($id);
            $user->setPassword('123456');
            $user->generateAuthKey();
            if ($user->save()) {
                Yii::$app->session['message'] = '重置成功';
                $this->redirect('index');
            } else {
                Yii::$app->session['message'] = '重置失败';
                $this->redirect('index');
            }
        }

    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Login
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * Signup new user
     * @return string
     */
    public function actionSignup()
    {
        $model = new Signup();

        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                return $this->redirect('index');
            }
        }

        return $this->render('signup', [
            'model'       => $model,
        ]);
    }
    /**
     * 获取一级部门
     */
    public function getOneDepartment()
    {
        $html = '<select id="signup-one_de" class="form-control" name="Signup[one_de]"><option value="">请选择一级部门</option>';
        $res  = UmpDepartmentModel::find()->andFilterWhere(['delete_flag' => 1])->andFilterWhere(['pid' => 0])->asArray()->all();
        if (!empty($res)) {
            foreach ($res as $key => $value) {
                $html .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
            }
        }
        $html .= '</select>';

        return $html;
    }
    /**
     * ajax获取二级部门
     */
    public function actionAjaxTowDepartment($id, $type = 1)
    {
        $res = UmpDepartmentModel::find()->andFilterWhere(['delete_flag' => 1])->andFilterWhere(['pid' => $id])->asArray()->all();
        if (!empty($res)) {
            if ($type == 1) {
                $html = '<select id="signup-two_de" style="margin-top:15px;" class="form-control" name="Signup[two_de]"><option value="">请选择二级部门</option>';
            } else {
                $html = '<select id="user-two_de" style="margin-top:15px;" class="form-control" name="User[two_de]"><option value="">请选择二级部门</option>';
            }

            foreach ($res as $key => $value) {
                $html .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
            }

            $html .= '</select>';

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['select' => $html];
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['select' => 0];
    }
    /**
     * Request reset password
     * @return string
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Activate new user
     * @param integer $id
     * @return type
     * @throws UserException
     * @throws NotFoundHttpException
     */
    public function actionActivate($id)
    {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == User::STATUS_INACTIVE) {
            $user->status = User::STATUS_ACTIVE;
            if ($user->save()) {
                return $this->goHome();
            } else {
                $errors = $user->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->goHome();
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        $post = Yii::$app->request->post();
        if ($model->load($post) ) {
            if($model->pass){
                $model->setPassword($model->pass);
                $model->generateAuthKey();
            }
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'   => $model,
            ]);
        }
    }
    /**
     * 获取修改时的部门列表
     */
    public function getUpdDeList($department)
    {
        $de_str_arr = explode(',', $department);
        $html[0]    = '<select id="user-one_de" class="form-control" name="User[one_de]"><option value="">请选择一级部门</option>';
        $one_de_res = UmpDepartmentModel::find()->andFilterWhere(['delete_flag' => 1])->andFilterWhere(['pid' => 0])->asArray()->all();
        if (!empty($one_de_res)) {
            foreach ($one_de_res as $key => $value) {
                if ($de_str_arr[0] == $value['id']) {
                    $html[0] .= '<option selected value="' . $value['id'] . '">' . $value['name'] . '</option>';
                } else {
                    $html[0] .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                }
            }
        }
        $html[0] .= '</select>';

        $html[1]    = '';
        $two_de_res = UmpDepartmentModel::find()->andFilterWhere(['delete_flag' => 1])->andFilterWhere(['pid' => $de_str_arr[0]])->asArray()->all();

        if (!empty($two_de_res) && !empty($de_str_arr[0])) {
            $html[1]       = '<select id="user-two_de" style="margin-top:15px;" class="form-control" name="User[two_de]"><option value="">请选择二级部门</option>';
            $de_str_arr[1] = empty($de_str_arr[1]) ? null : $de_str_arr[1];
            foreach ($two_de_res as $key => $value) {
                if ($de_str_arr[1] == $value['id']) {
                    $html[1] .= '<option selected value="' . $value['id'] . '">' . $value['name'] . '</option>';
                } else {
                    $html[1] .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                }
            }
            $html[1] .= '</select>';
        }

        return $html;
    }
}
