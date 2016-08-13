<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Setting */

$this->title = '站点设置: ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
