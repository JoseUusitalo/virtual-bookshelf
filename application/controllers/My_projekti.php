<?php

class My_projekti extends MY_Controller
{
	function __construct()
	{
        parent::__construct();
    }
	
	public function view($page = 'front', $data = NULL)
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			echo "Unable to find " . APPPATH . 'views/pages/' . $page . '.php';
			show_404();
		}
		
		// Is the user logged in?
		if($this->verify_min_level(1))
		{
			if( $http_user_cookie_contents = $this->input->cookie(config_item('http_user_cookie_name')))
			{
				$data["cookie"] = unserialize( $http_user_cookie_contents );
			}
		}
			
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}
	
	public function view_comment($page = 'front', $data = NULL, $comment_type = NULL)
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			echo "Unable to find " . APPPATH . 'views/pages/' . $page . '.php';
			show_404();
		}
		
		// Is the user logged in?
		if($this->verify_min_level(1))
		{
			if( $http_user_cookie_contents = $this->input->cookie(config_item('http_user_cookie_name')))
			{
				$data["cookie"] = unserialize( $http_user_cookie_contents );
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		
		$data["comment_type"]=$comment_type;
		$this->load->view('pages/comment', $data);
		
		$this->load->view('templates/footer');
	}
	
	public function view_review_comment($page = 'front', $data = NULL)
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			echo "Unable to find " . APPPATH . 'views/pages/' . $page . '.php';
			show_404();
		}
		
		// Is the user logged in?
		if($this->verify_min_level(1))
		{
			if( $http_user_cookie_contents = $this->input->cookie(config_item('http_user_cookie_name')))
			{
				$data["cookie"] = unserialize( $http_user_cookie_contents );
			}
		}
			
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('pages/reviewlist', $data);
		$this->load->view('pages/comment', $data);
		$this->load->view('templates/footer');
	}
}