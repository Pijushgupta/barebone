<?php
require_once 'config.php';
class baseclass{
        
	function __construct(){
	}
        
        /* This function will load view*/
	function view($v_args=null){
            if($v_args!=null){
                $view_file = VIEW_PATH . $v_args .'.php';
                if(file_exists($view_file)){
                    include $view_file;
                }
            }else{
                return false;
            }
	}
        
	function model($m_args=null){
            if($m_args!=null){
                $model_file = MODEL_PATH . $m_args . '.php';
                if(file_exists($model_file)){
                    include $model_file;
                    $$m_args = new $m_args;
                }
            }else{
                return false;
            }
	}
        
        
        
	function lib($l_args=null){	
            echo "hello from model";
	}
}