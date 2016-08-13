<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Inquiry */

$this->title = '询盘单';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="panel panel-default">
		<div class="panel-heading hidden-print">Invoice</div>
		<div class="panel-body">
			<section class="invoice-env">
			
				<!-- Invoice header -->
				<div class="invoice-header">
					
					<!-- Invoice Options Buttons -->
					<div class="invoice-options hidden-print">
						<a href="#" class="btn btn-block btn-gray btn-icon btn-icon-standalone btn-icon-standalone-right text-left">
							<i class="fa-envelope-o"></i>
							<span>Send</span>
						</a>
						
						<a href="#" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right btn-single text-left">
							<i class="fa-print"></i>
							<span>Print</span>
						</a>
					</div>
					
					<!-- Invoice Data Header -->
					<div class="invoice-logo">
					
						
						<ul class="list-unstyled">
							<li class="upper">Invoice No. <strong>#5652256</strong></li>
							<li>03 October 14</li>
							<li>Prishtin&euml;, Kosovo</li>
						</ul>
						
					</div>
					
				</div>
				
				
				<!-- Client and Payment Details -->
				<div class="invoice-details">
					
					<div class="invoice-client-info">
						<strong>Client</strong>
						
						<ul class="list-unstyled">
							<li>John Doe </li>
							<li>Mr Nilson Otto </li>
							<li>FoodMaster Ltd</li>
						</ul>
						
						<ul class="list-unstyled">		
							<li>1982 OOP </li>
							<li>Madrid, Spain </li>
							<li>+1 (151) 225-4183</li>
						</ul>
					</div>
					
					<div class="invoice-payment-info">
						<strong>Payment Details</strong>
						
						<ul class="list-unstyled">
							<li>V.A.T Reg #: <strong>542554(DEMO)78</strong></li>
							<li>Account Name: <strong>FoodMaster Ltd</strong> </li>
							<li>SWIFT code: <strong>45454DEMO545DEMO</strong></li>
						</ul>
					</div>
					
				</div>
				
				
				<!-- Invoice Entries -->
				<table class="table table-bordered">
					<thead>
						<tr class="no-borders">
							<th class="text-center hidden-xs">#</th>
							<th width="60%" class="text-center">Product</th>
							<th class="text-center hidden-xs">Quantity</th>
							<th class="text-center">Price</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td class="text-center hidden-xs">1</td>
							<td>On am we offices expense thought</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$1,290</td>
						</tr>
						
						<tr>
							<td class="text-center hidden-xs">2</td>
							<td>Up do view time they shot</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$400</td>
						</tr>
						
						<tr>
							<td class="text-center hidden-xs">3</td>
							<td>Way ham unwilling not breakfast</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$550</td>
						</tr>
						
						<tr>
							<td class="text-center hidden-xs">4</td>
							<td>Songs to an blush woman be sorry</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$4020</td>
						</tr>
						
						<tr>
							<td class="text-center hidden-xs">5</td>
							<td>Luckily offered article led lasting</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$87</td>
						</tr>
						
						<tr>
							<td class="text-center hidden-xs">6</td>
							<td>Of as by belonging therefore suspicion</td>
							<td class="text-center hidden-xs">1</td>
							<td class="text-right text-primary text-bold">$140</td>
						</tr>
					</tbody>
				</table>
				
				<!-- Invoice Subtotals and Totals -->
				<div class="invoice-totals">
					
					<div class="invoice-subtotals-totals">
						<span>
							Sub - Total amount: 
							<strong>$6,487</strong>
						</span>
						
						<span>
							VAT: 
							<strong>12.9%</strong>
						</span>
						
						<span>
							Discount: 
							<strong>-----</strong>
						</span>
						
						<hr />
						
						<span>
							Grand Total: 
							<strong>$7,304</strong>
						</span>
					</div>
					
					<div class="invoice-bill-info">
						<address>
							795 Park Ave, Suite 120<br />
							San Francisco, CA 94107<br /> 
							P: (234) 145-1810 <br />
							Full Name <br />
							<a href="#">first.last@email.com</a>
						</address>
					</div>
					
				</div>
				
			</section>
			
		</div>
	</div>