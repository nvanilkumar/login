<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class playlist extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
            $this->view_dir = strtolower(__CLASS__) . '/';  
    }  
    public function index()
    {
        e('test');
        
    }

     
}