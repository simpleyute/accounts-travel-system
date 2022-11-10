<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

      public function __construct()
      {
          parent::__construct();
          
          if(!$this->session->userdata('user_id'))
          {
            return redirect("welcome/login");
          } 
      }
      

        public function dashboard()
        {
            $this->load->model('queries');
            $users =$this->queries->viewAllUsers();
            $this->load->view('dashboard',['users' => $users]);  //landingpage
            
            if(!$this->session->userdata("user_id"))
            return redirect("welcome/login");
        }
          /*
          echo '<pre>';
          print_r($users);
          echo '<pre>';
          exit();
        */
        public function editUsers($user_id)
        {
            $this->load->model('queries');
            $userData =$this->queries->getUserRecords($user_id);
            $roles = $this->queries->getRoles();
            $this->load->view('updateUser',['userData'=>$userData,'roles'=>$roles]);
        }

        public function modifyUser($user_id)
        {
                $this->load->model('queries');  //testing ttt

                $this->form_validation->set_rules('email','Email','required|trim|callback_validCADEmail');
                $this->form_validation->set_rules('firstname','FirstName','required');
                $this->form_validation->set_rules('lastname','LastName','required');
                $this->form_validation->set_rules('role_id','Role','required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

              if($this->form_validation->run() ){

                $data =[
                  
                  'email' => $this->input->post('email'),
                  'firstname' => $this->input->post('firstname'),
                  'lastname' => $this->input->post('lastname'),
                  'role_id' => $this->input->post('role_id'),
                ];
                    $success = $this->queries->updateUserProfiles($data,$user_id);

                      if($success)
                      { 
                        $this->session->set_flashdata('message','User Updated Successfully');
                      
                      }	
                      else
                      {
                        $this->session->set_flashdata('message','Fail to Update User');
                        
                      }
                  return redirect("admin/editUsers/{$user_id}");
                  }
                  else
                  {
                    $this->editUsers($user_id);
                  }

      }


        public function disableUser($user_id){
          
          $this->load->model('queries');
          $response = $this->queries->disabled_users($user_id);

                if($response)
                {
                  $this->session->set_flashdata('deactivate_success','This user was successfully Disabled');
                }
                else
                {

                  $this->session->set_data('deactivate_fail','This user was NOT Disabled');
                }
          redirect('admin/dashboard');

        }





        
        public function validCADEmail($email)
        {
          if(!preg_match('/^[^\s]*\.[^\s]*@(cad.gov.jm|cms.gov.jm|rmc.gov.jm|supremecourt.gov.jm|courtofappeal.gov.jm|parishcourt.gov.jm)$/',$email)){
            $this->form_validation->set_message('validCADEmail', 'Please enter a valid Work Email Address');
              return false;
            }
            return true;
        }
        
        //checking if email exists 
        function checkEmail($email)
        {
          $this->load->model('queries');
          $email=$this->queries->checkMail($email);
          if($email==false){
            return true;
          }
            else {
              $this->form_validation->set_message('checkEmail', 'This Email already exists!');
              return false;
            }
        }
        

  
}