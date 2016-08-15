<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加管理员', ['signup'], ['class' => 'btn btn-turquoise']) ?>
    </p>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>用户名</th>
          <th>邮箱</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($model as $key => $value): ?>
            <tr>
              <td><?=$value->username ?></td>
              <td><?=$value->email ?></td>
            </tr>
        <?php endforeach;?>
      </tbody>
    </table>

</div>
