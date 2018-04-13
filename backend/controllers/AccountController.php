<?php

namespace backend\controllers;


use Yii;
use common\models\User;
use backend\models\PasswordForm;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 *
 */
class AccountController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionBaseinfo()
    {
        $id = Yii::$app->user->identity->getId();
        $model = $this->findModel($id);

        $data = Yii::$app->request->post();
        if ($data) {
            $data[$model->formName()]['updated_at']  = time();
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->business_id]);
        } else {
            return $this->render('baseinfo', [
                'model' => $model,
            ]);
        }

    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSecure()
    {

        $model = new PasswordForm();
        $request = Yii::$app->request;

        if($request->isPost && $model->load(Yii::$app->request->post()) && $model->changePassword()){
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('success', '修改密码成功, 请重新登录');
            return $this->goHome();
        }else{
            return $this->render('secure',['model'=>$model]);
        }

    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
