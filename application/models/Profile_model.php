<?php

class Profile_model extends CI_Model
{
    public function save($request)
    {
        $result = $this->db->insert("employee", $request);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function change_pass($vPassword)
    {
        $data["vPassword"] = $vPassword;
        $this->db->where("id", 1);
        $result = $this->db->update("employee", $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function checkCurrentPassword($vOldPassword, $iId)
    {
        $this->db->select("*");
        $this->db->where("id", $iId);
        $this->db->where("vPassword", $vOldPassword);
        $this->db->from("employee");
        return $this->db->get()->num_rows();
    }
}
