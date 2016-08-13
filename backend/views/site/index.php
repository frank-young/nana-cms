<?php

/* @var $this yii\web\View */

$this->title = '呐呐科技后台管理系统首页';
?>
<div class="site-index">

    <div class="row">
        <div class="col-sm-3">
            <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="<?=$views?>" data-suffix="" data-duration="4">
                <div class="xe-icon">
                    <i class="linecons-globe"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0</strong>
                    <span>页面访问总量</span>
                </div>
            </div>
            
        </div>
                
        <div class="col-sm-3">
            
            <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="<?=$viewsUnique?>" data-suffix="" data-duration="3">
                <div class="xe-icon">
                    <i class="linecons-user"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0</strong>
                    <span>访问总人数</span>
                </div>
            </div>
        
        </div>
        
        <div class="col-sm-3">
            
            <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="<?=$mailNum?>" data-duration="3" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-mail"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0</strong>
                    <span>今日询盘</span>
                </div>
            </div>
        
        </div>
        
        <div class="col-sm-3">
            
            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="<?=$products?>" data-prefix="" data-suffix="" data-duration="3" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-diamond"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0</strong>
                    <span>产品总数</span>
                </div>
            </div>
        
        </div>
    </div>
</div>
    <script src="js/xenon-widgets.js"></script>
    <script>
       
        <?php $this->beginBlock('toastr') ?>  
         /* 弹出提示信息 */
        
         toastr.info("呐呐科技祝您工作顺利", "欢迎来到呐呐科技");
         setTimeout(function()
        {           
            toastr.success('更多数据信息请至 统计分析 页面查看');
        }, 3000);
    <?php $this->endBlock() ?>  
    <?php $this->registerJs($this->blocks['toastr'], \yii\web\View::POS_END); ?>  
       
    </script>
