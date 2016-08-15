<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use backend\models\SignupForm;
use backend\models\Admin;
use yii\filters\VerbFilter;
use common\models\Statistics;
use common\models\StatisticsUnique;
use common\models\Products;
use common\models\Inquiry;

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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','signup','logout','adminlist'],
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

    public function actionIndex()
    {
        $views = Statistics::find()->count();
        $viewsUnique = StatisticsUnique::find()->count();
        $products = Products::find()->count();
		$mailNum = Inquiry::find()->where(['between','pubtime',mktime(0, 0, 0,date("m"),date("d"),date("Y")),mktime(date("H"), date("i"), date("s"),date("m"),date("d"),date("Y"))])->count();

        return $this->render('index',[
                'views' => $views,
                'viewsUnique' => $viewsUnique,
                'products' => $products,
                'mailNum' => $mailNum
            ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAdminlist()
    {

        $model = Admin::find()->all();

        return $this->render('adminlist', [
            'model' => $model,
        ]);
    }
}
