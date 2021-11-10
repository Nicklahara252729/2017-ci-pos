<?php
if(!defined('BASEPATH')) exit('no file allowed');
function check_session(){
	$Ci =& get_instance();
	$session = $Ci->session->userdata('status_login');
	if($session!='oke'){
		redirect(site_url('front'));
	}
}

function check_session_login(){
	$Ci =& get_instance();
	$session = $Ci->session->userdata('status_login');
	if($session=='oke'){
		redirect(site_url('kategori'));
		}
	}
	