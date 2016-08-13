<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    
    .f-input-self{
        position: relative;
        /*width: 100px;*/
    }
    input[type='file'].form-control{
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
        width: 100%;
    }
    .f-btn{
        width: 100px;
        height: 34px;
        overflow: hidden;
    }
    .modal-backdrop{
        display: none;
    }
</style>
<div class="products-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <div class="row">
        <div class="col-md-12">
            <label class="control-label" for="products-cid">产品封面图片上传</label>
            <div class="input-group f-input-self">
                <div id="text-view" type="text" class="form-control" placeholder=""></div>
                <div class="input-group-btn">
                    <button class="btn btn-success f-btn" type="button">
                        浏览
                    </button>
                </div>
                <?= $form->field($model, 'file')->fileInput(['id'=>"file",'class'=>'form-control','onchange'=>'readAsDataURL()'])->label(false) ?>
            </div>
        </div>
    </div>
    <img id="img-view" width="200" src="" alt="">

    <?php echo $form->field($model, 'file[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => [
            'previewFileType' => 'image',

            // 最少上传的文件个数限制
            'minFileCount' => 1,
            // 最多上传的文件个数限制
            'maxFileCount' => 10,
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => false,
            // 展示图片区域是否可点击选择多文件
            'browseOnZoneClick' => true,
            // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
            'fileActionSettings' => [
                // 设置具体图片的查看属性为false,默认为true
                'showZoom' => true,
                // 设置具体图片的上传属性为true,默认为true
                'showUpload' => true,
                // 设置具体图片的移除属性为true,默认为true
                'showRemove' => true,
            ]

        ]
    ])->label('产品图片上传');?>

    <?php echo $form->field($model, 'cId')->dropDownList($cate);?>
    
    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carton')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
     <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'imageUpload' => ['/redactor/upload/image'],
                'fileUpload' => ['/redactor/upload/file'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager']
            ]
        ]
        ) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '保存', ['class' => $model->isNewRecord ? 'btn btn-turquoise' : 'btn btn-turquoise']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    <?php $this->beginBlock('upload') ?> 
    // 将文件以Data URL形式进行读入页面
    function readAsDataURL(){
        if(typeof FileReader == 'undefined') {
            alert("抱歉，你的浏览器无法预览图片");
        }
        // 检查是否为图像类型
        var simpleFile = document.getElementById("file").files[0];
        var rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
        
        if(!rFilter.test(simpleFile.type)) {
            alert("请确保文件类型为图像类型");
            return false;
        }
        document.getElementById('text-view').innerHTML=simpleFile.name;   //模拟显示出文件名
        var reader = new FileReader();
        // 将文件以Data URL形式进行读入页面
        reader.readAsDataURL(simpleFile);
        reader.onload = function(e){
            document.getElementById('img-view').src = this.result;
        }
    }
    <?php $this->endBlock() ?>  
    <?php $this->registerJs($this->blocks['upload'], \yii\web\View::POS_END); ?> 
</script>
