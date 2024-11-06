<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Menu { 

   var $CI = NULL; 

   function __construct() { 
      // Get CI's object 
      $this->CI =& get_instance(); 
   } 

   function tampil_sidebar() { 
      // Load model 'usermodel' 
      $this->CI->load->model('usermodel'); 
      
      // Level untuk user ini 
      $level = $this->CI->session->userdata('level'); 
      
      // Ambil menu dari database sesuai dengan level 
      $data['menu'] = $this->CI->usermodel->get_menu_for_level($level); 

      $data['level'] = $level; 
      
      // Tampilkan halaman dashboard dengan data menu    
      $this->CI->load->view('sidebar-nav', $data);  
   } 

}
