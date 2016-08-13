<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />
    
    <title><?=$this->title?></title>

    <link rel="stylesheet" href="css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/xenon-core.css">
    <link rel="stylesheet" href="css/xenon-components.css">

    <script src="js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <style>

    /*login logo */
    .login-header .logo-text{
        font-size: 34px;
        font-family: '微软雅黑';
        position: relative;
        top: -7px;
        font-weight: normal;
        left: 3px;
    }
    .login-form{
        box-shadow: 3px 3px 5px rgba(0,0,0,0.1);
    }
    </style>
</head>
<body class="page-body login-page login-light">

    <div class="login-container">
    
        <div class="row">
        
            <div class="col-sm-6 col-sm-offset-3">
                <script>
                jQuery(document).ready(function($)
                    {
                        // Reveal Login form
                        setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
                        
                    });

                </script>
                <div class="login-form fade-in-effect">
                    <div class="login-header">
                        <a href="#" class="logo">
                            <img src="images/logo-nana.png" alt="" width="40"><b class="logo-text">呐呐科技</b>
                            <span>后台系统登录</span>
                        </a>
                        <h4>请输入管理员账号和密码！</h4>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'login']); ?>
                    
                        <?= $form->field($model, 'username')->label('') ?>

                        <?= $form->field($model, 'password')->passwordInput()->label('') ?>

                        <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>

                        <div class="form-group">
                            <?= Html::submitButton('登录', ['class' => 'btn btn-lg btn-pink btn-block', 'name' => 'login-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
                
                
                
            </div>
            
        </div>
        
    </div>



    <!-- Bottom Scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-validate/jquery.validate.min.js"></script>



</body>
</html>