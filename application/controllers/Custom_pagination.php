<?php

class Custom_pagination extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pagination_model");
    }

    public function index()
    {
        $this->load->view("pagination_listing");
    }

    public function getData()
    {
        $page = "";
        $record_per_page = 5;
        if ($this->input->post("page")) {
            $page = $this->input->post("page");
        }
        $page = 1;
        $data = $this->pagination_model->getData($page);
        $number_of_rows = $this->pagination_model->getTotalCount();

        $output = "";
        $output .= "
                <table class='table table-bordered'>
                     <tr>
                          <th width='50%'>Id</th>
                          <th width='50%'>Email</th>
                          <th width='50%'>Password</th>
                     </tr>
           ";
        foreach ($data as $row) {
            $output .= '
                     <tr>
                          <td>' . $row->iCustomerId . '</td>
                          <td>' . $row->vEmail . '</td>
                          <td>' . $row->vPassword . '</td>
                     </tr>
                ';
        }
        $output .= '</table><br /><div align="center">';
        // $page_query = "SELECT * FROM tbl_student ORDER BY student_id DESC";
        // $page_result = mysqli_query($connect, $page_query);
        // $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil($number_of_rows / $record_per_page);
        for ($i = 1; $i <= $total_pages; $i++) {
            $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='" . $i . "'>" . $i . "</span>";
        }
        $output .= '</div><br /><br />';
        echo $output;

    }
}
