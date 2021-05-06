<?php
class Pagination_model extends CI_Model
{
    public function getData($page)
    {

        $record_per_page = 5;
        $start_from = ($page - 1) * $record_per_page;
        $this->db->select("	iCustomerId,vEmail,vPassword");
        $this->db->limit($record_per_page, $start_from);
        $query = $this->db->get("login");
        return $query->result();
        // echo $query->num_rows();
        // // print_r($data);
        // die;
    }

    public function getTotalCount()
    {
        $this->db->select("*");
        $query = $this->db->get("login");
        return $query->num_rows();

    }
}
