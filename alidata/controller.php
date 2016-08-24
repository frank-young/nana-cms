<?php

$input =  $_GET['keywords'];

$page = 1;

$url = "https://www.alibaba.com/products/F0/'.$input.'/'.$page.'.html?dmtrack_pageid=kfvt84nulnmi0lvwl05mh2y1hi156bc2fc7481ca2b&XPJAX=1";

$handle = fopen($url,"rb");
$content = "";
while (!feof($handle)) {
    $content .= fread($handle, 10000);
}
fclose($handle);
// $content = json_encode($content);

echo $content;