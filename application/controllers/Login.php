<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/My_projekti.php");

class Login extends My_projekti
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This login method only serves to redirect a user to a 
     * location once they have successfully logged in. It does
     * not attempt to confirm that the user has permission to 
     * be on the page they are being redirected to.
     */
    public function login()
    {
        // Method should not be directly accessible
        if( $this->uri->uri_string() == 'examples/login')
        {
            show_404();
        }

        if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
        {
            $this->require_min_level(1);
        }

        $this->setup_login_form();

		$this->view('login_form', null);
    }

    // --------------------------------------------------------------

    /**
     * Log out
     */
    public function logout()
    {
        $this->authentication->logout();

        redirect( secure_site_url( LOGIN_PAGE . '?logout=1') );
    }
}

/* End of file Examples.php */
/* Location: /application/controllers/Examples.php */