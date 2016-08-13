<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '产品库', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-turquoise']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-pink',
            'data' => [
                'confirm' => '您确定要删除这件产品吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php foreach ($image as $key => $value){ ?>

        <img width="300" src="<?= $value['file'] ?>" alt="">
    <?php }?>
    
    <!-- <p>产品分类：<?echo $cate['cName']?></p>  -->
    <?= DetailView::widget([
        'model' => $model,
        // 'cate' =>$cate,
        'attributes' => [
            // 'id',
            'name',
            'model',
            // 'cId',
            'description:ntext',
            'carton',
            'quantity',
            'weight',
            // 'putTime:datetime',
        ],
    ]) ?>

</div>
