<?php

namespace frontend\controllers;

use Yii;
use common\models\Inquiry;
use common\models\Setting;
use common\models\Carts;
use common\models\StatisticsUnique;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InquiryController implements the CRUD actions for Inquiry model.
 */
class InquiryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Creates a new Inquiry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Inquiry();
        $result = Yii::$app->request->post();
        if ($model->load($result) ) {

            $request = Yii::$app->request;
            /* 邮件发送 */
            $country = StatisticsUnique::find()->where(['ip'=>$request->userIP])->one();
            $setting = Setting::findOne(1); //获取管理员邮箱
            $model['country'] = $country['country'].' '.$country['province'].' '.$country['city'];   //设置国家，城市
            $model['ip'] = $request->userIP;
            $subject = $result['Inquiry']['subject'];   //邮件主题
            $body =         '--------------------- 询盘邮件 ---------------------'
                            .'<br><br>主题：'.$result['Inquiry']['subject']
                            .'<br>姓名：'.$result['Inquiry']['name']
                            .'<br>国家：'.$model['country']
                            .'<br>IP地址： '.$model['ip']
                            .'<br><br>询盘内容：'.$result['Inquiry']['description']
                            .'<br><br>进入页面查看详情：<a href="'.$request->hostInfo.'/nana/backend/web/index.php?r=inquiry/index">查看详情</a>'
                            .'<br><br><br>---------------------呐呐科技祝您有一笔大订单！';   //拼接邮件内容
            $messages[] = Yii::$app->mailer->compose()
                ->setFrom(['yangjunalns@qq.com' => 'nana科技'])   //只能以服务器的邮箱发送
                ->setTo($setting->admin_email)  //从数据库获取
                ->setSubject($subject)
                ->setHtmlBody($body);
            Yii::$app->mailer->sendMultiple($messages);
            $model->pubtime = strtotime("now");
            $model->save();
            return $this->redirect(['info']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionInfo()
    {
        return $this->render('info');
    }
    public function actionLocaldata()
    {
        $request = Yii::$app->request;
        
        if ($request->isAjax) { 
            $data = $request->post('localdata');
            foreach ($data as $key => $value) {
                $model = new Carts();
                $model['product_id'] = $value['id'];
                $model['name'] = $value['name'];
                $model['quantity'] = $value['quantity'];
                $model['other'] = $value['other'];
                $model['time'] = strtotime("now");
                $model['ip'] = $request->userIP;
                $model->save();
            }
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = [
                'success'=>"1",
                ];
            return $data;
    }

}
