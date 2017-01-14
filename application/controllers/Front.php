<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller
{

    public function index()
    {
        $this->home_view();
    }

    public function home_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_home_front'] = 'vw_home_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['slideshow'] = $this->Mdl_admin->load_slide();
        $data['home'] = $this->Mdl_admin->load_home();

        $this->load->view('vw_front',$data);
    }
    public function about_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("About Us");

        $this->load->view('vw_front',$data);
    }
    public function supply_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("Supply Chain Solution");

        $this->load->view('vw_front',$data);
    }
    public function freights_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("Freights");

        $this->load->view('vw_front',$data);
    }
    public function customer_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_customer_front'] = 'vw_customer_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['slideshow'] = $this->Mdl_admin->load_slide();
        $data['customer'] = $this->Mdl_admin->load_customer();

        $this->load->view('vw_front',$data);
    }
    public function contact_us()
    {
        $this->load->model('Mdl_admin');
        $data['vw_contact'] = 'vw_contact';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['slideshow'] = $this->Mdl_admin->load_slide();
        $data['customer'] = $this->Mdl_admin->load_customer();

        $this->load->view('vw_front',$data);
    }
    public function send_message()
    {

        $this->load->model('Mdl_admin');
        $data['vw_contact'] = 'vw_contact';
        $data['settings'] = $this->Mdl_admin->load_settings();

        $result = $this->Mdl_admin->message();
        if($result==1)
        {
            $data['msg'] = 'Thank you for your message!!';
            $data['msg_type'] = 'success';
        }
        else
        {
            $data['msg'] = 'Sorry!! There Was a problem while sending your message.Try Again!!';
            $data['msg_type'] = 'danger';
        }

        $this->load->view('vw_front',$data);
    }
}