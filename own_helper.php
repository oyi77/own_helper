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
             $query = $ci->db->select('*')
                        ->from($table)
                        ->where('username', $username)
                        ->or_where('email', $username)
                        ->where('password', $password)
                        ->get()->result_array();
             $login = TRUE;
        }
        else if($enc == 'md5'){
            $password = md5($password);
             $query = $ci->db->select('*')
                        ->from($table)
                        ->where('username', $username)
                        ->or_where('email', $username)
                        ->where('password', $password)
                        ->get()->result_array();
            $login = TRUE;
        }
        else if($enc == 'password_hash'){
            $query = $ci->db->select('*')
                        ->from($table)
                        ->where('username', $username)
                        ->or_where('email', $username)
                        ->get()->result_array();
            $pass = $query[0]['password'];
            password_verify($password, $pass); 
            $login = TRUE;
        }

        // if($login == TRUE){
        // unset($query[0]['password']);
        // }    

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
    function register($nama_tabel = '', $data, $enc = ''){
         $ci=& get_instance();
         $ci->load->database();

         $query = $ci->db->select('*')
                        ->from($nama_tabel)
                        ->where('username', $data['username'])
                        ->or_where('email', $data['email'])
                        ->get()->result_array();
        $num = count($query);

         if($enc == ''){
            if(array_key_exists('confirm_password', $data) == true){
                if($data['password'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else if($data['pass'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else {
                    $status = "password salah";
                }
            }
            else if(array_key_exists('password_confirm', $data) == true) {
                if($data['password'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else if($data['pass'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else {
                    $status = "password salah";
                }
            }
            else {
                $status = "tidak ada konfirmasi password";
            }
             if($num == 0){
                $ci->db->insert($nama_tabel, $data);
             }
             else{
                $status = "Data Exist!";
             }
         }
         else if($enc == 'md5'){
            if(array_key_exists('confirm_password', $data) == true){
                if($data['password'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else if($data['pass'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else {
                    $status = "password salah";
                }
            }
            else if(array_key_exists('password_confirm', $data) == true) {
                if($data['password'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else if($data['pass'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else {
                    $status = "password salah";
                }
            }
            else {
                $status = "tidak ada konfirmasi password";
            }
            if(array_key_exists('pass', $data) == true){
                $pass = array('pass' => md5($data['pass']));
                unset($data['pass']);
                $data = array_merge($data, $pass);
                }
            else if(array_key_exists('password', $data) == true){
                $pass = array('password' => md5($data['password']));
                unset($data['password']);
                $data = array_merge($data, $pass);
                }
             if($num == 0){
                $ci->db->insert($nama_tabel, $data);
             }
             else{
                $status = "Data Exist!";
             }
         }
         else if($enc == 'password_hash'){
            $options = [
                        'cost' => 11,
                        ];
            if(array_key_exists('confirm_password', $data) == true){
                if($data['password'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else if($data['pass'] == $data['confirm_password']){
                    $status = "password cocok";
                    unset($data['confirm_password']);
                }
                else {
                    $status = "password salah";
                }
            }
            else if(array_key_exists('password_confirm', $data) == true) {
                if($data['password'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else if($data['pass'] == $data['password_confirm']){
                    $status = "password cocok";
                    unset($data['password_confirm']);
                }
                else {
                    $status = "password salah";
                }
            }
            else {
                $status = "tidak ada konfirmasi password";
            }
            if(array_key_exists('pass', $data) == true){
                $pass = array('pass' => password_hash($data['pass'], PASSWORD_BCRYPT, $options));
                unset($data['pass']);
                $data = array_merge($data, $pass);
                }
            else if(array_key_exists('password', $data) == true){
                $pass = array('password' => password_hash($data['password'], PASSWORD_BCRYPT, $options));
                unset($data['password']);
                $data = array_merge($data, $pass);
                }
             if($num == 0){
                $ci->db->insert($nama_tabel, $data);
             }
             else{
                $status = "Data Exist!";
             }
         }

         return $status;
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

         if ($nama_sesi == ''){
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