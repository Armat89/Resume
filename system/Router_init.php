<?php

$url='';
$src=@$_GET['src'];

if(empty($src)) { $src=@$_POST['src']; } 
if(empty($src)) { $src=@$_SERVER['QUERY_STRING']; }
if(empty($src)) { $src=@$_SERVER['REQUEST_URI']; }

@list($trash, $gateway, $current_uri, $commands, $requestFlow, $getBy, $identy) = explode("/", $src);
if(!empty($gateway))     { $url.='/'.$gateway; }
if(!empty($current_uri)) { $url.='/'.$current_uri; } else { $current_uri='url'; }
if(!empty($commands))    { $url.='/'.$commands; }
if(!empty($requestFlow)) { $url.='/'.$requestFlow; }
if(!empty($getBy))       { $url.='/'.$getBy; } else { $getBy='id'; }
if(!empty($identy))      { $url.='/'.$identy; }
define("URL", "".$url."");
define("HASH", "".md5($url)."");
