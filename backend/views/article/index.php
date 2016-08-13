<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建文章', ['create'], ['class' => 'btn btn-turquoise']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭分页
            'firstPageLabel'=>"首页",
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'lastPageLabel'=>'尾页',
         ],
        'columns' => [
            'title',
            'description',
            // 'content:ntext',
            // 'tags',
            'date',
            'views',
            // 'status',

            [
              'class' => 'yii\grid\ActionColumn',
              'header' => '操作', 
              'template' => '{view}{update}{delete} ',
              'headerOptions' => ['width' => '200'],
              'buttons' => [
                'view' => function($url, $model, $key){
                   return Html::a('<i class="fa fa-eye"></i> 查看',
                        ['view', 'id' => $key], 
                        [
                         'class' => 'btn btn-turquoise btn-xs',
                        ]
                   );
                 }, 
                 'update' => function($url, $model, $key){
                   return Html::a('<i class="fa fa-edit"></i> 编辑',
                        ['update', 'id' => $key], 
                        [
                         'class' => 'btn btn-info btn-xs',
                        ]
                   );
                 }, 
                'delete' => function($url, $model, $key){
                   return Html::a('<i class="fa fa-remove"></i> 删除',
                        ['delete', 'id' => $key], 
                        [
                         'class' => 'btn btn-pink btn-xs',
                         'data' => ['confirm' => '您确定要删除这篇文章吗？','method'=>'post','pjax'=>'0']
                        ]
                   );
                 },                    
               ],
            ],
        ],
    ]); ?>

</div>
