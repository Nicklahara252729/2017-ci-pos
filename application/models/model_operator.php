<?php
if(!defined('BASEPATH')) exit('no file allowed');

class Model_Operator extends CI_Model{
	function login($username,$password){
		$cek = $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));
		if($cek->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	function tampil_data(){
		return $this->db->get('operator');
	}

	function paging($page,$batas){
		$query = "select * from operator limit $page,$batas";
		return $this->db->query($query);
	}

	function get_one($id){
		$param = array('operator_id'=>$id);
		return $this->db->get_where('operator',$param);
	}
	
	 public function update_cookie($data, $id_user)
    {
        $this->db->where($this->operator_id, $id_user);
        $this->db->update('user', $data);
    }
}