<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testController extends CI_Controller {

	function __construct(){
        /* Session Checking Start*/
        parent::__construct();   
    }
    public function index($value='')
    {
    	$this->load->view('login');
    }

}