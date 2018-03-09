<?php
class pijush extends baseclass{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->model('database');
        $this->database->getdata();
    }
}