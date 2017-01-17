<?php
class Router extends Application {

	public $globalRequest;
	public $globalResponse;

    function __construct( $globalRequest = '', $globalResponse = '' ) {

    	if(empty($globalRequest)) {
    		$globalRequest = array('SERVER' => array('pathinfo' => '(path)', 
													'apache_request_headers' => '(oid)', ),
									'REQUEST' => $_REQUEST, 
									'SESSION' => $_SESSION,
                                    'GET' => $_GET,
                                    'POST' => $_POST,
                                    'FILES' => $_FILES,
									'ENV' => $_SERVER );
    	}

        $this->globalRequest = $globalRequest;

        if(empty($globalResponse)) {
    		$globalResponse = array('SERVER' => array('pathinfo' => '(path)', 
													'apache_request_headers' => '(oid)', ),
									'REQUEST' => $_REQUEST,
									'SESSION' => $_SESSION,
                                    'GET' => $_GET,
                                    'POST' => $_POST,
                                    'FILES' => $_FILES,
									'RESPONSE' => apache_request_headers(), 
									'ENV' => $_SERVER );
    	}

        // Router from URL PATH
        $this->globalResponse = $globalResponse;  
        $this->activeRoute = new stdClass(); 
        $this->activeRoute->Gateway = new stdClass(); 
        $this->activeRoute->route = new stdClass(); 
        
    }

    public function choise($commands,$requestFlow)
    {
        switch ($commands) {
            case 'create':
                $this->activeRoute->route = new stdClass('create');
                
                break;
            case 'choisen':
                $this->activeRoute->route = new stdClass('choisen');
                break;
            case 'update':
                $this->activeRoute->route = new stdClass('update');
                break;
            case 'delete':
                $this->activeRoute->route = new stdClass('delete');
                break;
            default:
                $this->activeRoute->route = new stdClass('read');
                break;
        }

        switch ($requestFlow) {
            case 'profile':
                $this->activeRoute->requestFlow = new stdClass('profile');
                break;
            case 'publication':
                $this->activeRoute->requestFlow = new stdClass('publication');
                break;
            case 'attachment':
                $this->activeRoute->requestFlow = new stdClass('attachment');
                break;
            case 'action':
                $this->activeRoute->requestFlow = new stdClass('action');
                break;
            default:
                $this->activeRoute->requestFlow = new stdClass('default');
                break;
        }

    return $this->activeRoute;
    }
}