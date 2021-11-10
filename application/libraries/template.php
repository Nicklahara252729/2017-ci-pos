<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Template {
	var $theme_data = array();
	function set($name , $value){
		$this->theme_data[$name] = $value;
	}

	function load($theme = '', $view = '', $view_data = array(), $return=FALSE){
		$this->CI =& get_instance();
		$this->set('contents',$this->CI->load->view($view,$view_data,TRUE));
		return $this->CI->load->view($theme, $this->theme_data,$return);
	}
}