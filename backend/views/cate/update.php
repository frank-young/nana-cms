<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cate */

$this->title = '编辑分类：' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="cate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
