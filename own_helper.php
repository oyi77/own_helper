<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   

}

if ( ! function_exists('cek'))
{
    function cek($var = '')//buat kalo pengen ngecek variabel
    {
    	$string = print_r($var, TRUE);
    	$echo = "<pre>".$string."</pre>";
        return $echo;
    }   

}

if ( ! function_exists('alert'))
{
    function alert($var = '')//buat bikin alert tapi lewat php
    {
    	$echo = "<script>alert('".$var."')</script>";
        return $echo;
    }   

}

if ( ! function_exists('login'))
{
    function login($table = 'user', $username, $password, $enc = '')//buat login instant
    {
    	$ci=& get_instance();
        $ci->load->database(); 

        // $q = 
        // $ci->query("SHOW KEYS FROM".$table."WHERE Key_name = 'PRIMARY'");
        $login = FALSE;
        $a = ambil_primary($table);
        if($enc == ''){
        	$password = $password;
        }
        else if($enc == 'md5'){
        	$password = md5($password);
        }
        else if($enc == 'password_hash'){
        	$query = $ci->db->select('*')
        				->from($table)
        				->where('username', $username)
        				->get()->result_array();
        	$pass = $query[0]['password'];
        	password_verify($password, $pass); 
        	$login = TRUE;
        }

		if($login == TRUE){
		unset($query[0]['password']);
		}        
		else {

        $query = $ci->db->select('*')
        				->from($table)
        				->where('username', $username)
        				->where('password', $password)
        				->get()->result_array();
        $login = TRUE;
		}




        set_sesi($a, $query[0][$a]);

        
    	return $query;
    }
}

if ( ! function_exists('ambil_sesi'))//buat pengambilan session
{
    function ambil_sesi($nama_sesi = ''){
    	 $ci=& get_instance();
         $ci->load->library('session');

	     return $ci->session->userdata($nama_sesi);
    	    }
}

if ( ! function_exists('register'))//buat register instant tapi belum sempurna karena kurang instan
{
    function register($nama_tabel = '', $data){
    	 $ci=& get_instance();
         $ci->load->database();
	     return $ci->db->insert($nama_tabel, $data);
    	    }
}

if ( ! function_exists('set_sesi'))//setting session
{
    function set_sesi($nama_sesi = '', $data){
    	 $ci=& get_instance();
         $ci->load->library('session');

	     return $ci->session->set_userdata($nama_sesi, $data);
    	    }
}

if ( ! function_exists('hapus_sesi'))//deleting session 
{
    function hapus_sesi($nama_sesi = ''){
    	 $ci=& get_instance();
         $ci->load->library('session');

         if ($nama_sesi = ''){
         	$ci->session->sess_destroy();
         	$echo = "session destroyed!";
         }

         else {
         	$ci->session->unset_userdata($nama_sesi);
         	$echo = "session unsetted!";
         }

	     return $echo;
    	    }
}

if ( ! function_exists('form_register'))//buat bikin form register instant
{
	function form_register($table, $action){

	}
}

if ( ! function_exists('form_login'))//buat bikin form register instant
{
	function form_login($table, $action){

	}
}

if ( ! function_exists('ambil_primary'))
{
   	function ambil_primary($table){
   		$ci=& get_instance();
        $ci->load->database(); 
   		$val = $ci->db->field_data($table);

        foreach ($val as $a) {
        	if($a->primary_key == 1){
        		return $a->name;
        	}
        }
   	}

}