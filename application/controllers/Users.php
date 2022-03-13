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
		$data['level_of_qualification']=$this->users_model->qualification_list();
	//	print_r($data); die;
		$this->load->view('indexnew',$data);
		
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
	public function thanks(){
		$this->load->view('thank_you');
	}
	function getQualification(){
		$res = array('qualification'=>'');
		$qualification='';	
		if(isset($_POST['level_of_qualification']) && $_POST['level_of_qualification']!=''){
		$id = addslashes($_POST['level_of_qualification']);
		$res = $this->users_model->getQualification($id);        
		
		if($res){
			foreach($res as $e){
				$qualification.='<option value="'.$e->id.'" > '.$e->name.' </option>';
			} 
		}	
		$res = array('qualification'=>$qualification);
		}
		
		echo json_encode($res);
	
	}
}
