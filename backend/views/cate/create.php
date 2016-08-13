<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cate */

$this->title = '新建分类';
$this->params['breadcrumbs'][] = ['label' => '分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cate-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
