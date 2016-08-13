<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Inquiry */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '询盘管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-view">

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除这条询盘吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'subject',
            'description:ntext',
            'email:email',
            // 'phone',
            'country',
            // 'address',
            'ip',
            // 'pubtime:datetime',
            // 'facebook',
            // 'twitter',
            // 'sns',
            // 'url:url',
            // 'page',
            // 'status',
        ],
    ]) ?>
    <?php 
        foreach ($carts as $key => $value) {
            echo $value['name'];
            echo $value['quantity'];
            echo $value['other'];
            echo '<br>';
            echo date('Y-m-d H:i:s',$value['time']);
        }
    ?>
</div>
