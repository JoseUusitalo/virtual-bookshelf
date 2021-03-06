<?php
/**
 * User registration page controller.
 * @author Community Auth & Jose
 */
defined('BASEPATH') or exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/My_projekti.php");

/**
 * Class for handling user registration.
 */
class Register extends My_projekti
{
	/**
	 * Construct the parent class before this one.
	 */
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * Show the registration page, validate registration details, and add a new user into the database.
	 */
    public function show_register()
    {
		// Load Community Auth variables.
		$this->is_logged_in();
		
		// Is the user logged in?
		if($this->auth_level !== NULL)
		{
			// In that case show the user's profile, you need to log out before registering an account.
			$this->view('myprofile', NULL);
		}
		else
		{
			// User not logged in.
			
			$data = NULL;
			
			// POST data posted to this page?
			if($this->input->post('submit'))
			{
				// Get the data.
				$user_data = array(
					'user_name'     => $this->input->post("reg_name"),
					'ScreenName'    => $this->input->post("reg_screenname"),
					'user_pass'     => $this->input->post("reg_pass"),
					'user_level'    => '1',
				);

				$this->load->library('form_validation');

				$this->form_validation->set_data( $user_data );

				$validation_rules = array(
					array(
						'field' => 'user_name',
						'label' => 'Login Name',
						'rules' => 'trim|required|min_length[3]|max_length[255]|is_unique[users.user_name]'
					),
					array(
						'field' => 'ScreenName',
						'label' => 'Screen Name',
						'rules' => 'trim|required|min_length[3]|max_length[255]|is_unique[users.ScreenName]'
					),
					array(
						'field' => 'user_pass',
						'label' => 'Password',
						'rules' => 'trim|required|min_length[8]|external_callbacks[model,formval_callbacks,_check_password_strength,TRUE]',
					),
					array(
						'field' => 'user_level',
						'label' => 'user_level',
						'rules' => 'required|integer|in_list[1,6,9]'
					)
				);

				$this->form_validation->set_rules( $validation_rules );

				// Validate registration form data.
				if( $this->form_validation->run() )
				{
					// If valid, create user.
					$user_data['user_salt']     = $this->authentication->random_salt();
					$user_data['user_pass']     = $this->authentication->hash_passwd($user_data['user_pass'], $user_data['user_salt']);
					$user_data['user_id']       = $this->r2pdb_model->get_unused_user_id();
					$user_data['user_date']     = date('Y-m-d H:i:s');
					$user_data['user_modified'] = date('Y-m-d H:i:s');

					$this->db->set($user_data)->insert(config_item('user_table'));

					if ($this->db->affected_rows() == 1)
					{
						$data["validation_ok"] = 'User ' . $user_data['ScreenName'] . ' was created!';
					}
				}
				else
				{
					// Validation failed.
					$data["validation_errors"] = validation_errors();
				}
			}
			
			// User not logged in and no POST data found.
			$this->view('register', $data);
		}
    }
}