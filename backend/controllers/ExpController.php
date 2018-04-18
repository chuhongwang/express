<?php

namespace backend\controllers;

use backend\models\ExpressSearch;
use backend\models\HistoryRecordSearch;
use backend\models\PointSearch;
use common\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller
 */
class ExpController extends Controller
{
    public $layout               = 'single';
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $HistoryRecordSearch = new HistoryRecordSearch();
        $ExpressSearch       = new ExpressSearch();
        $PointSearch         = new PointSearch();

        $params = Yii::$app->request->queryParams;

        $list           = [];
        $express_number = '';

        if (!empty($params['express_number'])) {
            $express_number = $params['express_number'];
            $exp_list       = $ExpressSearch::find()->andFilterWhere(['express_number' => $express_number])->asArray()->one();
            if (!empty($exp_list)) {
                $exp_list['type']         = 'first';
                $exp_list['next_address'] = $PointSearch::find()->andFilterWhere(['id' => $exp_list['point_id']])->andFilterWhere(['delete_flag' => 1])->asArray()->one()['name'];
                $PointSearchRes           = $PointSearch::find()->andFilterWhere(['id' => $exp_list['point_id']])->andFilterWhere(['delete_flag' => 1])->asArray()->one();
                $exp_list['p_phone']      = $PointSearchRes['phone'];
                $exp_list['address']      = $PointSearchRes['address'];
                $list                     = '';
                $list .= '<li class="first"> <p>' . $exp_list["create_time"] . '</p> <p>['.Yii::$app->params['status'][$exp_list['state']].'] ' . $exp_list["address"] . '处理, 电话:' . $exp_list['p_phone'] . ', 下一网点:' . $exp_list['next_address'] . '</p> <span class="before"></span><span class="after"></span><i class="mh-icon mh-icon-new"></i></li> <li>';

                $rec_list = $HistoryRecordSearch::find()->andFilterWhere(['!=', 'state', $exp_list['state']])->andFilterWhere(['express_id' => $express_number])->orderBy('state asc')->asArray()->all();

                for ($i = 0; $i < count($rec_list); $i++) {
                    $rec_list[$i]['p_phone'] = '';
                    $rec_list[$i]['address'] = '';
                    $PointSearchRes          = $PointSearch::find()->andFilterWhere(['id' => $rec_list[$i]['point']])->andFilterWhere(['delete_flag' => 1])->asArray()->one();
                    $rec_list[$i]['p_phone'] = $PointSearchRes['phone'];
                    $rec_list[$i]['address'] = $PointSearchRes['address'];
                }
                foreach ($rec_list as $key => $value) {
                    $list .= '<li> <p>' . $value["date"] . '</p> <p>' . $value['address'] . '处理, 电话:' . $value['p_phone'] . '</p> <span class="before"></span><span class="after"></span></li> <li>';
                }
            }
        }
        return $this->render('index', [
            'expList'        => $list,
            'express_number' => $express_number,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
