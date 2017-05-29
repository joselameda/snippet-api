<?php
class User_model extends CI_Model {

    public function create($name, $email, $password)
    {
        $data = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];

        return $this->db->insert('user', $data);
    }

    public function update($id, $name)
    {
        if(!$id){
            return false;
        }
        $data = [
            "name" => $name
        ];

        return $this->db->where('id', $id)->update('user', $data);
    }

    public function delete($id)
    {
        if(!$id){
            return false;
        }
        return $this->db->where('id', $id)->delete('user');
    }

    public function update_password($id, $new_password)
    {
        if(!$id){
            return false;
        }
        $data = [
            "password" => $new_password
        ];

        return $this->db->where('id', $id)->update('user', $data);
    }

    public function get($id)
    {
        if($id){
            return $this->db->where('id', $id)->get('user')->row();
        }else{
            return $this->db->get('user')->result();            
        }
    }

    public function get_login($email, $password)
    {
        $where = [
            'email' => $email,
            'password' => $password
        ];
        return $this->db->where($where)->get('user')->row();
    }

}