<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Users extends REST_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
	public function user_list_get() {
        $result =$this->users_model->users_list();
        if ($result) {
			$this->set_response(array(
				'status' => TRUE,
				'message' => 'user list',
				'data' => $result
				), REST_Controller::HTTP_OK);
				return;
        }else{
			$this->set_response(array(
                'status' => FALSE,
                'message' => 'There is No users'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        } 
    }
    public function crete_user_post() {
        $name = $this->input->post('name');
        $mobile = $this->input->post('phone_number');
        $dfb = $this->input->post('birth_date');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
		$current_datetime = date('Y-m-d H:i:s');
		$image='';
        if (!valid_email($email)) {
        $this->set_response(array(
            'status' => FALSE,
            'message' => 'Invalid email'
                ), REST_Controller::HTTP_OK);
        return;
        }
        if (strlen($mobile) != 10) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid phone number'
                    ), REST_Controller::HTTP_OK);
            return;
        }
        if (strlen($gender)==0  ) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Please Give gender details'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        }
        if ($_FILES['image']['name']=="") {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Please Select Image'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        }
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
			$this->set_response(array(
				'status' => TRUE,
				'message' => 'user created',
				'data' => $result
				), REST_Controller::HTTP_OK);
				return;
        }else{
			$this->set_response(array(
                'status' => FALSE,
                'message' => 'Please try again'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        } 
    }
    public function edit_user_post() {
        $id = $this->input->post('user_id');
        $name = $this->input->post('name');
        $mobile = $this->input->post('phone_number');
        $dfb = $this->input->post('birth_date');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
		$current_datetime = date('Y-m-d H:i:s');
		$image='';
        if (!valid_email($email)) {
        $this->set_response(array(
            'status' => FALSE,
            'message' => 'Invalid email'
                ), REST_Controller::HTTP_OK);
        return;
        }
        if (strlen($id) ==0) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid User id number'
                    ), REST_Controller::HTTP_OK);
            return;
        }
        $res=$this->users_model->user_data($id);
        if (empty($res)) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid User id'
                    ), REST_Controller::HTTP_OK);
            return;
        }
        if (strlen($mobile) != 10) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid phone number'
                    ), REST_Controller::HTTP_OK);
            return;
        }
        if (strlen($gender)==0  ) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Please Give gender details'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        }
        if ($_FILES['image']['name']=="") {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Please Select Image'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        }
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
			$this->set_response(array(
				'status' => TRUE,
				'message' => 'user datails edited',
				'data' => $result
				), REST_Controller::HTTP_OK);
				return;
        }else{
			$this->set_response(array(
                'status' => FALSE,
                'message' => 'Please try again'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        } 
    }
    public function detele_user_post() {
        $id = $this->input->post('user_id');
        if (strlen($id) ==0) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid User id number'
                    ), REST_Controller::HTTP_OK);
            return;
        }
        $res=$this->users_model->user_data($id);
        if (empty($res)) {
            $this->set_response(array(
                'status' => FALSE,
                'message' => 'Invalid User id'
                    ), REST_Controller::HTTP_OK);
            return;
        }
		$result = $this->users_model->Delete_user_data($id);
        if ($result) {
			$this->set_response(array(
				'status' => TRUE,
				'message' => 'user deleted',
				'data' => $result
				), REST_Controller::HTTP_OK);
				return;
        }else{
			$this->set_response(array(
                'status' => FALSE,
                'message' => 'Please try again'
                    ), REST_Controller::HTTP_UNAUTHORIZED);
            return;
        } 
    }
}
?>