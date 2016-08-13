<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Inquiry */

$this->title = 'Create Inquiry';
$this->params['breadcrumbs'][] = ['label' => 'Inquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-create">
	<h1><?= Html::encode($this->title) ?></h1>

	<div class="row">
		<div class="col-md-8">
			 <table id="show-data" class="table">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Other</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
		</div>
		<!-- /.col-md-7 -->
		<div class="col-md-4">
			<h4>Checkout</h4>
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
		<!-- /.col-md-5 -->
	</div>
	<!-- /.row -->
    

</div>
<script>
	<?php $this->beginBlock('carts') ?>  
	/* 显示localstroge数据 */
	function viewLocal(result){
        var html;
        for(key in result){
        	html += '<tr data-id="'+key+'"><td>'+result[key].name+'</td><td><input class="form-control" type="text" value="'+result[key].quantity+'"></td><td>'+result[key].other+'</td><td><a href="javascript:;" class="js-remove"><i class="fa fa-trash"></i>remove</td></a></tr>'   
        }
        
        $('#show-data>tbody').html(html);
	}
	
	/* 删除栏目 */
	function deleteLocal(){
		$('.js-remove').on('click',function(){
			$(this).parent().parent().remove();
			var data = JSON.parse(localStorage.getItem('inquiry'));		//先取出数据
			delete data[$(this).parent().parent().attr('data-id')];		//删除某一条值
			localStorage.setItem('inquiry',JSON.stringify(data)); 		//再次存数据
		})
	}

	/* ajax 发送商品数据 */
	function ajaxLocal () {
		csrfToken = $("#_csrf").val();
		var localdata = JSON.parse(localStorage.getItem('inquiry'));
		$.ajax({
		    type: "POST",
		    url: "<?= Yii::$app->UrlManager->createUrl(['inquiry/localdata']); ?>",
		    data: {
		    		'YII_CSRF_TOKEN':csrfToken,
		    		'localdata':localdata
		    	   },
		        success: function(msg){
		        	localStorage.removeItem('inquiry');		//成功的情况就删除本地询盘数据
		        }
		    });
	}

	viewLocal(JSON.parse(localStorage.getItem('inquiry')));
	deleteLocal();
	$('.js-btn').click(function(){
		ajaxLocal();
	});

	<?php $this->endBlock() ?>  
    <?php $this->registerJs($this->blocks['carts'], \yii\web\View::POS_END); ?> 
	/* 读取展示数据从 localStorage */
    
</script>