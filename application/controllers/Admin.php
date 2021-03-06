<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
		function __construct() {
        parent::__construct();
      	$this->load->helper(array('form', 'url'));
      	$this->load->model('Mdl_admin');
		/* chk user logged in or not*/
		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect('admin_login');
		}		
    }
    //  ##Load pages
	public function index()
	{
		$this->home();
	}
	public function home(){

        $this->load->database();
        $this->load->model('Mdl_admin');
        $data['vw_home'] = 'vw_home';
        $data['msg'] = '';
        $data['settings'] = $this->Mdl_admin->load_settings();
        $data['profile'] = $this->Mdl_admin->load_profile();
        $data['home'] = $this->Mdl_admin->load_home();
        $data['admin_name'] = $this->session->userdata('admin_name');
        $num_rows = $this->db->count_all("inbox");
        $data['inbox_total'] = $num_rows;
        $data['inbox_count'] = $this->Mdl_admin->inbox_count();

        $this->load->view('vw_admin',$data);
	}

	public function update_home()
	{
		$this->load->model('Mdl_update');
		$target_file = $this->home_photo_update();
		$name = $_FILES['home_photo']['name'];

		$data['vw_home'] = 'vw_home';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['home'] = $this->Mdl_update->home_updated($target_file,$name);
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['settings'] = $this->Mdl_admin->load_settings();

		if($data['home'] ==0)
		{

			$data['home'] = $this->Mdl_admin->load_home();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}

		else
		{

			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated home!!';
			$data['msg_type'] = 'success';
		}




		$this->load->view('vw_admin',$data);
	}
	private function home_photo_update()
	{
		if($_FILES['home_photo']['name']!='')
		{
			$name = $_FILES['home_photo']['name'];
			$name_ext = explode('.',$name );
			$ext = end($name_ext);
			$target_name = uniqid(rand()).".".$ext;
			$target_file = "assets/upload/home/".$target_name;
			$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
			$file_type = $_FILES['home_photo']['type'];

			if(in_array($ext, $allowed_types))
			{
				if(is_uploaded_file($_FILES['home_photo']['tmp_name']))

				{
					if(move_uploaded_file($_FILES['home_photo']['tmp_name'], $target_file))
					{

						return $target_file;
					}

					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

	//## Settings update

	public function settings_update()
	{
		$this->load->model('Mdl_update');
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $target_file1 =$this->logo_upload();
        $name1 = $_FILES['settings_logo']['name'];
        $target_file2 =$this->icon_upload();
        $name2 = $_FILES['settings_icon']['name'];

        
        $data['settings'] = $this->Mdl_update->settings_edited($target_file1,$name1,$target_file2,$name2);
    	$data['profile'] = $this->Mdl_admin->load_profile();

    	if($data['settings'] ==0)
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated Settings!!';
			$data['msg_type'] = 'success';
		}
		$data['vw_home'] = 'vw_home';
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['admin_name'] = $this->session->userdata('admin_name');
		$data['home'] = $this->Mdl_admin->load_home();
		

		$this->load->view('vw_admin',$data);
    	
	}
		private function logo_upload()
		{
			if($_FILES['settings_logo']['name']!='')
			{
				$name = $_FILES['settings_logo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file1 = "assets/upload/photo/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['settings_logo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['settings_logo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['settings_logo']['tmp_name'], $target_file1))
							{
								
								return $target_file1;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
		private function icon_upload()
		{
			if($_FILES['settings_icon']['name']!='')
			{
				$name = $_FILES['settings_icon']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file2 = "assets/upload/photo/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['settings_icon']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['settings_icon']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['settings_icon']['tmp_name'], $target_file2))
							{
								
								return $target_file2;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
	//Pages
 public function story()
	{
		$this->load->model('Mdl_update');
		$data['vw_pages'] = 'vw_pages';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['pages'] = $this->Mdl_admin->load_pages("Our story");
	
		$this->load->view('vw_admin',$data);
	}
	public function technology()
	{
		$this->load->model('Mdl_update');
		$data['vw_pages'] = 'vw_pages';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['pages'] = $this->Mdl_admin->load_pages("Technology");

		$this->load->view('vw_admin',$data);
	}
	public function team()
	{
		$this->load->model('Mdl_update');
		$data['vw_pages'] = 'vw_pages';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['pages'] = $this->Mdl_admin->load_pages("Our team");

		$this->load->view('vw_admin',$data);
	}

	public function update_pages()
	{
		$this->load->model('Mdl_update');
        $target_file_1 = $this->pages_photo_1_update();
		$target_file_2 = $this->pages_photo_2_update();
		$target_file_3 = $this->pages_photo_3_update();
        $name_1 = $_FILES['pages_photo_1']['name'];
		$name_2 = $_FILES['pages_photo_2']['name'];
		$name_3 = $_FILES['pages_photo_3']['name'];

        $data['vw_pages'] = 'vw_pages';
        $num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $data['pages'] = $this->Mdl_update->about_updated($target_file_1,$target_file_2,$target_file_3,$name_1,$name_2,$name_3);
    	$data['profile'] = $this->Mdl_admin->load_profile();
    	$data['settings'] = $this->Mdl_admin->load_settings();

    	if($data['pages'] ==0)
		{
			
			$data['pages'] = $this->Mdl_admin->load_pages($page_name);
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated Details!!';
			$data['msg_type'] = 'success';
		}
		
 
 	
		
		$this->load->view('vw_admin',$data);   	
	}
		private function pages_photo_1_update()
		{
			if($_FILES['pages_photo_1']['name']!='')
			{
				$name = $_FILES['pages_photo_1']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/photo/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['pages_photo_1']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['pages_photo_1']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['pages_photo_1']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
	private function pages_photo_2_update()
	{
		if($_FILES['pages_photo_2']['name']!='')
		{
			$name = $_FILES['pages_photo_2']['name'];
			$name_ext = explode('.',$name );
			$ext = end($name_ext);
			$target_name = uniqid(rand()).".".$ext;
			$target_file = "assets/upload/photo/".$target_name;
			$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
			$file_type = $_FILES['pages_photo_2']['type'];

			if(in_array($ext, $allowed_types))
			{
				if(is_uploaded_file($_FILES['pages_photo_2']['tmp_name']))

				{
					if(move_uploaded_file($_FILES['pages_photo_2']['tmp_name'], $target_file))
					{

						return $target_file;
					}

					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}
	private function pages_photo_3_update()
	{
		if($_FILES['pages_photo_3']['name']!='')
		{
			$name = $_FILES['pages_photo_3']['name'];
			$name_ext = explode('.',$name );
			$ext = end($name_ext);
			$target_name = uniqid(rand()).".".$ext;
			$target_file = "assets/upload/photo/".$target_name;
			$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
			$file_type = $_FILES['pages_photo_3']['type'];

			if(in_array($ext, $allowed_types))
			{
				if(is_uploaded_file($_FILES['pages_photo_3']['tmp_name']))

				{
					if(move_uploaded_file($_FILES['pages_photo_3']['tmp_name'], $target_file))
					{

						return $target_file;
					}

					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}
		// Portfolio
	
	 public function portfolio()
	{
		$this->load->model('Mdl_update');
		$data['vw_portfolio'] = 'vw_portfolio';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['portfolio'] = $this->Mdl_admin->load_portfolio();
	
		$this->load->view('vw_admin',$data);
	}
	public function portfolio_publish()
	{
		$data['vw_portfolio'] = 'vw_portfolio';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$target_file =$this->portfolio_photo();
		$result = $this->Mdl_admin->portfolio_insert($target_file);
		if($result==1)
		{
			$data['msg'] = 'Successfully Added the portfolio!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! portfolio Couldnt added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['portfolio'] = $this->Mdl_admin->load_portfolio();
		
		$this->load->view('vw_admin',$data);
			}


		private function portfolio_photo()
		{
			
				$name = $_FILES['portfolio_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/portfolio/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['portfolio_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['portfolio_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['portfolio_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
	public function update_portfolio()
	{
		$this->load->model('Mdl_update');
        $target_file = $this->portfolio_photo_update();
        $name = $_FILES['portfolio_photo']['name'];

        $data['vw_portfolio'] = 'vw_portfolio';
        $num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $data['portfolio'] = $this->Mdl_update->portfolio_updated($target_file,$name);
    	$data['profile'] = $this->Mdl_admin->load_profile();
    	$data['settings'] = $this->Mdl_admin->load_settings();

    	if($data['portfolio'] ==0)
		{
			
			$data['portfolio'] = $this->Mdl_admin->load_portfolio();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated portfolio!!';
			$data['msg_type'] = 'success';
		}
		
 
 	
		
		$this->load->view('vw_admin',$data);   	
	}
		private function portfolio_photo_update()
		{
			if($_FILES['portfolio_photo']['name']!='')
			{
				$name = $_FILES['portfolio_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/portfolio/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['portfolio_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['portfolio_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['portfolio_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
 	
 	public function portfolio_delete($id)
	{
		$data['vw_portfolio'] = 'vw_portfolio';
		$data['msg'] = '';		
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_portfolio($id);
	
		$data['portfolio'] = $this->Mdl_admin->load_portfolio();
		redirect('admin/portfolio/'.$query);
	}
	// services

	public function services()
	{
		$this->load->model('Mdl_update');
		$data['vw_services'] = 'vw_services';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['services'] = $this->Mdl_admin->load_services();

		$this->load->view('vw_admin',$data);
	}
	public function add_services()
	{
		$data['vw_services'] = 'vw_services';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();

		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$target_file =$this->services_photo();
		$result = $this->Mdl_admin->services_insert($target_file);
		if($result==1)
		{
			$data['msg'] = 'Successfully Added the services!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! services Couldnt added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['services'] = $this->Mdl_admin->load_services();

		$this->load->view('vw_admin',$data);
	}


	private function services_photo()
	{

		$name = $_FILES['services_photo']['name'];
		$name_ext = explode('.',$name );
		$ext = end($name_ext);
		$target_name = uniqid(rand()).".".$ext;
		$target_file = "assets/upload/services/".$target_name;
		$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
		$file_type = $_FILES['services_photo']['type'];

		if(in_array($ext, $allowed_types))
		{
			if(is_uploaded_file($_FILES['services_photo']['tmp_name']))

			{
				if(move_uploaded_file($_FILES['services_photo']['tmp_name'], $target_file))
				{

					return $target_file;
				}

				return false;
			}
		}
		else
		{
			return false;
		}
	}
	public function update_services()
	{
		$this->load->model('Mdl_update');
		$target_file = $this->services_photo_update();
		$name = $_FILES['services_photo']['name'];

		$data['vw_services'] = 'vw_services';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['services'] = $this->Mdl_update->services_updated($target_file,$name);
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['settings'] = $this->Mdl_admin->load_settings();

		if($data['services'] ==0)
		{

			$data['services'] = $this->Mdl_admin->load_services();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}

		else
		{

			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated services!!';
			$data['msg_type'] = 'success';
		}




		$this->load->view('vw_admin',$data);
	}
	private function services_photo_update()
	{
		if($_FILES['services_photo']['name']!='')
		{
			$name = $_FILES['services_photo']['name'];
			$name_ext = explode('.',$name );
			$ext = end($name_ext);
			$target_name = uniqid(rand()).".".$ext;
			$target_file = "assets/upload/services/".$target_name;
			$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
			$file_type = $_FILES['services_photo']['type'];

			if(in_array($ext, $allowed_types))
			{
				if(is_uploaded_file($_FILES['services_photo']['tmp_name']))

				{
					if(move_uploaded_file($_FILES['services_photo']['tmp_name'], $target_file))
					{

						return $target_file;
					}

					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

	public function services_delete($id)
	{
		$data['vw_services'] = 'vw_services';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_services($id);

		$data['services'] = $this->Mdl_admin->load_services();
		redirect('admin/services/'.$query);
	}
	// supply
	
	 public function supply()
	{
		$this->load->model('Mdl_update');
		$data['vw_supply'] = 'vw_supply';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['supply'] = $this->Mdl_admin->load_supply();
	
		$this->load->view('vw_admin',$data);
	}
	public function add_supply()
	{
		$data['vw_supply'] = 'vw_supply';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$target_file =$this->supply_photo();
		$result = $this->Mdl_admin->supply_insert($target_file);
		if($result==1)
		{
			$data['msg'] = 'Successfully Added the supply!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! supply Couldnt added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['supply'] = $this->Mdl_admin->load_supply();
		
		$this->load->view('vw_admin',$data);
			}


		private function supply_photo()
		{
			
				$name = $_FILES['supply_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/supply/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['supply_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['supply_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['supply_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
	public function update_supply()
	{
		$this->load->model('Mdl_update');
        $target_file = $this->supply_photo_update();
        $name = $_FILES['supply_photo']['name'];

        $data['vw_supply'] = 'vw_supply';
        $num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $data['supply'] = $this->Mdl_update->supply_updated($target_file,$name);
    	$data['profile'] = $this->Mdl_admin->load_profile();
    	$data['settings'] = $this->Mdl_admin->load_settings();

    	if($data['supply'] ==0)
		{
			
			$data['supply'] = $this->Mdl_admin->load_supply();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated supply!!';
			$data['msg_type'] = 'success';
		}
		
 
 	
		
		$this->load->view('vw_admin',$data);   	
	}
		private function supply_photo_update()
		{
			if($_FILES['supply_photo']['name']!='')
			{
				$name = $_FILES['supply_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/supply/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['supply_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['supply_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['supply_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
 	
 	public function supply_delete($id)
	{
		$data['vw_supply'] = 'vw_supply';
		$data['msg'] = '';		
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_supply($id);
	
		$data['supply'] = $this->Mdl_admin->load_supply();
		redirect('admin/supply/'.$query);
	}
	// customer

	public function customer()
	{
		$this->load->model('Mdl_update');
		$data['vw_customer'] = 'vw_customer';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['customer'] = $this->Mdl_admin->load_customer();

		$this->load->view('vw_admin',$data);
	}
	public function add_customer()
	{
		$data['vw_customer'] = 'vw_customer';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();

		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$target_file =$this->customer_photo();
		$result = $this->Mdl_admin->customer_insert($target_file);
		if($result==1)
		{
			$data['msg'] = 'Successfully Added the customer!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! customer Couldnt added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['customer'] = $this->Mdl_admin->load_customer();

		$this->load->view('vw_admin',$data);
	}


	private function customer_photo()
	{

		$name = $_FILES['customer_photo']['name'];
		$name_ext = explode('.',$name );
		$ext = end($name_ext);
		$target_name = uniqid(rand()).".".$ext;
		$target_file = "assets/upload/customer/".$target_name;
		$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
		$file_type = $_FILES['customer_photo']['type'];

		if(in_array($ext, $allowed_types))
		{
			if(is_uploaded_file($_FILES['customer_photo']['tmp_name']))

			{
				if(move_uploaded_file($_FILES['customer_photo']['tmp_name'], $target_file))
				{

					return $target_file;
				}

				return false;
			}
		}
		else
		{
			return false;
		}
	}
	public function update_customer()
	{
		$this->load->model('Mdl_update');
		$target_file = $this->customer_photo_update();
		$name = $_FILES['customer_photo']['name'];

		$data['vw_customer'] = 'vw_customer';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['customer'] = $this->Mdl_update->customer_updated($target_file,$name);
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['settings'] = $this->Mdl_admin->load_settings();

		if($data['customer'] ==0)
		{

			$data['customer'] = $this->Mdl_admin->load_customer();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}

		else
		{

			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated customer!!';
			$data['msg_type'] = 'success';
		}




		$this->load->view('vw_admin',$data);
	}
	private function customer_photo_update()
	{
		if($_FILES['customer_photo']['name']!='')
		{
			$name = $_FILES['customer_photo']['name'];
			$name_ext = explode('.',$name );
			$ext = end($name_ext);
			$target_name = uniqid(rand()).".".$ext;
			$target_file = "assets/upload/customer/".$target_name;
			$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
			$file_type = $_FILES['customer_photo']['type'];

			if(in_array($ext, $allowed_types))
			{
				if(is_uploaded_file($_FILES['customer_photo']['tmp_name']))

				{
					if(move_uploaded_file($_FILES['customer_photo']['tmp_name'], $target_file))
					{

						return $target_file;
					}

					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

	public function customer_delete($id)
	{
		$data['vw_customer'] = 'vw_customer';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_customer($id);

		$data['customer'] = $this->Mdl_admin->load_customer();
		redirect('admin/customer/'.$query);
	}
	//Reviews
    public function reviews()
	{
		$this->load->model('Mdl_update');
		$data['vw_reviews'] = 'vw_reviews';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['reviews'] = $this->Mdl_admin->load_reviews();
	
		$this->load->view('vw_admin',$data);
	}
	public function add_reviews()
	{
		$data['vw_reviews'] = 'vw_reviews';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();

		$result = $this->Mdl_admin->reviews_add();
		if($result!=0)
		{
			$data['msg'] = 'Successfully Added Reviews!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! Reviews wast not added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['reviews'] = $this->Mdl_admin->load_reviews();
	
		$this->load->view('vw_admin',$data);
	}
	public function update_reviews()
	{
		$this->load->model('Mdl_update');
      
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $data['vw_reviews'] = 'vw_reviews';
		$data['reviews'] = $this->Mdl_update->reviews_updated();
    	$data['profile'] = $this->Mdl_admin->load_profile();
    	$data['settings'] = $this->Mdl_admin->load_settings();

    	if($data['reviews'] ==0)
		{
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['reviews'] = $this->Mdl_admin->load_reviews();
			
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated reviews!!';
			$data['msg_type'] = 'success';
		}
		$this->load->view('vw_admin',$data);
	} 
	public function reviews_delete($id=null)
   {			
		
		$data['vw_reviews'] = 'vw_reviews';
		$data['msg'] = '';	
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();	
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_reviews($id);
		if($query==1)
		{
			$data['msg'] = 'Successfully Deleted review!!';
			$data['msg_type'] = 'success';
		}
		else{
			$data['msg'] = 'Sorry!! reviews wast not deleted!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['reviews'] = $this->Mdl_admin->load_reviews();
		$this->load->view('vw_admin',$data);

	}
    // ## Inbox
	public function inbox($msg=null)
	{
		$data['vw_inbox'] = 'vw_inbox';
		$data['msg'] = '';
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		
		$this->load->library('pagination');

 		$this->load->database(); //load library database

// Config setup
		$num_rows = $this->db->count_all("inbox");
 		$config['base_url'] = base_url().'admin/inbox';
 		$config['total_rows'] = $num_rows;	
		$config['per_page'] = 16;
 		$config['num_links'] = 4;
 		$config['use_page_numbers'] = TRUE;
 		$config['full_tag_open'] = '<ul class="pagination">';
 		$config['full_tag_close'] = '</ul>';
 		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	 	$config['cur_tag_close'] = '</a></li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['uri_segment'] = 3;
		if($this->uri->segment(3)){
		 $offset = $this->uri->segment(3);
		}
		else
		{
			$offset =1;
		}
 		
 		$this->pagination->initialize($config);

 
 		$data['inbox'] = $this->Mdl_admin->load_inbox($config['per_page'],$offset);
 		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		if($msg==1)
		{
			$data['msg'] = 'Successfully Deleted Messages!!';
			$data['msg_type'] = 'success';
		}
		else if($msg=='x'){
			$data['msg'] = 'Sorry!! Message wast not deleted!!Try Again';
			$data['msg_type'] = 'danger';
		}
		else
		{
			$data['msg'] = '';
		}
		$this->load->view('vw_admin',$data);
	}
	public function seen($id)
	{
		$this->Mdl_admin->message_seen($id);
		$data['msg'] = '';
		$data['vw_inbox'] = 'vw_inbox';
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
 
 		redirect('admin/inbox');
		}
	function remove_checked()
	{
	    $data['msg'] = ''; 
	    $data['vw_inbox'] = 'vw_inbox';   
	    $checked_messages = $this->input->post('msg'); //selected messages
	    $query = $this->Mdl_admin->delete_checked($checked_messages); 
	    
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		
		redirect('admin/inbox/'.$query);	}
	public function delete_all()
	{
		$data['msg'] = ''; 
		$query = $this->Mdl_admin->all_delete();
		 if($query==1)
		{
			$data['msg'] = 'Successfully Deleted all messages!!';
			$data['msg_type'] = 'success';
		}
		else{
			$data['msg'] = 'Sorry!! Message wast not deleted!!Try Again';
			$data['msg_type'] = 'danger';
		} 
		$data['vw_inbox'] = 'vw_inbox';
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		
		$this->load->library('pagination');

 		$this->load->database(); //load library database

// Config setup
		$num_rows = $this->db->count_all("inbox");
 		$config['base_url'] = base_url().'admin/inbox';
 		$config['total_rows'] = $num_rows;	
		$config['per_page'] = 16;
 		$config['num_links'] = 4;
 		$config['use_page_numbers'] = TRUE;
 		$config['full_tag_open'] = '<ul class="pagination">';
 		$config['full_tag_close'] = '</ul>';
 		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	 	$config['cur_tag_close'] = '</a></li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';

 		$config['uri_segment'] = 3;
		if($this->uri->segment(3)){
		 $offset = $this->uri->segment(3);
		}
		else
		{
			$offset =1;
		}
 		$this->pagination->initialize($config);

 
 		$data['inbox'] = $this->Mdl_admin->load_inbox($config['per_page'],$offset);
 		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();		
		$this->load->view('vw_admin',$data);
	}
	
	public function add_admin()
	{
		$data['vw_add_admin'] = 'vw_add_admin';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['all_profile'] = $this->Mdl_admin->all_profile();
		$this->load->view('vw_admin',$data);
	}
	public function edit_profile()
	{
		$data['vw_edit_profile'] = 'vw_edit_profile';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$this->load->view('vw_admin',$data);
	}
	//  ## aDD LINK
	public function add_links()
	{
		$data['vw_add_links'] = 'vw_add_links';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$data['link'] = $this->Mdl_admin->load_link();
		$this->load->view('vw_admin',$data);
	}
	public function update_link()
	{
		$this->load->model('Mdl_update');
      
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $data['vw_add_links'] = 'vw_add_links';
        $data['link'] = $this->Mdl_update->link_updated();
    	$data['profile'] = $this->Mdl_admin->load_profile();
    	$data['settings'] = $this->Mdl_admin->load_settings();

    	if($data['link'] ==0)
		{
			
			$data['link'] = $this->Mdl_admin->load_link();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			
			$data['link'] = $this->Mdl_update->link_updated();
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated Links!!';
			$data['msg_type'] = 'success';
		}
		$this->load->view('vw_admin',$data);
	} 

	//  ##Profile update
	public function profile_update()
    {
        $id = $this->input->post('admin_id');
        $admin_name = $this->input->post('admin_name');
    	$email = $this->input->post('admin_email');
        $username = $this->input->post('admin_username');
        $admin_old_password = $this->input->post('admin_old_password');
    	$password = $this->input->post('admin_password');
    	$passconf = $this->input->post('admin_passconf');

        $this->form_validation->set_rules('admin_username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('admin_passconf', 'Password Confirmation', 'trim|required|matches[admin_password]');
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run()==FALSE)
           
    	{   
            $data['vw_edit_profile'] = 'vw_edit_profile';
            $data['msg'] = '';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$num_rows = $this->db->count_all("inbox");
			$data['inbox_total'] = $num_rows;
			$data['inbox_count'] = $this->Mdl_admin->inbox_count();
    		$this->load->view('vw_admin',$data);
    	}

    	else
    	{
            $this->load->library('encrypt');
            $enc_password = md5($password);
            $enc_old_password = md5($admin_old_password);
            $this->load->model('Mdl_update');
            $target_file =$this->do_upload();
            $name = $_FILES['admin_photo']['name'];
			$data['vw_edit_profile'] = 'vw_edit_profile';
            $data['settings'] = $this->Mdl_admin->load_settings();
    		$data['profile'] = $this->Mdl_update->profile_edited($id,$admin_name,$username,$enc_password,$email,$enc_old_password,$target_file,$name);
            
    	if($data['profile'] ==0)
		{
			$data['vw_edit_profile'] = 'vw_edit_profile';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! There is a problem in Update!!';
			$data['msg_type'] = 'danger';
		}
		else if($data['profile'] ==1)
		{
			$data['vw_edit_profile'] = 'vw_edit_profile';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Sorry!! Wrong old pssword!!';
			$data['msg_type'] = 'danger';
		}
		else
		{
			$data['vw_edit_profile'] = 'vw_edit_profile';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['msg'] = 'Successfully updated Profile!!';
			$data['msg_type'] = 'success';
		}
		
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$this->load->view('vw_admin',$data);
        
    	}
    }
        
    	private function do_upload()
		{
			if($_FILES['admin_photo']['name']!='')
			{
				$name = $_FILES['admin_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/photo/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['admin_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['admin_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['admin_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}

	public function add_profile()
	{

		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
        $admin_name = $this->input->post('admin_name');
    	$email = $this->input->post('admin_email');
        $username = $this->input->post('admin_username');
    	$password = $this->input->post('admin_password');
    	$passconf = $this->input->post('admin_passconf');


        $this->form_validation->set_rules('admin_username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[admin.admin_username]');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('admin_passconf', 'Password Confirmation', 'trim|required|matches[admin_password]');
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|is_unique[admin.admin_email]');

		if($this->form_validation->run()==FALSE)
           
    	{   
            $data['vw_add_admin'] = 'vw_add_admin';
            $data['msg'] = '';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['all_profile'] = $this->Mdl_admin->all_profile();
    		$this->load->view('vw_admin',$data);
    	}

    	else
    	{
            $this->load->library('encrypt');
            $enc_password = md5($password);
    	  	$data['msg'] = '';
            $this->load->model('Mdl_admin');
            $target_file =$this->do_upload_2();
            $name = $_FILES['admin_photo']['name'];
			$data['vw_add_admin'] = 'vw_add_admin';
            $data['settings'] = $this->Mdl_admin->load_settings();
    		$data['profile'] = $this->Mdl_admin->profile_add($admin_name,$username,$enc_password,$email,$target_file,$name);
            $data['all_profile'] = $this->Mdl_admin->all_profile();

    	if($data['profile'] ==0)
		{
			$data['vw_add_admin'] = 'vw_add_admin';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['all_profile'] = $this->Mdl_admin->all_profile();
			$data['msg'] = 'Sorry!! Failed to add admin.Try Again!!!!';
			$data['msg_type'] = 'danger';
		}
		
		else
		{
			$data['vw_add_admin'] = 'vw_add_admin';
			$data['settings'] = $this->Mdl_admin->load_settings();
			$data['profile'] = $this->Mdl_admin->load_profile();
			$data['all_profile'] = $this->Mdl_admin->all_profile();
			$data['msg'] = 'Successfully Added Profile!!';
			$data['msg_type'] = 'success';
		}
		
		
		$this->load->view('vw_admin',$data);
        
    	}
	}	
private function do_upload_2()
		{
			if($_FILES['admin_photo']['name']!='')
			{
				$name = $_FILES['admin_photo']['name'];
				$name_ext = explode('.',$name );
				$ext = end($name_ext);
				$target_name = uniqid(rand()).".".$ext;
				$target_file = "assets/upload/photo/".$target_name;
				$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
				$file_type = $_FILES['admin_photo']['type'];

				if(in_array($ext, $allowed_types))
				{
					if(is_uploaded_file($_FILES['admin_photo']['tmp_name']))
						
						{
							if(move_uploaded_file($_FILES['admin_photo']['tmp_name'], $target_file))
							{
								
								return $target_file;
							}
							
								return false;					
						}
				}
				else
				{
					return false;
				}
			}
		}
		public function admin_delete($id)
	{
		$data['vw_add_admin'] = 'vw_add_admin';
		$data['msg'] = '';		-
		
		$query = $this->Mdl_admin->delete_admin($id);
		if($query==1)
		{
			$data['msg'] = 'Successfully Deleted Admin!!';
			$data['msg_type'] = 'success';
		}
		else{
			$data['msg'] = 'Sorry!! Admin was not deleted!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['all_profile'] = $this->Mdl_admin->all_profile();
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$this->load->view('vw_admin',$data);
	}


	// ## Slideshow
	public function slideshow()
	{
		$data['vw_slideshow'] = 'vw_slideshow';
		$data['msg'] = '';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['slideshow'] = $this->Mdl_admin->load_slide();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$this->load->view('vw_admin',$data);
	}
	public function add_slideshow()
	{
		$target_file = $this->slide_photo();
		$data['vw_slideshow'] = 'vw_slideshow';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();
		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();

		$result = $this->Mdl_admin->slide_insert($target_file);
		if($result==1)
		{
			$data['msg'] = 'Successfully added the Slide!!';
			$data['msg_type'] = 'success';
		}
		else
		{
			$data['msg'] = 'Sorry!! Slide was not added!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['slideshow'] = $this->Mdl_admin->load_slide();


		$this->load->view('vw_admin',$data);
	}
	public function slide_delete($id)
	{

		$data['msg'] = '';
		$data['vw_slideshow'] = 'vw_slideshow';
		$num_rows = $this->db->count_all("inbox");
		$data['inbox_total'] = $num_rows;
		$data['inbox_count'] = $this->Mdl_admin->inbox_count();

		$data['settings'] = $this->Mdl_admin->load_settings();
		$data['profile'] = $this->Mdl_admin->load_profile();
		$query = $this->Mdl_admin->delete_slide($id);
		if($query==1)
		{
			$data['msg'] = 'Successfully Deleted the Slide!!';
			$data['msg_type'] = 'success';
		}
		else{
			$data['msg'] = 'Sorry!! Slide wast not deleted!!Try Again';
			$data['msg_type'] = 'danger';
		}
		$data['slideshow'] = $this->Mdl_admin->load_slide();
		$this->load->view('vw_admin',$data);
	}
	private function slide_photo()
	{
		$name = $_FILES['slideshow_photo']['name'];
		$name_ext = explode('.',$name );
		$ext = end($name_ext);
		$target_name = uniqid(rand()).".".$ext;
		$target_file = "assets/upload/slide/".$target_name;
		$allowed_types = array("jpeg","JPEG","jpg","JPG","gif","GIF","png","PNG");
		$file_type = $_FILES['slideshow_photo']['type'];

		if(in_array($ext, $allowed_types))
		{
			if(is_uploaded_file($_FILES['slideshow_photo']['tmp_name']))

			{
				if(move_uploaded_file($_FILES['slideshow_photo']['tmp_name'], $target_file))
				{

					return $target_file;
				}

				return false;
			}
		}
		else
		{
			return false;
		}
	}
    

}

