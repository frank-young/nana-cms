<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
    /* 页面访问信息统计 */
    <?php $this->beginBlock('statistics') ?>  
    $(function(){
        var viewMessage = {
            /**
             * 获取设备信息
             */
            getDevice:function() {
                var patrn=/[(]{1}[\w\s\W]+[)]{1}/;
                var device = window.navigator.userAgent.substring(12,65).match(patrn)[0];
                device = device.substring(1,device.length-1);   //用户设备信息

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
                // success: function(data){
                //     console.log(data);
                // },
                // error: function(){

                // }
            });
        }
        // $('#btn').click(function(){
            ajaxData("index.php?r=statistics/save");
        // })
        
    }) 
    <?php $this->endBlock() ?>  
    <?php $this->registerJs($this->blocks['statistics'], \yii\web\View::POS_END); ?>  
</script>
</body>
</html>
<?php $this->endPage() ?>
