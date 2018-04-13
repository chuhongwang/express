<?php

namespace backend\controllers;

use common\components\DateHelper;
use common\models\HistoryRecord;
use Yii;
use common\models\Express;
use backend\models\ExpressSearch;
use common\components\StringHelper;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ExpressController implements the CRUD actions for Express model.
 */
class ExpressController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'only' => ['delete-ajax'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ]
            ],
        ];
    }

    /**
     * Lists all Express models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Express model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Express model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Express();
        $model->express_number=StringHelper::getRandomNumString(16);
        $model->create_time=DateHelper::getDateTime();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //添加成功以后插入到快递流转表
            $history_model=new HistoryRecord();
            $history_model->state=1;
            $history_model->date=DateHelper::getDate();
            $history_model->express_id=$model->express_number;
            $history_model->point=$model->point_id;
            $history_model->create_time=DateHelper::getDateTime();
            $history_model->save();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Express model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $params=Yii::$app->request->post();
        $model=new ExpressSearch();
        $res=$model->EditExpress($params);
        if ($res) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Express model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Express model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Express the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Express::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     *class:${name}
     *user:褚红旺
     * 回显信息
     */
    public function actionData(){
        $params=Yii::$app->request->queryParams;
        $model=new ExpressSearch();
        $res=$model->getData($params);
        if($res){
            return $this->render('update',['model'=>$model]);
        }else{
            return $this->redirect('index');
        }
    }

    public function actionDeleteAjax()
    {
        $post = YII::$app->request->post();
        $json = ['code' => 0, 'id' => $post['id']];
        if (empty($post['id'])) {
            return ['code' => 1, 'message' => '输入参数错误'];
        }
        $rs = new ExpressSearch();
        $rs->getDelete($post['id'], $post['delete_flag']);
        if ($rs) {
            return $json;
        } else {
            return ['code' => 1, 'message' => '删除失败'];
        }
    }
}
