<?php

namespace backend\controllers;

use Yii;
use common\models\Inquiry;
use common\models\Setting;
use common\models\Carts;
use common\models\InquirySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * InquiryController implements the CRUD actions for Inquiry model.
 */
class InquiryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','delete','setting','invoice'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new InquirySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $carts = Carts::find()->where(['ip'=>$model->ip])->asArray()->all();
        return $this->render('view', [
            'model' => $model,
            'carts'=>$carts
        ]);
    }

    public function actionSetting()
    {
        $id = 1;
        $model = Setting::findOne(1);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        } 
        return $this->render('setting', [
                'model' => $model,
            ]);
    }
    public function actionInvoice($id)
    {
        $model = Carts::findOne(20);
        return $this->render('invoice', [
                'model' => $model,
            ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Inquiry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
