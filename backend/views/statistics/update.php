<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticsUnique */

$this->title = '修改访客数据：' . ' ' . $model->ip;
$this->params['breadcrumbs'][] = ['label' => '统计列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ip, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改数据';
?>
<div class="statistics-unique-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
