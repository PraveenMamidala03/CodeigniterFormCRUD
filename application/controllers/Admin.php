<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
	 parent::__construct();
	 $this->load->model('users_model');
	}
	public function index()
	{
		$data['users'] = $this->users_model->users_list();
		$this->load->view('users',$data);
	}
	public function create_user(){
		$this->load->view('register_admin');
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
			redirect('users/users_list','refresh');
        } else {
            echo '<script>alert("registration failed please try again!");</script>';
            redirect('users', 'refresh');
        }
	}
	public function users_list(){
		$data['users'] = $this->users_model->users_list();
		$this->load->view('users',$data);
	}
	public function user($id){
		$data['user'] = $this->users_model->user_data($id);
		$this->load->view('user_edit',$data);
	}
	public function user_edit(){
		$name = $this->input->post('name');
		$id = $this->input->post('id');
        $mobile = $this->input->post('phone_number');
        $dfb = $this->input->post('birth_date');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
		$image='';
		if($_FILES['image']['name']!=""){
		$image=time().$_FILES['image']['name'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$data['image']=$image;
		$path="assets/img/".$image;
		$upload_files_status=move_uploaded_file($tmp_name,$path);
		$update = array(
            'mobile' => $mobile,
            'date_of_birth' => $dfb,
            'name' => $name,
            'gender' => $gender,
            'image' => $image,
            'email' => $email
        );
		}else{
			$update = array(
            'mobile' => $mobile,
            'date_of_birth' => $dfb,
            'name' => $name,
            'gender' => $gender,
            'email' => $email
        );
		}
		
		$result = $this->users_model->Update_user_data($update,$id);
		 if ($result) {
		 	echo '<script>alert("user data updated");</script>';
			redirect('admin/users_list', 'refresh');
        } else {
            echo '<script>alert("date edit failed!");</script>';
            redirect('admin/users_list', 'refresh');
        }
	}
	public function user_delete($id){
		$result = $this->users_model->Delete_user_data($id);
		 if ($result) {
		 	echo '<script>alert("user deleted successfully");</script>';
			redirect('admin/users_list', 'refresh');
        } else {
            echo '<script>alert("Unable to delete the user!");</script>';
            redirect('admin/users_list', 'refresh');
        }
	}
}
