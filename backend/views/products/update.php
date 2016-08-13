<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = '编辑产品： ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '产品库', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑产品';
?>
<div class="products-update">

    <?= $this->render('_form', [
        'model' => $model,
        'cate' => $cate,
    ]) ?>

</div>
