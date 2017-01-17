<?php
/**
 * ArmatBP Learn is a private project for aproove some self skils
 * PHP Version 5
 *
 * @package ArmatBPLearn
 * @author Pavel Bidyuk <armatbp@gmail.com>
 * @copyright 2016 <mailto:armatbp@gmail.com>
 * @license http://opensource.org/licenses/bsd-license.php BSD License
 * @link http://github.com/Armat89/Learn
 * @since 2016-09-25
 * @version 0.5
 *
 * Usage:
 *  
 	$config = array('db' => true, 
            'template_dir' => 'template/', 
            'project'      => 'armatbp learning', 
            'version'      => '0.3.0', 
            'environment'  => 'php/sqlite3/json/serialize/angular'
           );
	$Processor = new Processor( $config, APPLICATION_ENV );
	$Processor->Router = new Router( $globalRequest, $globalResponse );
	$Processor->Application = new Application( $config, APPLICATION_ENV );
	$Processor->Container = new Container( 'http_parse_headers(header)', 
										   'footers', 
										   'index' );

	// $Processor->Container->setHeaders( '', 200 );
	echo $Processor->Container->setPage('index.php', $layout);

// --------------------------------------------------------------------------
*/

	class xmlDb {

		public $db = array();
		public $path = '../security/';
		public $file ='kurs.xml';
		public $startTag = 'DEST';

	    function __construct( $path, 
						   		  	 $file, 
						   		  	 $startTag ) {
	    	
	    	$this->db_driver = 'xmlDb(filename)';
	    	$this->db_name = 'learn.db';
	       
	       	$dbase = init_xml();
			$dbase->load($path.$file);
			
			$this->db = $dbase->getElementsByTagName($startTag);
	    }

		public function init_xml() 
		{	
			$xmlDoc = new DOMDocument();
			if($xmlDoc)
				return $xmlDoc;
			else
				return false;
		}
		
		public function test_xml()
		{
		 return '<?xml version="1.0" encoding="UTF-8"?>
			<note>
			<to>Tove</to>
			<from>Jani</from>
			<heading>Reminder</heading>
			<body>Dont forget me this weekend!</body>
			</note>';
		}
		
		public function read_xml( ) {
			
			$x = $this->db;

			 for ($i=0; $i<=$x->length-1; $i++)
			 {
			 //Process only element nodes
			 if ($x->item($i)->nodeType==1)
			   {
			   if ($x->item($i)->childNodes->item(0)->nodeValue == $q)
				 {
				 $y=($x->item($i)->parentNode);
				 }
			   }
			 }

			 $cd=($y->childNodes);

			 for ($i=0;$i<$cd->length;$i++)
			 { 
			 //Process only element nodes
			 if ($cd->item($i)->nodeType==1)
			   {
			   echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
			   echo($cd->item($i)->childNodes->item(0)->nodeValue);
			   echo("<br>");
			   }
			 }
			if($x) 
				return $x;
			else 
				return false;
		}
		
		public function awersome_read_xml( $source='<?xml version="1.0" encoding="UTF-8"?>', 
										   $file='kurs.xml', 
										   $startTag='DEST' ) {
			$x = $xmlDoc->documentElement;
			foreach ($x->childNodes AS $item) {
			  print $item->nodeName . " = " . $item->nodeValue . "<br>";
			}
		}
	}

	class sqlite {

		public $db;

	    function __construct( ) {
	    	//$this->db_driver = 'sqlite_factory(filename)';
	    	//$this->db_name = 'learn.db';
	        // $this->db = Database::getMagazineList(); // or something
	    	$this->db = new SQLite3('security/learn.db');
	    }

	    public function read( $query='' )
	    {
	    	$out = array();
	    	//$db = new SQLite3('security/learn.db');
		    $result = $this->db->query("SELECT *, rowid FROM '" . $query . "' LIMIT 50");

		    while($row = $result->fetchArray()) {
		        //extract($row);
		        //;
		        array_push($out, $row);
		        //"$service $access $construct <br>$request <br> $response <br>";
		    }

		    return $out;
	    }

	    public function _testDB()
	    {
	    	$out = array();
	    	$db = new SQLite3('security/learn.db');
		    $result = $db->query("SELECT *, rowid FROM 'Access' LIMIT 50");

		    while($row = $result->fetchArray()) {
		        array_push($out, $row);
		    }

		    return $out;
	    }
	}

	class Processor extends sqlite
	{
		public $Config = array('db' => 'true', 
								'project' => 'armatbp learning', 
								'version' => '0.0.1', 
								'environment' => 'php/sqlite3/json/serialize/angular');
		public $APPLICATION_ENV;

		const WAVERLEY_AFFILIATE = 8051;
	    const TRADELAND_AFFILIATE = 8034;
	    const SESSION_NAMESPACE = "App_Fields_";
	    const SECRET_KEY = 'Armat web dev 12345';
	    const TOKEN = 'Bearer 080042cad6356ad5dc0a720c18b53b8e53d4c274';

	    function __construct( $Config = array(), $APPLICATION_ENV = '') {
	    	parent::__construct();
			$this->Config = $Config;
			// Application configuration
			$cfgApp = file_get_contents( 'security/config.json' );
			$decoded = json_decode($cfgApp, true);
			$this->ConfigApp = $decoded;
			// Core configuration
			$ui = file_get_contents( 'security/ui.json' );
			$decoded = json_decode($ui, true);
			$this->validateParams = $decoded['validateParams'];
			$this->switcherUI = $decoded['switcherUI'];

			//return 'interface : ' . self::Class;
		}

	    private function _get()
	    {
	    	return 'interface : ' . self::Class;
	    }

	    private function _set()
	    {
	    	return 'interface : ' . self::Class;
	    }

	    private function _create()
	    {
	    	return 'interface : ' . self::Class;
	    }

	    public function init(){
	    	return '210 OK';
	    }

	    public function run()
	    {
	    	return 'Run Forest, RUN!';
	    }

	    public static function getClass(){
	        
	    }

	    private function _factoryEAV()
	    {
	    	return 'Run Forest, EAV!';
	    }

	    public function _factoryMVC()
	    {
	    	return 'Run Forest, MVC!';
	    }

	    public function _factorySOAP()
	    {
	    	return 'Run Forest, SOAP!';
	    }

	    public function _factoryRest()
	    {
	    	return 'Run Forest, Rest!';
	    }

	    private function GzipHttpResponse( $income = '' ) {
	    	return false;
	    }

		//to safely serialize AND unserialize...
		public function safe_string_to_store( $dbsource )
		{
			return base64_encode(serialize( $dbsource ));
		}

		public function array_restored_from_db( $dbsource )
		{
			return unserialize(base64_decode($dbsource));
		}

		public function serialize_to_file( $file, $dbsource )
		{
			if(file_put_contents('./'.$file, serialize( $dbsource ))) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

	}

	class Application extends Processor {

	    function __construct() {
	    	
	    	$this->Application = new stdClass();
	    	$this->Application->init = TRUE;
	    	$this->Application->switch = 'TestApp';
	    }

	    

	    public function getSelect()
	    {
	        /*$select = '';

	        // Construct the select with the years
	        // You probably want to use private functions to construct
	        // the select element.
	        return $select;*/
	    }
	}

	class Cryptograph extends Application  {

	    // immediately afterwards - this is important for the encryption to work properly, and you must not forget to do
	    public function testEncrypt()
	    {
	        srand((double)microtime()*1000000 );
		    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '', MCRYPT_MODE_CFB, '');
		    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		    $ks = mcrypt_enc_get_key_size($td);
		    $key = substr(sha1('Your Secret Key Here'), 0, $ks);

		    mcrypt_generic_init($td, $key, $iv);
		    $ciphertext = mcrypt_generic($td, 'This is very important data');
		    mcrypt_generic_deinit($td);

		    mcrypt_generic_init($td, $key, $iv);
		    $plaintext = mdecrypt_generic($td, $ciphertext);
		    mcrypt_generic_deinit($td);
		    mcrypt_module_close($td);

		    //print $iv . "\n";
		    //print trim($ciphertext) . "\n";
		    //print trim($plaintext) . "\n";
	    }
	}

	require_once('Router.php');

	class Container extends Application {
	        public $headers;
	        public $footers;
	        public $page;

	        function __construct( $headers, $footers, $page ) {
	        	parent::__construct();
	            $this->headers = array();
	            $this->footers = array();
	        }

	        public function render() {
	            foreach($this->headers as $header) {
	                //include $header;
	            }

	            $this->page->render();

	            ob_start();
	            $tmp = '';
	            foreach($this->footers as $footer) {
	                
	                	 include $footer;
	            }
	            $tmp .= ob_get_clean();
	        }

	        public function addHeader($file) {
	            $this->headers[] = $file;
	        }

	        public function setHeaders( $headers = array(), $status = NULL ) {
		        if ( $status === 200 ) {
		            foreach ($headers as $key => $value) {
		            		header( $key . ': ' . $value ); 
		            }
		        }
		        else
		        	return $this->headers;
	        }


	        public function addFooter($file) {
	            $this->footers[] = $file;
	        }

	        public function setPage( $page, $params ) {
	            $this->page = $page;
	            if( file_exists( 'template/' . $page ) ) 
	            {
	            	ob_start();
					include( 'template/' . $page );
	            	$out = ob_get_clean();
	            	$out = $this->setBlocks( $out, $params);

	            	return $out;
	            }
	            else
	            	return false;
	        }

	        public function setBlocks( $layout = '', $params = '' ) {
	        	
	        	foreach($params as $k=>$v) {
	        		$layout = str_replace('{' . $k . '}', file_get_contents('template/' . $v), $layout);
	        	}

	        	return $layout;
	        	
	        }
	}
