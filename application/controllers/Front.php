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
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function story_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("Our Story");
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function team_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("Our Team");
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function technology_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_pages_front'] = 'vw_pages_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['pages'] = $this->Mdl_admin->load_pages("Technology");
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function supply_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_supply_front'] = 'vw_supply_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['slideshow'] = $this->Mdl_admin->load_slide();
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function services_view()
    {
        $this->load->model('Mdl_admin');
        $data['vw_services_front'] = 'vw_services_front';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['slideshow'] = $this->Mdl_admin->load_slide();
        $data['services'] = $this->Mdl_admin->load_services();
        $data['supply'] = $this->Mdl_admin->load_supply();

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
        $data['supply'] = $this->Mdl_admin->load_supply();

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
        $data['supply'] = $this->Mdl_admin->load_supply();

        $this->load->view('vw_front',$data);
    }
    public function send_message()
    {

        $this->load->model('Mdl_admin');
        $data['vw_contact'] = 'vw_contact';
        $data['supply'] = $this->Mdl_admin->load_supply();
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