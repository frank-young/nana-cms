<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = '新建产品';
$this->params['breadcrumbs'][] = ['label' => '产品库', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <?= $this->render('_form', [
        'model' => $model,
        'cate' => $cate,
    ]) ?>

</div>
