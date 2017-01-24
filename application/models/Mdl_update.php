<?php

class Mdl_update extends CI_Model {
	// ## Admin Update
	public function profile_edited($id,$admin_name,$admin_username,$enc_password,$admin_email,$enc_old_password,$target_file,$name)
	{
		
        $query = $this->db->get_where('admin',array('admin_id'=>$id,'admin_password'=>$enc_old_password));
		if($query->num_rows()>0)
		{
				$attr  = array(	
			'admin_name' => $admin_name,
			'admin_password' => $enc_password,	
			'admin_username' => $admin_username,
			'admin_email' => $admin_email,
				
			);

		$this->db->where('admin_id',$id);
		$query = $this->db->update('admin',$attr);
		$admin_photo = $target_file;
        if($name!='')
        {
			$query = $this->db->get_where('admin',array('admin_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->admin_photo))
				{
					unlink($value->admin_photo);
				}
			}
			$attr2  = array(	
			
			'admin_photo' => $admin_photo,
				
			);
			$this->db->where('admin_id',$id);
			$query = $this->db->update('admin',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('admin');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		}
		else
		{
			return 1;
		}
		
	
	}
	## Home update

	public function home_updated($target_file,$name)
	{
		$id = $this->input->post('home_id');
		$home_name = $this->input->post('home_name');
		$home_details = $this->input->post('home_details');



		$attr  = array(
			'home_name' => $home_name,
			'home_details' => $home_details,



		);

		$this->db->where('home_id',$id);
		$query = $this->db->update('home',$attr);

		$home_photo = $target_file;
		if($name!='')
		{
			$query = $this->db->get_where('home',array('home_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value)
			{
				if(file_exists($value->home_photo))
				{
					unlink($value->home_photo);
				}
			}
			$attr2  = array(

				'home_photo' => $home_photo,

			);
			$this->db->where('home_id',$id);
			$query = $this->db->update('home',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('home');
			return $query2->result();
		}
		else
		{
			return 0;
		}

	}
	// ## Settings Update
	public function settings_edited($target_file1,$name1,$target_file2,$name2)
	{
		$id = $this->input->post('settings_id');

        $settings_title = $this->input->post('settings_title');
        $settings_copyright = $this->input->post('settings_copyright');
    	$settings_address = $this->input->post('settings_address');
        $settings_phone = $this->input->post('settings_phone');
        $settings_email = $this->input->post('settings_email');
		$settings_facebook = $this->input->post('settings_facebook');
       


			$attr  = array(	
			'settings_title' => $settings_title,
            'settings_copyright' => $settings_copyright,
			'settings_address' => $settings_address,	
			'settings_phone' => $settings_phone,
			'settings_email' => $settings_email,
			'settings_facebook' => $settings_facebook,


			
				
			);

		$this->db->where('settings_id',$id);
		$query = $this->db->update('settings',$attr);

		$settings_logo = $target_file1;
	    if($name1!='')
        {
			$query = $this->db->get_where('settings',array('settings_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->settings_logo))
				{
					unlink($value->settings_logo);
				}
			}
			$attr2  = array(	
			
			'settings_logo' => $settings_logo,
				
			);
			$this->db->where('settings_id',$id);
			$query = $this->db->update('settings',$attr2);
		}

		$settings_icon = $target_file2;
	    if($name2!='')
        {
			$query = $this->db->get_where('settings',array('settings_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->settings_icon))
				{
					unlink($value->settings_icon);
				}
			}
			$attr3  = array(	
			
			'settings_icon' => $settings_icon,
				
			);
			$this->db->where('settings_id',$id);
			$query = $this->db->update('settings',$attr3);
		}

		if($query)
		{
			$query2 = $this->db->get('settings');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		}
		// ## Category Update
		public function cat_update()
		{
			$id = $this->input->post('category_id');
			$category_name = $this->input->post('category_name');
			$category_parent= $this->input->post('category_parent');

			$attr = array(
				'category_name' => $category_name,
				'category_parent' => $category_parent,

				);
			$this->db->where('category_id',$id);
			$query = $this->db->update('category',$attr);
			if($query)
			{
				return 1;
			}
			else
			{
				return false;
			}
		}
		// ##pages update
		public function about_updated($target_file_1,$target_file_2,$target_file_3,$name_1,$name_2,$name_3)
		{

		$page_name = $this->input->post('pages_name');
	    $about_details = $this->input->post('pages_details');

    	

			$attr  = array(	
			'pages_details' => $about_details,

			);

		$this->db->where('pages_name',$page_name);
		$query = $this->db->update('pages',$attr);

		    $pages_photo_1 = $target_file_1;
			$pages_photo_2 = $target_file_2;
			$pages_photo_3 = $target_file_3;
	    if($name_1!='')
        {
			$query = $this->db->get_where('pages',array('pages_name'=>$page_name));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->pages_photo_1))
				{
					unlink($value->pages_photo_1);
				}
			}
			$attr2  = array(	
			
			'pages_photo_1' => $pages_photo_1,
				
			);
			$this->db->where('pages_name',$page_name);
			$query = $this->db->update('pages',$attr2);
		}
			if($name_2!='')
			{
				$query = $this->db->get_where('pages',array('pages_name'=>$page_name));
				$photo_url = $query->result();
				foreach ($photo_url as $value)
				{
					if(file_exists($value->pages_photo_2))
					{
						unlink($value->pages_photo_2);
					}
				}
				$attr2  = array(

					'pages_photo_2' => $pages_photo_2,

				);
				$this->db->where('pages_name',$page_name);
				$query = $this->db->update('pages',$attr2);
			}
			if($name_3!='')
			{
				$query = $this->db->get_where('pages',array('pages_name'=>$page_name));
				$photo_url = $query->result();
				foreach ($photo_url as $value)
				{
					if(file_exists($value->pages_photo_3))
					{
						unlink($value->pages_photo_3);
					}
				}
				$attr2  = array(

					'pages_photo_3' => $pages_photo_3,

				);
				$this->db->where('pages_name',$page_name);
				$query = $this->db->update('pages',$attr2);
			}
		if($query)
		{
			$this->db->where('pages_name',$page_name);
			$query2 = $this->db->get('pages');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		}
		
	//## Portfolio Update
		public function portfolio_updated($target_file,$name)
		{
		$id = $this->input->post('portfolio_id');
	    $portfolio_name = $this->input->post('portfolio_name');
        $portfolio_details = $this->input->post('portfolio_details');
        $portfolio_link = $this->input->post('portfolio_link');
    	

			$attr  = array(	
			'portfolio_name' => $portfolio_name,
			'portfolio_details' => $portfolio_details,
			'portfolio_link' => $portfolio_link,
		
		
			);

		$this->db->where('portfolio_id',$id);
		$query = $this->db->update('portfolio',$attr);

		$portfolio_photo = $target_file;
	    if($name!='')
        {
			$query = $this->db->get_where('portfolio',array('portfolio_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->portfolio_photo))
				{
					unlink($value->portfolio_photo);
				}
			}
			$attr2  = array(	
			
			'portfolio_photo' => $portfolio_photo,
				
			);
			$this->db->where('portfolio_id',$id);
			$query = $this->db->update('portfolio',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('portfolio');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		}
	// ## services Update
		public function services_updated($target_file,$name)
		{
		    $id = $this->input->post('services_id');
			$services_name = $this->input->post('services_name');
			$services_details = $this->input->post('services_details');
   
    	

			$attr  = array(	
			'services_name' => $services_name,
			'services_details' => $services_details,
			
		
		
			);

		$this->db->where('services_id',$id);
		$query = $this->db->update('services',$attr);

		$services_photo = $target_file;
	    if($name!='')
        {
			$query = $this->db->get_where('services',array('services_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value) 
			{
				if(file_exists($value->services_photo))
				{
					unlink($value->services_photo);
				}
			}
			$attr2  = array(	
			
			'services_photo' => $services_photo,
				
			);
			$this->db->where('services_id',$id);
			$query = $this->db->update('services',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('services');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		}
	// ## supply Update
	public function supply_updated($target_file,$name)
	{
		$id = $this->input->post('supply_id');
		$supply_name = $this->input->post('supply_name');
		$supply_details = $this->input->post('supply_details');



		$attr  = array(
			'supply_name' => $supply_name,
			'supply_details' => $supply_details,



		);

		$this->db->where('supply_id',$id);
		$query = $this->db->update('supply',$attr);

		$supply_photo = $target_file;
		if($name!='')
		{
			$query = $this->db->get_where('supply',array('supply_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value)
			{
				if(file_exists($value->supply_photo))
				{
					unlink($value->supply_photo);
				}
			}
			$attr2  = array(

				'supply_photo' => $supply_photo,

			);
			$this->db->where('supply_id',$id);
			$query = $this->db->update('supply',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('supply');
			return $query2->result();
		}
		else
		{
			return 0;
		}

	}
	// ## customer Update
	public function customer_updated($target_file,$name)
	{
		$id = $this->input->post('customer_id');
		$customer_name = $this->input->post('customer_name');
		$customer_details = $this->input->post('customer_details');



		$attr  = array(
			'customer_name' => $customer_name,
			'customer_details' => $customer_details,



		);

		$this->db->where('customer_id',$id);
		$query = $this->db->update('customer',$attr);

		$customer_photo = $target_file;
		if($name!='')
		{
			$query = $this->db->get_where('customer',array('customer_id'=>$id));
			$photo_url = $query->result();
			foreach ($photo_url as $value)
			{
				if(file_exists($value->customer_photo))
				{
					unlink($value->customer_photo);
				}
			}
			$attr2  = array(

				'customer_photo' => $customer_photo,

			);
			$this->db->where('customer_id',$id);
			$query = $this->db->update('customer',$attr2);
		}
		if($query)
		{
			$query2 = $this->db->get('customer');
			return $query2->result();
		}
		else
		{
			return 0;
		}

	}





	// ## Link update
	public function link_updated()
	{
		$id = $this->input->post('link_id');
		$link_fb = $this->input->post('link_fb');
		$link_twt = $this->input->post('link_twt');
		$link_google = $this->input->post('link_google');
		$link_utube = $this->input->post('link_utube');
		$link_linkedin = $this->input->post('link_linkedin');

		$attr  = array(	
			'link_fb' => $link_fb,
			'link_twt' => $link_twt,	
			'link_google' => $link_google,
			'link_utube' => $link_utube,
			'link_linkedin' => $link_linkedin,

				
			);

		$this->db->where('link_id',$id);
		$query = $this->db->update('links',$attr);

		if($query)
		{
			$query2 = $this->db->get('links');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		

	}
	public function update_code()
		{
			$id = $this->input->post('adsense_id');
			$adsense_code = $this->input->post('adsense_code');
			$adsense_status= $this->input->post('adsense_status');

			$attr = array(
				'adsense_code' => $adsense_code,
				'adsense_status' => $adsense_status,

				);
			$this->db->where('adsense_id',$id);
			$query = $this->db->update('adsense',$attr);
			if($query)
			{
				return 1;
			}
			else
			{
				return false;
			}
		}
		public function reviews_updated()
	{
		$id = $this->input->post('reviews_id');
		$reviews_content = $this->input->post('reviews_content');
		$reviews_client = $this->input->post('reviews_client');
		$link_google = $this->input->post('link_google');
		$link_utube = $this->input->post('link_utube');
		$link_linkedin = $this->input->post('link_linkedin');

		$attr  = array(	
			'reviews_content' => $reviews_content,
			'reviews_client' => $reviews_client,	
		
			);

		$this->db->where('reviews_id',$id);
		$query = $this->db->update('reviews',$attr);

		if($query)
		{
			$query2 = $this->db->get('reviews');
			return $query2->result();
		}
		else
		{
			return 0;
		}

		

	}
	
}