<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_image extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_image_modal');
    }

    public function index()
    {
        $this->load->view('upload_image');
    }

    public function upload_img()
    {

        $config = array(
            'upload_path' => FCPATH . 'assets/images/',
            'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
            'max_size' => "26200",

        );

        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("img")) {

            $data = $this->upload->data();
            // code for resize image
            $config2 = array(
                'image_library' => 'gd2', //get original image
                'source_image' => FCPATH . 'assets/images/' . $data['file_name'], //save as new image //need to create thumbs first
                // 'maintain_ratio' => False,
                'width' => 200,
                'height' => 200,
                'new_image' => FCPATH . 'assets/thumbs/' . 'thumb' . $data['file_name'],
            );

            $this->load->library('image_lib'); //load library
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
            $this->image_lib->clear();

            // code to upload image into database
            $arr_data["vProfilePic"] = $data['file_name'];
            $result = $this->upload_image_modal->update_image($arr_data);

            if ($result) {
                echo "<script> alert('image uploaded successfully') </script>";
                $this->load->view('upload_image');
            } else {
                echo "<script> alert('image upload failed') </script>";
                $this->load->view('upload_image');
            }

        } else {
            echo "we found some error";
        }
    }

}
