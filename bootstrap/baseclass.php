<?php
require_once 'config.php';
class baseclass{
        
	function __construct(){
	}

	function view($v_args=null){
            echo "Hello from view"; 
	}
        
	function model($m_args=null){
            echo "Hello from model";
	}
        
	function lib($l_args=null){	
            echo "hello from model";
	}
}