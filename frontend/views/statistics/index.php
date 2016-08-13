<?php
/* @var $this yii\web\View */
$this->title ="测试是";
use yii\helpers\Url;

?>
<h1>statistics/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
    <button id="btn">点击我请求</button>

</p>
<script>
	<?php $this->beginBlock('statistics') ?>  
    $(function(){
    	var viewMessage = {
			/**
			 * 获取设备信息
			 */
			getDevice:function() {
		    	var patrn=/[(]{1}[\w\s\W]+[)]{1}/;
		    	var device = window.navigator.userAgent.substring(12,65).match(patrn)[0];
		    	device = device.substring(1,device.length-1);	//用户设备信息

			    if (device.indexOf("iPad") != -1) {
			        return "iPad";
			    } else if (device.indexOf("iPhone") != -1) {
			        return "iPhone";
			    } else if (device.indexOf("Android ") != -1) {
			        return "Android ";
			    } else if (device.indexOf("Windows") != -1) {
			        return "Windows";
			    } else {
			        return "ot";
			    }
			},

			/**
			 * 获取页面title
			 */
			getPageTitle:function(){
			    return document.title;
			},
			/**
			 * 获取页面url
			 */
			getPageUrl:function() {
			    return location.href;
			},
			/**
			 * 获取浏览器语言
			 */
			getBrowerLanguage:function(){
			    var lang = navigator.language;
			    return lang != null && lang.length > 0 ? lang : "";
			}

		}
		function ajaxData(url){
			var device = viewMessage.getDevice();
	   		var title = viewMessage.getPageTitle();
			var language = viewMessage.getBrowerLanguage();
			var targetUrl = location.href;
			$.ajax({
			   	type: "get",
			   	url: url+'&device='+device+'&title='+title+'&language='+language+'&url='+targetUrl,
			   	success: function(data, textStatus){
			   		console.log(data);
			   	},
			   	error: function(){

			   	}
			});
		}
		$('#btn').click(function(){
			ajaxData("index.php?r=statistics/save");
		})
		
    }) 
	<?php $this->endBlock() ?>  
	<?php $this->registerJs($this->blocks['statistics'], \yii\web\View::POS_END); ?>  
</script>