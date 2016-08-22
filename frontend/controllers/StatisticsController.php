<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Statistics;
use common\models\StatisticsUnique;

class StatisticsController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

 	public function actionSave()
    {
    	$request = Yii::$app->request;
    	if ($request->isAjax) { 
			$data = new Statistics;
            $dataUnique = new StatisticsUnique;

			$dataUnique['ip'] = $data['ip'] = $request->userIP;
    		$dataUnique['device'] = $data['device'] = $request->get('device');
    		$dataUnique['language'] = $data['language'] = $request->get('language');
    		$data['title'] = $request->get('title');
    		$dataUnique['time'] = $data['time'] = strtotime("now");
    		$data['url'] = $request->get('url');
    		/* 获取国家、省份、城市*/
    		$sina = @file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=".$data['ip']);
			$sina = substr($sina,21,-1);	//固定的截取转换json
			$json = json_decode($sina,true);

			$dataUnique['country'] = $data['country'] = $json['country'];
			$dataUnique['province'] = $data['province'] = $json['province'];
			$dataUnique['city'] = $data['city'] = $json['city'];

            /* 热力图信息 */
            $data['width'] = $request->get('pageWidth');
            $data['height'] = $request->get('pageHeight');
            $data['point'] = $request->get('point');

			if($data->validate()){
				$data->save();
			}

            if($dataUnique->validate()){
                $dataUnique->save();
            }

    	}
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = [
                'success'=>"1",
                'msg'=>"数据统计成功"
                ];
            return $data;
    }

}
