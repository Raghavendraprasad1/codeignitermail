<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Multiple_upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_image_modal');
    }

    public function index()
    {
        $this->load->view("multiple_upload");
    }

    public function upload_multiple_image()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // load upload library
            $this->load->library("upload");
            // create config.
            $config = array(
                'upload_path' => FCPATH . 'assets/images/',
                'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
                'max_size' => "26200",
            );

            $this->upload->initialize($config);
            $this->upload->do_upload("first_img");
            $first_img_data = $this->upload->data();
            $first_image = $first_img_data["file_name"]; // find name of image

            // for second image.
            $config = array(
                'upload_path' => FCPATH . 'assets/images/',
                'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
                'max_size' => "26200",
            );

            $this->upload->initialize($config);
            $this->upload->do_upload("second_img");
            $second_img_data = $this->upload->data();

            $second_image = $second_img_data["file_name"];

            // for third image.
            $config = array(
                'upload_path' => FCPATH . 'assets/images/',
                'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
                'max_size' => "26200",
            );

            $this->upload->initialize($config);
            $this->upload->do_upload("third_img");
            $third_img_data = $this->upload->data();
            $third_image = $third_img_data["file_name"];

            // create array of image data to upload in db
            $data_arr = array(
                "vProfilePic" => $first_image,
                "vProfilePic2" => $second_image,
                "vProfilePic3" => $third_image,
            );

            $result = $this->upload_image_modal->multiple_upload($data_arr);

            if ($result) {
                echo "<script> alert('image uploaded successfully') </script>";
                $this->load->view("multiple_upload");
            } else {
                echo "<script> alert('image upload failed') </script>";
                $this->load->view("multiple_upload");
            }

        }

    }
}
