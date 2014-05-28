<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'Users');

		// Permissions List for this Class
		$perm = array('admin');
		// Check
		if ($this->Users->_checkLogin())
		{
			if ( ! $this->Users->_checkRole($perm)) redirect('main');
		} else {
			redirect('auth/login');
		}
		
	}

	public function index()
	{
		$this->load->view('admin/header_view');
		$this->load->view('admin/nav_view');
		$this->load->view('admin/beginbody_view');
		$this->load->view('admin/sidebar_view');
		$this->load->view('admin/dashboard_view');
		
		$this->load->view('admin/footer_view');
		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */