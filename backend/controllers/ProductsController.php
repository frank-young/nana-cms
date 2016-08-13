<?php

namespace backend\controllers;

use Yii;
use common\models\Products;
use common\models\Image;
use common\models\ProductsSearch;
use common\models\Cate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete','upload'],
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
    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $cate = Cate::find()->where(['id'=>$id])->asArray()->one();
        $image = Image::find()->where(['pid'=>$id])->asArray()->all();
        return $this->render('view', [
            'model' => $model,
            'cate' => $cate,
            'image' => $image
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        $cate = Cate::find()->asArray()->all();
        $cate_data = [];
        foreach ($cate as $key => $value) {
            $cate_data[$value['id']] = $value['cName'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                $files= UploadedFile::getInstances($model, 'file');
                //图片插入数据库时的路径，在Uploads下以当天日期为文件名，前提是在basic/web/下新建images/Uploads文件夹
                $insert_path ='Uploads/'. date('Y-m-d' , time()) . '/';

                // 图片保存在本地的路径：images/Uploads/当天日期/文件名，默认放置在basic/web/下
                $base_path = 'images/'. $insert_path;
                foreach ($files as $file) {
                    if ($files&& $model->validate()) 
                    {  
                        // 如果路径中的文件夹不存在，则新建这一文件夹
                        if(!is_dir($base_path)) {
                            mkdir($base_path , 0777);
                        }  

                        // 将图片上传到本地
                        $file->saveAs($base_path . md5($file) . '.' . $file->extension);

                        // 为了方便在view中遍历出来，在数据库以“当天日期/文件名”形式保存
                        $file= $base_path . md5($file) . '.' . $file->extension;
                    }
                    // 保存数据
                    $imgModel = new Image();
                    $imgModel->file = $file;
                    $imgModel->pid = $model->id;
                    $imgModel->save();
                }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
                'cate' => $cate_data,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cate = Cate::find()->asArray()->all();
        // print_r($cate);
        $cate_data = [];
            
        if ($model->load(Yii::$app->request->post())) {

                $model->file= UploadedFile::getInstance($model, 'file');
                //图片插入数据库时的路径，在Uploads下以当天日期为文件名，前提是在basic/web/下新建images/Uploads文件夹
                $insert_path ='Uploads/'. date('Y-m-d' , time()) . '/';

                // 图片保存在本地的路径：images/Uploads/当天日期/文件名，默认放置在basic/web/下
                $base_path = 'images/'. $insert_path;
                 
                if ($model->file&& $model->validate()) 
                {  

                    // 如果路径中的文件夹不存在，则新建这一文件夹
                    if(!is_dir($base_path)) {
                        mkdir($base_path , 0777);
                    }  

                    // 将图片上传到本地
                    $model->file->saveAs($base_path . md5($model->file) . '.' . $model->file->extension);

                    // 为了方便在view中遍历出来，在数据库以“当天日期/文件名”形式保存
                    $model->file= $base_path . md5($model->file) . '.' . $model->file->extension;
                }
                // 保存数据
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            foreach ($cate as $key => $value) {
                $cate_data[$value['id']] = $value['cName'];
            }
            return $this->render('update', [
                'model' => $model,
                'cate' => $cate_data,
            ]);
             // print_r($cate_data);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpload()
    {

        $model = new Image();

        if ($model->load(Yii::$app->request->post())) 
        {

            $files= UploadedFile::getInstances($model, 'file');
            print_r($files);
            //图片插入数据库时的路径，在Uploads下以当天日期为文件名，前提是在basic/web/下新建images/Uploads文件夹
            $insert_path ='Uploads/'. date('Y-m-d' , time()) . '/';

            // 图片保存在本地的路径：images/Uploads/当天日期/文件名，默认放置在basic/web/下
            $base_path = 'images/'. $insert_path;

            foreach ($files as $file) {
                if ($file&& $model->validate()) {
                    // 如果路径中的文件夹不存在，则新建这一文件夹
                    if(!is_dir($base_path)) {
                        mkdir($base_path , 0777);
                    }  

                    // 将图片上传到本地
                    
                        $file->saveAs($base_path . md5(uniqid()) . '.' . $file->extension);
                        // 为了方便在view中遍历出来，在数据库以“当天日期/文件名”形式保存
                        $file = $insert_path . md5(uniqid()) . '.' . $file->extension;
                    
                }
                $model = new Image();
                $model->file = $file;
                // 保存数据
                $model->save();
                if ( $model->save()) {
                    echo "成功";
                }else{
                    echo "失败";
                }
            }
            
           
        }
        return $this->render('upload', ['model' => $model]);
        
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
