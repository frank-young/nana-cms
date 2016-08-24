<?php

$input =  $_GET['keyword'];
// $input = "sea+cucumber";
$page = 1;

// $url = "https://www.alibaba.com/products/F0/'.$input.'/'.$page.'.html?dmtrack_pageid=kfvt84nulnmi0lvwl05mh2y1hi156bc2fc7481ca2b&XPJAX=1";
$url = "https://www.alibaba.com/trade/search?fsb=y&IndexArea=product_en&SearchText={$input}&dmtrack_pageid=b4d4db040be2ef4c57bd89b2156bc61cc58a84c49c&XPJAX=1";
$handle = fopen($url,"rb");
$content = "";
while (!feof($handle)) {
    $content .= fread($handle, 10000);
}
fclose($handle);

echo $content;