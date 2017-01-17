<?php
/*
   Load timer start
*/
$part_time = explode(' ', microtime()); 
$begin_time = $part_time[1].substr($part_time[0],1);
/*
	PHP server configuration
*/
ini_set("log_errors", "1");
ini_set("error_log", "./error.log.txt");
ini_set('display_errors', 1);
error_reporting(7);
//set_time_limit(1800); 						// 720 sec
//session_cache_expire(1800);   				// 720 sec expire
date_default_timezone_set('Europe/Kiev');
defined('BASE_PATH_UNITY') || define('BASE_PATH_UNITY', realpath(dirname(__FILE__)));
// --------------------------------------------------------------------------
require_once( BASE_PATH_UNITY . '/system/initClasses.php');
include_once( BASE_PATH_UNITY . '/system/Core_mapping.php');
include_once( BASE_PATH_UNITY . '/system/Response_init.php');
// --------------------------------------------------------------------------
/*
    Initialising Server & implements params to our template
*/
$Processor = new Processor( $config );
$Processor->Application = new Application( $headers, $cache );
$Processor->Router = new Router( $globalRequest, $globalResponse );
$Processor->Container = new Container( 'http_parse_headers(header)', 'footer', 'index' );
$active = $Processor->Router->choise( $commands, $requestFlow);
/*   
    Tagged placeholders for template rendering
*/
switch ($gateway) {
case 'json':
    $out = json_encode(object2array($objParam)); 
break;
case 'xml':
    $out = generate_valid_xml_from_array($objParam);    
break;
default:
    switch ($commands) {
    case 'create':
        $objParam['REQUEST-POST'] = $_POST;
        $out = json_encode(object2array($objParam));    
        break;
    case 'delete':
        ob_start(); 
        include( '../template/game/home.php' );
        $out = ob_get_clean();  
        break;
    default:
        $view = $Processor->Container->setPage('index.php', $layout);
        $out = $Processor->Container->setBlocks( $view, array('UI-AJAX' => 'null.php') );
        break;
    } 
break;
}
print_r($out);
// --------------------------------------------------------------------------
$part_time = explode(' ', microtime()); 
$end_time = $part_time[1].substr($part_time[0],1); 
$final = sprintf("%1.6f",$end_time - $begin_time);