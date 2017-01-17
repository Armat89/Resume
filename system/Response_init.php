<?php
/*
    Response init
*/
$objParam = Array('service' => 'soap', 
                    'gameCore' => 'slim', 
                    'gameMode' => 'dashbord', 
                    'boardLayout' => 'game',
                    'gateway' => $gateway,
                    'current_uri'  => $current_uri,
                    'commands'  => $commands,
                    'requestFlow'  => $requestFlow,
                    'getBy'  => $getBy,
                    'identy'  => $identy,
                    'HASH'  => HASH,
                'UNIT-SCOPE'  => array('Nickname' => 'ArmatBP', 'Email' => 'armatbp@gmail.com'),
                'UNIT-SKILL'  => array('php', 'js', 'css', 'html'),
                'UNIT-OBJECTIVE'  => array('php7', 'symfony3')
                );
/*
    Adding application-config and System params
*/
$config = Array('db' => true, 
                'template_dir' => 'template/', 
                'project'      => 'armatbp learning', 
                'version'      => '0.3.0', 
                'environment'  => 'php/sqlite3/json/serialize'
               );
/*
    Initialising cache-backend for table metadata
*/
$cache = Array( 'Core', 'File', 
            array(
                'lifetime'     => 7200, //Cache is renewed every 2 hours
                'cache_dir'    => BASE_PATH_UNITY . '/security/cache/',  //where the cache is stored
                'auto_serialize' => true  //using simple serialization to store values
            )
);
/*
    Request / Response client headers sent 
*/
$headers = Array('HTTP/1.1 ' => 200,
                 'Access-Control-Allow-Orgin' => '*',
                 'Access-Control-Allow-Methods' => '',
                 'Content-Type' => 'Content-type: text/html'
                );
/*
    Tagged placeholders for template rendering
*/
$layout = Array('CORE-MODAL'    => 'modal.php', 
                'CORE-JSCRIPT'  => 'js.php',
                'SECTION-NAV'   => 'nav.php',
                'SECTION-MAIN'  => 'home/section_main.php', 
                'SECTION-ABOUT' => 'home/section_about.php', 
                'SECTION-THEME' => 'home/section_theme.php', 
                'SECTION-CONTACT' => 'home/section_contact.php'
                );