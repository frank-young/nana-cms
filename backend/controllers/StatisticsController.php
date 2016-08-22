<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Statistics;
use common\models\StatisticsUnique;
use common\models\StatisticsUniqueSearch;
use common\models\Products;
use common\models\Inquiry;
use common\models\Heatmap;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class StatisticsController extends Controller
{   
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','data','list','update','delete'],
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
        ];
    }
    public function actionChart()
    {
        /**
         * 产品总数
         *************************************************************
         **/
        $products = Products::find()->count();
        /* 设备信息统计 */
    	$count['windows'] = Statistics::find()->andWhere(['device' => 'Windows'])->count();
    	$count['iphone'] = Statistics::find()->andWhere(['device' => 'iPhone'])->count();
    	$count['ipad'] = Statistics::find()->andWhere(['device' => 'iPad'])->count();
    	$count['android'] = Statistics::find()->andWhere(['device' => 'Android'])->count();
    	$count['other'] = Statistics::find()->andWhere(['device' => 'ot'])->count();
        /**
         * 访问量统计
         *************************************************************
         **/
        $views = [];
        $viewsUnique = [];
        for($i=1;$i<date("d");$i++){
            //获取本月的访问总次数
            $views[$i] = Statistics::find()->where(['between','time',mktime(0, 0, 0,date("m"),$i,date("Y")),mktime(0, 0, 0,date("m"),$i+1,date("Y"))])->count();
            //获取今日的访问人数
            $viewsUnique[$i] = StatisticsUnique::find()->where(['between','time',mktime(0, 0, 0,date("m"),$i,date("Y")),mktime(0, 0, 0,date("m"),$i+1,date("Y"))])->count();

        }
        //获取今天的访问次数
        $today = $views[date("d")] = Statistics::find()->where(['between','time',mktime(0, 0, 0,date("m"),date("d"),date("Y")),mktime(date("H"), date("i"), date("s"),date("m"),date("d"),date("Y"))])->count();
    	//获取今天的访问人数
        $todayUnique = $viewsUnique[date("d")] = StatisticsUnique::find()->where(['between','time',mktime(0, 0, 0,date("m"),date("d"),date("Y")),mktime(date("H"), date("i"), date("s"),date("m"),date("d"),date("Y"))])->count();
        //获取今天的询盘总数
        $mailNum = Inquiry::find()->where(['between','pubtime',mktime(0, 0, 0,date("m"),date("d"),date("Y")),mktime(date("H"), date("i"), date("s"),date("m"),date("d"),date("Y"))])->count();

        $all= Statistics::find()->count('device');
        /**
         * 地图国家统计
         *************************************************************
         **/
        $country_orign = StatisticsUnique::find()->select('country')->asArray()->all();     //原始的二维数组
        $country = [];  //存没有重复的国家数组
        foreach ($country_orign as $key => $value) {
            array_push($country, $value['country']);    //转换成一维数组
        }
        $country = array_unique($country);  //去除重复国家

        $country_data = [];
        foreach ($country as $key => $value) {      //根据country去查每个国家的数目
            $country_data[$value]=StatisticsUnique::find()->where(['country'=>$value])->count();
        }

        /* 热力图页面统计 */


        return $this->render('chart',[
        		'count'=>$count,
        		'all'=>$all,
                'views'=>$views,
                'today'=>$today,
                'viewsUnique'=>$viewsUnique,
                'todayUnique'=>$todayUnique,
                'products'=>$products,
                'country_data'=>$country_data,
                'mailNum'=>$mailNum
        	]);
    }
    public function actionView($id)
    {
        $arr = StatisticsUnique::find()->select('ip')->where(['id'=>$id])->asArray()->one();
        $model_orign = Statistics::find()->select('id,url,title,time')->where(['ip'=>$arr['ip']])->asArray()->all();
        $model = [];
        foreach ($model_orign as $key => $value) {
           $model[date('Y-m-d',$value['time'])][$key] =$value;
        }
        return $this->render('view',[
                'ip'=>$id,
                'model'=>$model, 
            ]);
    }
    public function actionIndex()
    {
        $searchModel = new StatisticsUniqueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionHeatmap($id)
    {

        $model = Statistics::find()->where(['id'=>$id])->asArray()->one();

        return $this->renderPartial('heatmap', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Statistics::deleteAll(['ip'=>$model['ip']]);
        $model->delete();
         
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = StatisticsUnique::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


