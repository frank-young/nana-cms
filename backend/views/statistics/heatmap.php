<?php
/* @var $this yii\web\View */
$this->title = '热力图统计';
$this->params['breadcrumbs'][] = ['label' => '统计分析', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title ?></title>
	<style>
        iframe{
        	width: 100%;

        }
        body{
			margin: 0;
        }
    </style>
</head>
<body>
<iframe height="<?php echo $model['height'] ?>" src="<?php echo $model['url'] ?>" frameborder="0" scrolling="no"></iframe>
<div id="F-point" style="display:none"><?php echo $model['point']?></div>
<script src="js/heatmap/heatmap.min.js"></script>
<script>
    pageWidth = document.body.clientWidth;

    function render(point) {
        var domElement = document.getElementsByTagName('body')[0];
        var heatmap = h337.create({
          container: domElement
        });

        heatmap.setData({
            max: 10,
            data: point
        });
    }

    var str = document.getElementById('F-point').innerHTML,
        point = JSON.parse(str);

    render(point.data);

</script>
</body>
</html>
