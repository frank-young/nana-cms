<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use yii\widgets\Pjax;  
use common\widgets\Alert;

AppAsset::register($this);
$this->params['email_num']=0;
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
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        .logo a{
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            font-family: '微软雅黑';
            font-weight: 300;
        }
        body{
            font-family: '微软雅黑';
            font-weight: 300;
        }
    </style>
</head>
<body class="page-body">
<?php $this->beginBody() ?>
 
    <div class="settings-pane">
            
        <a href="#" data-toggle="settings-pane" data-animate="true">
            &times;
        </a>
        
    </div>

    <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
            
        <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
        <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
        <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
        <div class="sidebar-menu toggle-others fixed">
            
            <div class="sidebar-menu-inner">    
                
                <header class="logo-env">
                    
                    <!-- logo -->
                    <div class="logo">
                        <a href="dashboard-1.html" class="logo-expanded">
                            <!-- 呐呐科技CMS系统 -->
                        </a>
                        
                        <a href="dashboard-1.html" class="logo-collapsed">
                            <!-- 呐呐科技CMS系统 -->
                        </a>
                    </div>
                    
                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-success">7</span>
                        </a>
                        
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>          
                </header>
                        
                        
                <ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

                            <li>
                                <?= Html::a('<i class="linecons-globe"></i><span class="title">统筹全局</span>', ['site/index'])
                                ?>
                            </li>

                    
                    <li>
                        <a href="index.php?r=products%2Findex">
                            <i class="linecons-diamond"></i>
                            <span class="title">产品库</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">全部产品</span>', ['products/index'])
                                ?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">产品分类</span>', ['cate/index'])
                                ?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">新建产品</span>', ['products/create'])
                                ?>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=inquiry/index">
                            <i class="linecons-star"></i>
                            <span class="title">询盘管理</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">询盘列表</span>', ['inquiry/index'])
                                ?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">询盘设置</span>', ['inquiry/setting'])
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=article/index">
                            <i class="linecons-star"></i>
                            <span class="title">文章管理</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">文章列表</span>', ['article/index'])
                                ?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">添加文章</span>', ['article/create'])
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=statistical%2Findex">
                            <i class="linecons-database"></i>
                            <span class="title">统计分析</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">数据统计</span>', ['statistics/index'])?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">图表统计</span>', ['statistics/chart'])?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=site%2Findex">
                            <i class="linecons-database"></i>
                            <span class="title">管理员设置</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">管理员列表</span>', ['site/index'])
                                ?>
                            </li>
                            <li>
                                <?= Html::a('<span class="title">添加管理员</span>', ['site/signup'])
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=setting%2Findex">
                            <i class="linecons-database"></i>
                            <span class="title">站点设置</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<span class="title">站点设置</span>', ['setting/index'])
                                ?>
                            </li>
                        </ul>
                    </li>                
                </ul>
                <!-- ./ul    -->
            </div>
            
        </div>

        
        <div class="main-content">
                    
            <!-- User Info, Notifications and Menu Bar -->
            <nav class="navbar user-info-navbar" role="navigation">
                
                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">
                    
                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>
                    <?php if($this->params['email_num'] !=0):?>
                    <li class="dropdown hover-line">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa-envelope-o"></i>
                            <span class='badge badge-green'><?=$this->params['email_num']?></span>
                        </a>
                        
                        <ul class="dropdown-menu messages">
                            <li>
                                    
                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <?php foreach($this->params['model'] as $value):?>
                                    <li class="active"><!-- "active" class means message is unread -->
                                        <a href="bb.php">
                                            <span class="line">
                                                <strong>主题: <?=Html::encode($value->subject);?></strong>
                                            </span>
                                            
                                            <span class="line desc small">
                                                邮箱: <?=Html::encode($value->email);?>
                                                <span class="light small">&nbsp;&nbsp;时间: <?php echo date("m-d",$value->pubtime);?></span>

                                            </span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                                
                            </li>
                            
                            <li class="external">
                                <?= Html::a('<span>全部询盘</span><i class="fa-link-ext"></i>', ['inquiry/index'])?>
                            </li>
                        </ul>
                    </li>
                <?php else:?>
                    <li class="hover-line">
                        <?= Html::a('<i class="fa-envelope-o"></i>', ['inquiry/index'])?>
                    </li>
                    <?php endif;?>
                    <li class="dropdown hover-line">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-purple">7</span>
                        </a>
                            
                        <ul class="dropdown-menu notifications">
                            <li class="top">
                                <p class="small">
                                    <a href="#" class="pull-right">Mark all Read</a>
                                    您有 <strong>3</strong> 个新任务
                                </p>
                            </li>
                            
                            <li>
                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                    <li class="active notification-success">
                                        <a href="#">
                                            <i class="fa-user"></i>
                                            
                                            <span class="line">
                                                <strong>新订单</strong>
                                            </span>
                                            
                                            <span class="line small time">
                                                30 秒之前
                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="active notification-secondary">
                                        <a href="#">
                                            <i class="fa-lock"></i>
                                            
                                            <span class="line">
                                                <strong>有一封新询盘</strong>
                                            </span>
                                            
                                            <span class="line small time">
                                                3 小时之前
                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="notification-primary">
                                        <a href="#">
                                            <i class="fa-thumbs-up"></i>
                                            
                                            <span class="line">
                                                <strong>新任务</strong>
                                            </span>
                                            
                                            <span class="line small time">
                                                2 分钟之前
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                            <li class="external">
                                <a href="#">
                                    <span>查看全部任务</span>
                                    <i class="fa-link-ext"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
                
                
                <!-- Right links for user info navbar -->
                <ul class="user-info-menu right-links list-inline list-unstyled">
                    
                    <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
                        
                        <form method="get" action="extra-search.html">
                            <input type="text" name="s" class="form-control search-field" placeholder="搜索客户、邮件..." />
                            
                            <button type="submit" class="btn btn-link">
                                <i class="linecons-search"></i>
                            </button>
                        </form>
                        
                    </li>
                    <li class="dropdown user-profile" style="margin-right: 30px;">
                        <a href="#" data-toggle="dropdown">
                            <img src="images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                            <span>

                                <?echo Yii::$app->user->identity->username?>
                                <i class="fa-angle-down"></i>
                            </span>
                        </a>
                        
                        <ul class="dropdown-menu user-profile-menu list-unstyled" style="z-index:1000;">
                            <li>
                                <?= Html::a('<i class="fa-edit"></i>添加产品', ['products/create']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa-wrench"></i>添加文章', ['article/create']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa-user"></i>个人资料', ['profile/index']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa-unlock-alt"></i>锁屏', ['site/logout']) ?>
                            </li>
                            <li class="last">
                                <?= Html::a('<i class="fa-lock"></i>退出', ['site/logout'],['data-method'=>"post"]) ?>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
                
            </nav>
        <div class="page-title">
                
                <div class="title-env">
                    <h1 class="title"><?=$this->title?></h1>
                    <p class="description"></p>
                </div>
                    <div class="breadcrumb-env">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>   
                                
                </div>
                    
        </div>
         
        <?= $content ?>
        <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">
                
                <div class="footer-inner">
                
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; <?php echo date("Y")?>
                        <strong>呐呐科技</strong> 
                        版权所有 (<a href="http://www.nana-1.net/" target="_blank" title="呐呐科技">www.nana-1.com</a>)
                    </div>
                    
                    
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                    
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                        
                    </div>
                    
                </div>
                
            </footer>
        </div>
        
    </div>

<!--    <div class="page-loading-overlay">
        <div class="loader-2">页面延迟加载</div>  
    </div> -->

<?php $this->endBody() ?>
<script>
    // window.onload = function(){
    //  show_loading_bar(100);
    // }
</script>

</body>
</html>

<?php $this->endPage() ?>

