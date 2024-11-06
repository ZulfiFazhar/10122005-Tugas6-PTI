<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model 
{
    public function get_menu_for_level($user_level) 
    {
        $this->db->from('menu');
        $this->db->like('menu_allowed', '+' . $user_level . '+');
        return $this->db->get();
    }

    public function get_array_menu($id) 
    {
        $this->db->select('menu_allowed');
        $this->db->from('menu');
        $this->db->where('menu_id', $id);
        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            $row = $data->row();
            $level = $row->menu_allowed;
            return explode('+', $level);
        } else {
            die('No menu found for the specified ID.');
        }
    }

    public function select_all($id_user) 
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id_user);
        return $this->db->get();
    }
}
