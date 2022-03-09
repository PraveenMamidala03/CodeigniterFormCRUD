<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
	 parent::__construct();
	 $this->load->model('users_model');
	}
	public function index()
	{
		$this->load->view('register');
		
	}
	public function register_action()
	{
		$name = $this->input->post('name');
        $mobile = $this->input->post('phone_number');
        $dfb = $this->input->post('birth_date');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
		$current_datetime = date('Y-m-d H:i:s');
		$image='';
		if($_FILES['image']['name']!=""){
		$image=time().$_FILES['image']['name'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$data['image']=$image;
		$path="assets/img/".$image;
		$upload_files_status=move_uploaded_file($tmp_name,$path);
		}
		$insert = array(
            'mobile' => $mobile,
            'date_of_birth' => $dfb,
            'name' => $name,
            'gender' => $gender,
            'image' => $image,
            'email' => $email,
            'created_record' => $current_datetime
        );
		$result = $this->users_model->User_Registration($insert);
		
        if ($result) {
			echo '<script>alert("registration successfully completed!");</script>';
			redirect('users/thanks', 'refresh');
        } else {
            echo '<script>alert("registration failed please try again!");</script>';
            redirect('users', 'refresh');
        }
	}
	public function thanks(){
		$this->load->view('thank_you');
	}
}
