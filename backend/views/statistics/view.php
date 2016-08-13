<?php
/* @var $this yii\web\View */

$this->title = '访问记录';
$this->params['breadcrumbs'][] = ['label' => '统计分析', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
	<style>
		.page-body .main-content .cbp_tmtimeline:before{
			margin-bottom: 60px;
		}
		@media (max-width: 768px){
			.cbp_tmtimeline{
				margin-top: 100px;
				position: relative;
			}
			.cbp_tmtimeline:first-child{
				margin-top: 80px;
			}
			.cbp_tmtimeline:after{
				content: '';
				position: absolute;
				top: -76px;
				left: 0;
				width: 100%;
				border-top: 4px dotted #fff;
			}
			.cbp_tmtimeline:first-child:after{
				content: '';
				border-top: 0;
			}
		}
	</style>
<div class="statistics-data">
	<?php foreach ($model as $k1 => $v1):?>
	<ul class="cbp_tmtimeline">
		<li>
			<div class="cbp_tmicon timeline-bg-primary"> <i class="fa-user"></i>
			</div>
			<div class="cbp_tmlabel empty" style="margin-bottom: 30px;">
				<span>访问日期：<?=$k1?></span>
			</div>
		</li>
		<?php foreach ($v1 as $key => $value):?>
		<li>
			<time class="cbp_tmtime" datetime="<?=date('Y-m-d H:i:s',$value['time'])?>">
				<span style="margin-top:12px;"><?=date('H:i:s',$value['time'])?></span>
				<span></span>

			</time>

			<div class="cbp_tmicon timeline-bg-info">
				<i class="fa-eye"></i>
			</div>

			<div class="cbp_tmlabel">
				<h2>
					<a href="<?=$value['url']?>"><?=$value['title']?> 
						<!-- <span> &nbsp;&nbsp;(<?php if ($k1+1<=count($v1)) {
							echo $v1[$key+1]['time']-$value['time']>0 ? '停留时间：'.($v1[$key+1]['time']-$value['time']).'秒':'<span data-toggle="tooltip" data-placement="top" title="系统将无法统计用户访问最后一个页面的停留时间">无法统计</span>';
						}?>)</span> -->
					</a>
				</h2>
				<p>
					<a href="<?=$value['url']?>"><?=$value['url']?></a>
				</p>
			</div>
		</li>
		<?php endforeach;?>
	</ul>
	<?php endforeach;?>
	
</div>