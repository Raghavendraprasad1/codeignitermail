<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');

    }

    public function index()
    {
        $this->load->view("signup");
    }

    public function save()
    {
        $request = $this->input->post();
        // print_r($request);die;
        $request = $this->security->xss_clean($request);
        $vEmail = $request["vEmail"];

        $this->db->select("*");
        $this->db->where("vEmail", $vEmail);
        $this->db->from("employee");
        $row_data = $this->db->get()->num_rows();
        if ($row_data > 0) {
            $is_unique = '|is_unique[employee.vEmail]';
        } else {
            $is_unique = '';
        }

        $validate[] = array(
            'field' => 'vEmail',
            'label' => 'Email',
            'rules' => 'trim|required|xss_clean' . $is_unique,

        );

        $this->form_validation->set_rules($validate);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'this email id is already exist');
            // echo "<script>alert('this email id is already exist!');</script>";
            redirect('login');
        } else {
            $data = array(
                "vName" => $request["vName"],
                "vEmail" => $request["vEmail"],
                "vPassword" => $request["vPassword"],
            );

            $result = $this->profile_model->save($data);
            if ($result) {
                $this->session->set_flashdata("success", "data saved successfully");
            } else {
                $this->session->set_flashdata("error", "data base error occured !");

            }
            redirect('login');

        }

    }

    public function change_pass_view()
    {
        $this->load->view("change_pass");
    }

    public function old_password_match($vOldPassword)
    {
        $result = $this->profile_model->checkCurrentPassword($vOldPassword, 1);
        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function save_pass()
    {
        $request = $this->input->post();
        $request = $this->security->xss_clean($request);
        $vPassword = $request["vPassword"];

        $this->form_validation->set_rules('vPassword', 'New Password', 'required');
        $this->form_validation->set_rules('vOldPassword', 'Current Password', 'required|callback_old_password_match');
        $this->form_validation->set_rules('vConfirmPassword', 'Confirm Password', 'required|matches[vPassword]');

        $this->form_validation->set_message('old_password_match', "INVALID_CURRENT_PASSWORD");

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->load->view("change_pass");

        } else {
            $vPassword = $request["vPassword"];
            $result = $this->profile_model->change_pass($vPassword);
            if ($result) {
                $this->session->set_flashdata('success', 'password changed successfully');
                $this->load->view("change_pass");

            }

        }

    }
}
