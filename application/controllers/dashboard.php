<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->template->load('template','view_dashboard');
	}
}