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
		$this->load->view('adminAddUser');
	}
	public function register_action()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
        $mobile = $this->input->post('phone');
        $dfb = $this->input->post('dateofbirth');
        $gender = $this->input->post('gender');
        $level_of_qualification = $this->input->post('level_of_qualification');
        $qualification = $this->input->post('qualification');
        $study = $this->input->post('study');
        $course = $this->input->post('course');
        $comment = $this->input->post('comment');
		$current_datetime = date('Y-m-d H:i:s');
		$image='';
		if($_FILES['image']['name']!=""){
		$image=time().$_FILES['image']['name'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$data['image']=$image;
		$path="assets/img/".$image;
		move_uploaded_file($tmp_name,$path);
		}
		$insert = array(
            'mobile' => $mobile,
            'date_of_birth' => $dfb,
            'name' => $name,
            'gender' => $gender,
            'image' => $image,
            'email' => $email,
            'level_of_qualification' => $level_of_qualification,
            'qualification' => $qualification,
            'study' => $study,
            'course' => $course,
            'comment' => $comment,
            'created_record' => $current_datetime
        );
		$result = $this->users_model->User_Registration($insert);
		
        if ($result) {
			$status=true;
			$url =base_url('users/thanks');
        } else {
            $status=false;
			$url ='';
        }
		$res = array('status'=>$status,'url'=>$url);
		echo json_encode($res); exit;
	}
	public function users_list(){
		$data['users'] = $this->users_model->users_list();
		$this->load->view('users',$data);
	}
	public function user($id){
		$data['user'] = $this->users_model->user_data($id);
		$level_of_qualification= $data['user']->level_of_qualification;
		$data['level_of_qualification']=$this->users_model->qualification_list();
		$data['qualification']=  $this->users_model->getQualification($level_of_qualification);
		$this->load->view('EditAddUser',$data);
	}
	public function user_edit(){
		$update=array();
		$name = $this->input->post('name');
		$id = $this->input->post('id');
		$email = $this->input->post('email');
        $mobile = $this->input->post('phone');
        $dfb = $this->input->post('dateofbirth');
        $gender = $this->input->post('gender');
        $level_of_qualification = $this->input->post('level_of_qualification');
        $qualification = $this->input->post('qualification');
        $study = $this->input->post('study');
        $course = $this->input->post('course');
        $comment = $this->input->post('comment');
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
            'email' => $email,
            'level_of_qualification' => $level_of_qualification,
            'qualification' => $qualification,
            'study' => $study,
            'course' => $course,
            'comment' => $comment,
        );
		}else{
			$update = array(
				'mobile' => $mobile,
				'date_of_birth' => $dfb,
				'name' => $name,
				'gender' => $gender,
				'email' => $email,
				'level_of_qualification' => $level_of_qualification,
				'qualification' => $qualification,
				'study' => $study,
				'course' => $course,
				'comment' => $comment,
      	  );
		}
		$result = $this->users_model->Update_user_data($update,$id);
		if ($result) {
			$status=true;
			$url =base_url('admin/users_list');
        } else {
            $status=false;
			$url ='';
        }
		$res = array('status'=>$status,'url'=>$url);
		echo json_encode($res); exit;
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
