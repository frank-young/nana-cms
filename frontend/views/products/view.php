<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-3">
            <div class="thumbnail">
                <img width="300" src="../../backend/web/<?=$model->file?>" alt="">
            </div>
              <!-- /.thumbnail --> 

            <table id="show-data" class="table">
                <thead>
                    <tr>
                        <th>产品名</th>
                        <th>数量</th>
                        <th>其他说明</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table> 
        </div>
        <!-- /.col-md-3 -->
        <div class="col-md-9">
            <div id="inquiry" class="form-group form-inline">
                Quantity：<input id="inquiry-quantity"  type="text" class="form-control " placeholder="Quantity" value="1">
                Other：<input id="inquiry-other"  type="text" class="form-control " placeholder="Other">
                <button id="inquiry-add" type="button" class="btn btn-primary">Add</button>
            </div>
            <hr>
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'name',
                'model',
                'cId',
                'description',
                'content:ntext',
                'carton',
                'quantity',
                'weight',
                // 'putTime:datetime',
                // 'img_path',
                // 'file',
            ],
        ]) ?>
        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.row -->
    
</div>
<script>
    <?php $this->beginBlock('cart') ?>  
    function addInquiry(name,id){
        $('#inquiry-add').click(function(){
            var quantity = $('#inquiry-quantity').val(),
                other = $('#inquiry-other').val(),
                obj = {
                    'name': name,
                    'quantity': quantity,
                    'other': other,
                    'id':id
                };
            var result = addLocal(name,obj);
            viewLocal(result);
        })
    }
    /* 添加数据到 localStorage */
    function addLocal(name,obj){
            var arr = {};
            if(localStorage.getItem('inquiry') != null){
                arr = JSON.parse(localStorage.getItem('inquiry'));
            }

            arr[name]=obj;
            localStorage.setItem('inquiry',JSON.stringify(arr)); 
            return arr;
    }
    /* 读取展示数据从 localStorage */
    function viewLocal(result){
        var html;
        for(key in result){
            html += '<tr><td>'+result[key].name+'</td><td>'+result[key].quantity+'</td><td>'+result[key].other+'</td></tr>'   
        }
        
        $('#show-data>tbody').html(html);
    }

    addInquiry('<?=$model->name?>',<?=$model->id?>);
    viewLocal(JSON.parse(localStorage.getItem('inquiry')));

    <?php $this->endBlock() ?>  
    <?php $this->registerJs($this->blocks['cart'], \yii\web\View::POS_END); ?> 
</script>
