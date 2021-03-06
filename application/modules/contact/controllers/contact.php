<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }

    function index()
    {
        //set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {
            //validation fails or first page load
           // $this->load->view('contact_form_view');
		    $data['module'] = 'contact';
			$data['view_file'] = 'contact_form_view';
			echo Modules::run('template/public_view', $data);
			
        }
        else
        {
            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
			$from_website = $this->input->post('website');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
			$message .= "<br /><br /> From website:".$this->input->post('website'); 

            //set to_email id to which you want to receive mails
            $to_email = 'mesho_w@hotmail.com';

            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'uk4arabs@gmail.com';
            $config['smtp_pass'] = 'micwmicw';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            //$this->load->library('email', $config);
            $this->email->initialize($config);                        

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                redirect('contact/index');
            }
            else
            {
                //error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('contact/index');
            }
        }
    }
    
    //custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}