<?php

class Mdl_admin extends CI_Model {


	public function validate($username, $enc_password)
	{
		
		$query = $this->db->get_where('admin',array('admin_username'=>$username,'admin_password'=>$enc_password));
		if($query->num_rows()>0)
		{
		
           foreach ($query->result_array() as $a => $b) {
                $this->session->set_userdata(array(
                        'admin_id' => $b['admin_id'],
                        'admin_username' => $b['admin_username'],
                        'admin_name' => $b['admin_name'],
                        'admin_logged_in' => true
                    )
                   );
            }

            return $query;
		}
		
	}
	public function load_profile()
	{
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('admin',array('admin_id'=>$id,));
		if($query)
		{
			return $query->result();
		}

	}
	public function all_profile()
	{
		$query =$this->db->get('admin');
		if($query)
		{
			return $query->result();
		}

	}
	public function delete_admin($id)
	{
		$query=$this->db->get_where('admin',array('admin_id' =>$id,));
		if($query)
		{
			$result=$query->result();
			foreach ($result as $value) 
			{
				if(file_exists($value->admin_photo))
					{
						unlink($value->admin_photo);

					}
			}
			
		}
		$this->db->where('admin_id', $id);
		$delete = $this->db->delete('admin');
		if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
	}
	public function load_settings()
	{
		$query =$this->db->get('settings');
		if($query)
		{
			return $query->result();
		}

	}

	public function message()
	{
		$inbox_name = $this->input->post('inbox_name');
		$inbox_email = $this->input->post('inbox_email');
		$inbox_message = $this->input->post('inbox_message');
		$this->db->set('inbox_date','NOW()',FALSE);

		$attr = array(
			'inbox_name' => $inbox_name,
			'inbox_email' => $inbox_email,
			'inbox_message' => $inbox_message,
		);
		$query = $this->db->insert('inbox',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}
	}
	public function load_inbox($per_page,$offset)
	{
		$page = ($offset-1)*$per_page;
		$this->db->order_by('inbox_id','DESC');
		$this->db->limit($per_page,$page);
		$query =$this->db->get('inbox');
		if($query)
		{
			return $query->result();
		}

	}
	public function message_seen($id)
	{
		$attr = array('inbox_seen' => 1, );
		$this->db->where('inbox_id',$id);
		$this->db->update('inbox',$attr);
	}
	function delete_checked($message_ids) 
	{
		$message_ids = (array) $message_ids ;
		foreach ($message_ids as $key => $value) {
		 $this->db
	        ->where('inbox_id', $value)
	        ->delete('inbox');
		}
	   		
	  if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
		else
		{
			return 'x';
		}
	    
	}
	public function all_delete()
	{
		$query = $this->db->truncate('inbox');
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}
	}
	public function inbox_count()
	{
		$this->db->where('inbox_seen', 1);
		$query = $this->db->get('inbox');
		if($query)
		{
			return $query->result();
		}
		else{
			return 0;
		}

	}
	//## Category
	public function cat_insert()
	{
		$category_name = $this->input->post('category_name');
		$category_parent= $this->input->post('category_parent');

		$attr = array(
			'category_name' => $category_name,
			'category_parent' => $category_parent,

			);
		$query = $this->db->insert('category',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}

	}
	// ## Load Parent Category
	public function load_cat()
	{
		$query = $this->db->get_where('category',array('category_parent'=>'0'));
		return $query->result();
	}
	public function all_category()
	{
		$query = $this->db->get('category');
		return $query->result();
	}
	public function show_parent($parent_id)
	{
		$query = $this->db->get_where('category',array('category_id'=>$parent_id));
		return $query->result();
	}
	public function delete_cat($id) 
	{
	    $this->db->where('category_id', $id);
	   	$query = $this->db->delete('category');
	   	if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
    }
   // ## News
    
   	public function portfolio_insert($target_file)
	{
		
		$portfolio_name = $this->input->post('portfolio_name');
		$portfolio_details= $this->input->post('portfolio_details');
		$portfolio_link = $this->input->post('portfolio_link');

		$attr = array(
			'portfolio_name' => $portfolio_name,
			'portfolio_details' => $portfolio_details,
			'portfolio_link' => $portfolio_link,
			'portfolio_photo' => $target_file,
			

			);
		
		$query = $this->db->insert('portfolio',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}

	}
	public function load_portfolio()
	{
		$this->db->order_by('portfolio_id','DESC');
		$query =$this->db->get('portfolio');
		if($query)
		{
			return $query->result();
		}
	}
	public function delete_portfolio($id)
	{
		$query=$this->db->get_where('portfolio',array('portfolio_id' =>$id,));
		if($query)
		{
			$result=$query->result();
			foreach ($result as $value) 
			{
				if(file_exists($value->portfolio_photo))
					{
						unlink($value->portfolio_photo);

					}
			}
			
		}
		$this->db->where('portfolio_id', $id);
		$delete = $this->db->delete('portfolio');
		if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
		else
		{
			return 'x';
		}
	}
	#Home
	public function load_home()
	{
		$this->db->order_by('home_id','ASC');
		$query =$this->db->get('home');
		if($query)
		{
			return $query->result();
		}
	}
	# Customer

	public function customer_insert($target_file)
	{
		
		$customer_name = $this->input->post('customer_name');
		$customer_details= $this->input->post('customer_details');
		$portfolio_link = $this->input->post('portfolio_link');

		$attr = array(
			'customer_name' => $customer_name,
			'customer_details' => $customer_details,
			'customer_photo' => $target_file,
			

			);
		
		$query = $this->db->insert('customer',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}

	}

	public function load_customer()
	{
		$this->db->order_by('customer_id','DESC');
		$query =$this->db->get('customer');
		if($query)
		{
			return $query->result();
		}
	}
	public function delete_customer($id)
	{
		$query=$this->db->get_where('customer',array('customer_id' =>$id,));
		if($query)
		{
			$result=$query->result();
			foreach ($result as $value) 
			{
				if(file_exists($value->customer_photo))
					{
						unlink($value->customer_photo);

					}
			}
			
		}
		$this->db->where('customer_id', $id);
		$delete = $this->db->delete('customer');
		if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
		else
		{
			return 'x';
		}
	}
	#pages
	public function load_pages($page_name)
	{
		$this->db->where('pages_name',$page_name);
		$query =$this->db->get('pages');
		if($query)
		{
			return $query->result();
		}
	}
	public function load_reviews()
	{
		$this->db->order_by('reviews_id','DESC');
		$query =$this->db->get('reviews');
		if($query)
		{
			return $query->result();
		}
	}
	public function reviews_add()
	{
		$reviews_content = $this->input->post('reviews_content');
		$reviews_client= $this->input->post('reviews_client');
		$attr  = array(	
			'reviews_content' => $reviews_content,
			'reviews_client' => $reviews_client,	
				
			);

		
		$query = $this->db->insert('reviews',$attr);
		
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
		public function delete_reviews($id) 
	{
	    $this->db->where('reviews_id', $id);
	   	$query = $this->db->delete('reviews');
	   	if ($this->db->affected_rows() > 0)
	   	{
	   		 return 1;
	   	}
    }
	public function load_news_page($per_page,$offset)
	{
		$page = ($offset-1)*$per_page;
		$this->db->order_by('news_id','DESC');
		$this->db->limit($per_page,$page);
		$query =$this->db->get('news');
		if($query)
		{
			return $query->result();
		}
	}
	
	public function slide_insert($target_file)
	{
		$slideshow_name = $this->input->post('slideshow_name');
		

		$attr = array(
			'slideshow_name' => $slideshow_name,
			'slideshow_photo' => $target_file

			);

		$query = $this->db->insert('slideshow',$attr);
		if($query)
		{
			return 1;
		}
		else
		{
			return false;
		}
	}
	public function load_slide()
	{
		$query =$this->db->get('slideshow');
		if($query)
		{
			return $query->result();
		}
	}
	public function delete_slide($id)
		{
			$query=$this->db->get_where('slideshow',array('slideshow_id' => $id,));
			if($query)
			{
				$result=$query->result();
				foreach ($result as $value) 
				{
					if(file_exists($value->slideshow_photo))
						{
							unlink($value->slideshow_photo);

						}
				}
				
			}
			$this->db->where('slideshow_id', $id);
			$delete = $this->db->delete('slideshow');
			if ($this->db->affected_rows() > 0)
		   	{
		   		 return 1;
		   	}
		}
	public function load_link()
	{
		$query =$this->db->get('links');
		if($query)
		{
			return $query->result();
		}
	}
	public function profile_add($admin_name,$admin_username,$enc_password,$admin_email,$target_file)
	{
		$attr  = array(	
			'admin_name' => $admin_name,
			'admin_password' => $enc_password,	
			'admin_username' => $admin_username,
			'admin_email' => $admin_email,
			'admin_photo' => $target_file,
				
			);

		
		$query = $this->db->insert('admin',$attr);
		
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
	public function total_visit($days)
	{
		
		$this->db->order_by('visitor_id DESC');
		$this->db->limit($days);	
		$this->db->from('visitor');
		$query = $this->db->get();
		
		if($query)
		{
			$result = $query->result();
		}
		$total = 0;
		foreach ($result as $key => $value) {
			$total = $total + $value->visitor_total;
		}
		return $total;

	}


public function all_visit()
	{
		
		$this->db->order_by('visitor_id DESC');
			
		$this->db->from('visitor');
		$query = $this->db->get();
		
		if($query)
		{
			$result = $query->result();
		}
		$total = 0;
		foreach ($result as $key => $value) {
			$total = $total + $value->visitor_total;
		}
		return $total;

	}


	public function daily_visit()
	{
			
		
		
		$this->db->limit(1);
		$this->db->order_by('visitor_id','DESC');
		
		$query = $this->db->get('visitor');
		if($query)
		{
			return $query->result();
		}

	}
	public function monthly_visit()
	{
		$time = date("Y-m-d");
		list($year, $m, $d) = explode('-', $time);
		for ($month=1; $month <=12 ; $month++) { 
			$this->db->select('SUM(visitor_total) as total');
			$this->db->where('visitor_month',$month);
			$this->db->where('visitor_year',$year);
			$query=$this->db->get('visitor');
		
			$row=$query->row();
			$total=$row->total;
		
		
			$visitor_month = $month;
			if ($total!=null) {
				$visitor_month =  $month;
				$visitor_total =  $total;
			}
			else
			{	
				$visitor_month =  $month;
				$visitor_total = 0;
			}
			
			 $result[] = array('visitor_month'=>$visitor_month ,  'visitor_total'=>$visitor_total );
			 
		if($month==$m){
			break;
		}
		}
		
	return $result;
	}
	public function load_code()
		{
			$query = $this->db->get('adsense');
			return $query->result();
		}

}