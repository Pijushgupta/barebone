<?php

class bootstrap
{
	

	function __construct()
	{

		/*change this to use diffrent directory for controller*/
		define("CONTROLLER_PATH","controller/");
                
                /*change this to use diffrent default controller*/
                define("DEFAULT_CONTROLLER","welcome");

		/*removing the tailing forward slash*/
		$url = rtrim($_GET['url'],'/');

		/*converting url string to array*/
		$url = explode('/', $url);

		/*first argument of the array $url treated as controller name*/
		if($url[0] == 'index.php'){

			/*fallback controller name, change it to change fallback
                         *  controller*/
			$url[0] = DEFAULT_CONTROLLER;
		}
		$controller_name = $url[0];
		
		/*controller file */
		$controller_file = CONTROLLER_PATH . $controller_name . '.php';


		/*Method Name*/
		if(array_key_exists(1, $url)){

			$method_name = $url[1];
		}else{
			
			/*fallback method name, it will automatically redirect 
                         * to index method. Don't change it, otherwise it will 
                         * not gonna look for index method*/
			$method_name = '' ;
		}

		$counter = 0;
		$indexer = 0;

		/*storing arguments to array arguments from url string*/
		foreach ($url as $argument) {

			if($counter>1){

				$arguments[$indexer] = $argument;
				$indexer++;
			}

			$counter++;
		}


		if(file_exists($controller_file)){

			require_once $controller_file;
			/*controller name must be same as controller class*/

			if(class_exists($controller_name)){

				$controller_app = new $controller_name;

				if(method_exists($controller_app,$method_name)){

					$controller_app->$method_name($arguments);

				}else{

					if(method_exists($controller_app, 'index')){

						$controller_app->index();

					}else{
						echo "No such method Exists";
					}
				}
			}else{

				echo "No such Class found";
			}
			

		}else{

			echo "No such Controller";
		}



		
		
		
	}
}