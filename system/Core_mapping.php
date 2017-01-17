<?php
/*
    Core mapping manager aviable Methods and extentions
*/


// Run
$extra = array( 'customerId' => 0, 
                'accountId' => 0, 
                'action' => '' );

// Requests from the same server don't have a HTTP_ORIGIN header
if ( !array_key_exists('HTTP_ORIGIN', $_SERVER )) {
    $_SERVER['HTTP_ORIGIN'] = @$_SERVER['SERVER_NAME'];
}
if ( isset($_SESSION['Token'] ) && !empty( $_SESSION['Token']) ) {
    $api_key = @$_SESSION['Token'];
}
else {
    @session_start();
    $api_key = '';
}
// Capturing data for API request to tradetutorfx This is truly a shambolic approach, but it works
if ( isset( $_REQUEST['account'] ) && !empty( $_REQUEST['account'] )  ) {
    $_SESSION['account'] = $_REQUEST['account'];
}
// Capturing the Waverley UID if it is supplied
if ( isset( $_REQUEST['UID'] ) && !empty( $_REQUEST['UID'] )  ){
    $_SESSION['UID'] = $_REQUEST['UID'];
}
// Capturing the affiliate ID if it is supplied
if ( isset( $_REQUEST['affid'] ) && !empty( $_REQUEST['affid'] ) ){
    $_SESSION['affid'] = $_REQUEST['affid'];
}

include_once('Router_init.php');

$globalRequest = array('FETCH_ARRAY', 'Service', 'json', @$_SESSION, @$_COOKIE, @$_REQUEST, @$_SERVER, @$_POST, @$_FILES);
$globalResponse = array('FETCH_OBJECT', 'Service', 'xml', @$_SESSION, @$_COOKIE, @$_REQUEST, @$_SERVER, @$_POST, @$_FILES);
