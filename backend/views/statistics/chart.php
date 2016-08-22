<?php
/* @var $this yii\web\View */
$this->title = '数据图形统计';
$this->params['breadcrumbs'][] = ['label' => '统计分析', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-index">
<script src="js/echarts/echarts.min.js"></script>

	<div class="row">
		<div class="col-sm-3">
			<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="<?= $today ?>" data-suffix="" data-duration="4">
				<div class="xe-icon">
					<i class="linecons-globe"></i>
				</div>
				<div class="xe-label">
					<strong class="num">0</strong>
					<span>今日页面访问量</span>
				</div>
			</div>
			
		</div>
				
		<div class="col-sm-3">
			
			<div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="<?= $todayUnique ?>" data-suffix="" data-duration="3" >
				<div class="xe-icon">
					<i class="linecons-user"></i>
				</div>
				<div class="xe-label">
					<strong class="num">0</strong>
					<span style="border-bottom:1px dotted #ccc;cursor:pointer;display:inline;" data-toggle="tooltip" data-placement="bottom" title="只统计以前未访问过网站的人数">今日访问人数</span>
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
	<!-- 浏览数据统计 -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">流量统计</h3>
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">&times;</a>
					</div>
				</div>
				<div class="panel-body">
					  <div id="FViews-month" style="width: 100%;height:450px;"></div>
						    <script type="text/javascript">
							        // 基于准备好的dom，初始化echarts实例
							        var chart = echarts.init(document.getElementById('FViews-month'));
							        
							        option = {
								    title: {
								        text: '<?=date('m')?>月网站流量统计'
								    },
								    tooltip: {
								        trigger: 'axis',
								        formatter: '<?=date('Y')?>-<?=date('m')?>-{b0}<br>{a0}: {c0}<br />{a1}: {c1}'
								    },
								    legend: {
								        data:['页面访问总量','访问人数']
								    },
								    grid: {
								        left: '3%',
								        right: '4%',
								        bottom: '3%',
								        containLabel: true
								    },
								    toolbox: {
								        feature: {
								            saveAsImage: {}
								        }
								    },
								    xAxis: {
								        type: 'category',
								        boundaryGap: false,
								        data: ['1','2','3','4','5','6','7','8','9',
								        		'10','11','12','13','14','15','16','17','18','19',
								        		'20','21','22','23','24','25','26','27','28','29','30','31'
								        		]	
								    },
								    yAxis: {
								        type: 'value'
								    },
								    series: [
								        {
								            name:'页面访问总量',
								            type:'line',
								            stack: '总量',
								            data:[
								            <?php 
								        		foreach($views as $key=>$value){
								        		echo "'".$value."',";
								        		}
								        	?>
								        	],
								        	label: {
								                normal: {
								                    show: true,
								                    position: 'top'
								                }
								            }
								        },
								        {
								            name:'访问人数',
								            type:'line',
								            stack: '人数',
								            data:[
								            <?php 
								        		foreach($viewsUnique as $key=>$value){
								        		echo "'".$value."',";
								        		}
								        	?>
								        	],
								        	label: {
								                normal: {
								                    show: true,
								                    position: 'top'
								                }
								            }
								        },  
							    	]
							};
						chart.setOption(option);
						</script>
				
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">访问设备统计</h3>
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">&times;</a>
					</div>
				</div>
				<div class="panel-body">
					    <div id="FDevice" style="height:400px;"></div>
					    <script type="text/javascript">
					        // 基于准备好的dom，初始化echarts实例
					        var chart = echarts.init(document.getElementById('FDevice'));
					        option = {
							    title : {
							        text: '用户访问设备统计',
							        subtext: '您能清楚的知道用户访问网站的设备',
							        x:'center'
							    },
							    tooltip : {
							        trigger: 'item',
							         formatter: '访问设备：{b}<br>访问数量：{c}'
							    },
							    legend: {
							        orient: 'vertical',
							        left: 'left',
							        data:['Windows','iPhone','iPad','Android','other']
							    },
							    toolbox: {
							        feature: {
							            saveAsImage: {}
							        }
							    },
							    series : [
							        {
							            name: '访问来源',
							            type: 'pie',
							            radius : '55%',
							            center: ['50%', '60%'],
							            data:[
					                        {value:<?php echo $count['windows']?>, name:'Windows'},
					                        {value:<?php echo $count['iphone']?>, name:'iPhone'},
					                        {value:<?php echo $count['ipad']?>, name:'iPad'},
					                        {value:<?php echo $count['android']?>, name:'Android'},
					                        {value:<?php echo $count['other']?>, name:'other'}
					                    ],
					                    label: {
								                normal: {
								                    show: true,
								                    formatter: "{b} : {c}"
								                }
								            },
							            itemStyle: {
							                emphasis: {
							                    shadowBlur: 10,
							                    shadowOffsetX: 0,
							                    shadowColor: 'rgba(0, 0, 0, 0.5)'
							                }
							            }
							        }
							    ]
							   
							};  
					        chart.setOption(option);

					    </script>
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">访问国家数据统计</h3>
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">&times;</a>
					</div>
				</div>
				<div class="panel-body">
				    <div id="World" style="width: 100%;height:450px;"></div>
					    <script type="text/javascript">
					    
					    (function(){
					    	/************************ 启用了localStotage的地图 ***********************************/
					        var chart = echarts.init(document.getElementById('World'));
					        var worldLocal = window.localStorage.getItem('world');

					    	main();
					    	/**
					    	 * 主执行判断函数
					    	 */
					        function main () {
					            if(worldLocal){
					                loadLocal();
					            }else{
					                loadAjax();
					            }
					        }
					    	/**
					         * 直接加载，localStorage 存了 world的情况
					         */
					        function loadLocal () {
					            echarts.registerMap('world', worldLocal);
					            setChart();
					        }
					    	/**
					         * 异步加载地图
					         */
					        function loadAjax () {
					            chart.showLoading();
					            $.get('js/echarts/map/world.json', function (worldJson) {
					                chart.hideLoading();
					                window.localStorage.setItem('world',JSON.stringify(worldJson));     //将地图坐标存在 localStorage
					                echarts.registerMap('world', worldJson);
					                setChart();
					            }); 
					        }
					        /**
					         * 默认地图图表配置
					         */
						    function setChart(){
								option = {
						        title: {
						            text: '访问国家数据统计',
						            subtext: '可以点击右边数据按钮查看',
						            left: 'center',
						            top: 'top'
						        },
						        tooltip: {
						            trigger: 'item',
						            formatter: function (params) {
						                var value =params.value;
						                if(isNaN(value)){
						                    value = "";
						                }else{
						                    return params.seriesName+' : '+params.name + '<br/>访问数量 : ' + value;
						                }
						                
						            }
						        },
						        toolbox: {
						            show: true,
						            // orient: 'vertical',
						            left: 'right',
						            top: 'top',

						            feature: {
						                dataView: {
						                    readOnly: false,
						                },
						                restore: {},
						                saveAsImage: {}
						            }
						        },
						        visualMap: {
						            min: 0,
						            max: 100,
						            left: 'right',
						            top: 'center',
						            text:['高','低'],
						            realtime: false,
						            calculable: true,
						            color: ['orangered','yellow','lightskyblue']
						        },
						        series: [
						            {
						                name: '访问国家',
						                type: 'map',
						                mapType: 'world',
						                roam: true,
						                left: '5%',
						                top: 'bottom',
						                itemStyle:{
						                    emphasis:{label:{show:true}}
						                },
						                data:[
						                	<?php foreach ($country_data as $key => $value) {
						                		echo "{name: '".$key."', value: ".$value."},";
						                	}
						                	?>
						                   
						                ],

						                nameMap : {
						                    'Afghanistan':'阿富汗',
						                    'Angola':'安哥拉',
						                    'Albania':'阿尔巴尼亚',
						                    'United Arab Emirates':'阿联酋',
						                    'Argentina':'阿根廷',
						                    'Armenia':'亚美尼亚',
						                    'French Southern and Antarctic Lands':'法属南半球和南极领地',
						                    'Australia':'澳大利亚',
						                    'Austria':'奥地利',
						                    'Azerbaijan':'阿塞拜疆',
						                    'Burundi':'布隆迪',
						                    'Belgium':'比利时',
						                    'Benin':'贝宁',
						                    'Burkina Faso':'布基纳法索',
						                    'Bangladesh':'孟加拉国',
						                    'Bulgaria':'保加利亚',
						                    'The Bahamas':'巴哈马',
						                    'Bosnia and Herzegovina':'波斯尼亚和黑塞哥维那',
						                    'Belarus':'白俄罗斯',
						                    'Belize':'伯利兹',
						                    'Bermuda':'百慕大',
						                    'Bolivia':'玻利维亚',
						                    'Brazil':'巴西',
						                    'Brunei':'文莱',
						                    'Bhutan':'不丹',
						                    'Botswana':'博茨瓦纳',
						                    'Central African Republic':'中非共和国',
						                    'Canada':'加拿大',
						                    'Switzerland':'瑞士',
						                    'Chile':'智利',
						                    'China':'中国',
						                    'Ivory Coast':'象牙海岸',
						                    'Cameroon':'喀麦隆',
						                    'Democratic Republic of the Congo':'刚果民主共和国',
						                    'Republic of the Congo':'刚果共和国',
						                    'Colombia':'哥伦比亚',
						                    'Costa Rica':'哥斯达黎加',
						                    'Cuba':'古巴',
						                    'Northern Cyprus':'北塞浦路斯',
						                    'Cyprus':'塞浦路斯',
						                    'Czech Republic':'捷克共和国',
						                    'Germany':'德国',
						                    'Djibouti':'吉布提',
						                    'Denmark':'丹麦',
						                    'Dominican Republic':'多明尼加共和国',
						                    'Algeria':'阿尔及利亚',
						                    'Ecuador':'厄瓜多尔',
						                    'Egypt':'埃及',
						                    'Eritrea':'厄立特里亚',
						                    'Spain':'西班牙',
						                    'Estonia':'爱沙尼亚',
						                    'Ethiopia':'埃塞俄比亚',
						                    'Finland':'芬兰',
						                    'Fiji':'斐',
						                    'Falkland Islands':'福克兰群岛',
						                    'France':'法国',
						                    'Gabon':'加蓬',
						                    'United Kingdom':'英国',
						                    'Georgia':'格鲁吉亚',
						                    'Ghana':'加纳',
						                    'Guinea':'几内亚',
						                    'Gambia':'冈比亚',
						                    'Guinea Bissau':'几内亚比绍',
						                    'Equatorial Guinea':'赤道几内亚',
						                    'Greece':'希腊',
						                    'Greenland':'格陵兰',
						                    'Guatemala':'危地马拉',
						                    'French Guiana':'法属圭亚那',
						                    'Guyana':'圭亚那',
						                    'Honduras':'洪都拉斯',
						                    'Croatia':'克罗地亚',
						                    'Haiti':'海地',
						                    'Hungary':'匈牙利',
						                    'Indonesia':'印尼',
						                    'India':'印度',
						                    'Ireland':'爱尔兰',
						                    'Iran':'伊朗',
						                    'Iraq':'伊拉克',
						                    'Iceland':'冰岛',
						                    'Israel':'以色列',
						                    'Italy':'意大利',
						                    'Jamaica':'牙买加',
						                    'Jordan':'约旦',
						                    'Japan':'日本',
						                    'Kazakhstan':'哈萨克斯坦',
						                    'Kenya':'肯尼亚',
						                    'Kyrgyzstan':'吉尔吉斯斯坦',
						                    'Cambodia':'柬埔寨',
						                    'South Korea':'韩国',
						                    'Kosovo':'科索沃',
						                    'Kuwait':'科威特',
						                    'Laos':'老挝',
						                    'Lebanon':'黎巴嫩',
						                    'Liberia':'利比里亚',
						                    'Libya':'利比亚',
						                    'Sri Lanka':'斯里兰卡',
						                    'Lesotho':'莱索托',
						                    'Lithuania':'立陶宛',
						                    'Luxembourg':'卢森堡',
						                    'Latvia':'拉脱维亚',
						                    'Morocco':'摩洛哥',
						                    'Moldova':'摩尔多瓦',
						                    'Madagascar':'马达加斯加',
						                    'Mexico':'墨西哥',
						                    'Macedonia':'马其顿',
						                    'Mali':'马里',
						                    'Myanmar':'缅甸',
						                    'Montenegro':'黑山',
						                    'Mongolia':'蒙古',
						                    'Mozambique':'莫桑比克',
						                    'Mauritania':'毛里塔尼亚',
						                    'Malawi':'马拉维',
						                    'Malaysia':'马来西亚',
						                    'Namibia':'纳米比亚',
						                    'New Caledonia':'新喀里多尼亚',
						                    'Niger':'尼日尔',
						                    'Nigeria':'尼日利亚',
						                    'Nicaragua':'尼加拉瓜',
						                    'Netherlands':'荷兰',
						                    'Norway':'挪威',
						                    'Nepal':'尼泊尔',
						                    'New Zealand':'新西兰',
						                    'Oman':'阿曼',
						                    'Pakistan':'巴基斯坦',
						                    'Panama':'巴拿马',
						                    'Peru':'秘鲁',
						                    'Philippines':'菲律宾',
						                    'Papua New Guinea':'巴布亚新几内亚',
						                    'Poland':'波兰',
						                    'Puerto Rico':'波多黎各',
						                    'North Korea':'北朝鲜',
						                    'Portugal':'葡萄牙',
						                    'Paraguay':'巴拉圭',
						                    'Qatar':'卡塔尔',
						                    'Romania':'罗马尼亚',
						                    'Russia':'俄罗斯',
						                    'Rwanda':'卢旺达',
						                    'Western Sahara':'西撒哈拉',
						                    'Saudi Arabia':'沙特阿拉伯',
						                    'Sudan':'苏丹',
						                    'South Sudan':'南苏丹',
						                    'Senegal':'塞内加尔',
						                    'Solomon Islands':'所罗门群岛',
						                    'Sierra Leone':'塞拉利昂',
						                    'El Salvador':'萨尔瓦多',
						                    'Somaliland':'索马里兰',
						                    'Somalia':'索马里',
						                    'Republic of Serbia':'塞尔维亚共和国',
						                    'Suriname':'苏里南',
						                    'Slovakia':'斯洛伐克',
						                    'Slovenia':'斯洛文尼亚',
						                    'Sweden':'瑞典',
						                    'Swaziland':'斯威士兰',
						                    'Syria':'叙利亚',
						                    'Chad':'乍得',
						                    'Togo':'多哥',
						                    'Thailand':'泰国',
						                    'Tajikistan':'塔吉克斯坦',
						                    'Turkmenistan':'土库曼斯坦',
						                    'East Timor':'东帝汶',
						                    'Trinidad and Tobago':'特里尼达和多巴哥',
						                    'Tunisia':'突尼斯',
						                    'Turkey':'土耳其',
						                    'United Republic of Tanzania':'坦桑尼亚联合共和国',
						                    'Uganda':'乌干达',
						                    'Ukraine':'乌克兰',
						                    'Uruguay':'乌拉圭',
						                    'United States of America':'美国',
						                    'Uzbekistan':'乌兹别克斯坦',
						                    'Venezuela':'委内瑞拉',
						                    'Vietnam':'越南',
						                    'Vanuatu':'瓦努阿图',
						                    'West Bank':'西岸',
						                    'Yemen':'也门',
						                    'South Africa':'南非',
						                    'Zambia':'赞比亚',
						                    'Zimbabwe':'津巴布韦'
						                }
						            }
						        ]
						    	};

						    	chart.setOption(option);
						    }
					    })();
						 
					    </script>
				</div>
			</div>

		</div>
	</div>
		<!-- 浏览数据统计 -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">热力图统计</h3>
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">&times;</a>
					</div>
				</div>
				<div class="panel-body">
					
				
				</div>
			</div>

		</div>
	</div>

	<script src="js/xenon-widgets.js"></script>
	<script>
		$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			});
	</script>
</div>