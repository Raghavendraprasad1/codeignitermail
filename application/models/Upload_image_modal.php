<?php
class Upload_image_modal extends CI_Model
{
    public function update_image($arr_data)
    {
        $this->db->where("id", 3);
        $result = $this->db->update("employee", $arr_data);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function multiple_upload($data_arr)
    {

        $this->db->where("id", 6);
        $result = $this->db->update("employee", $data_arr);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }
}
