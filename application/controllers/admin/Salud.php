<?php defined('BASEPATH') or exit('No direct script access allowed');
class Salud extends MY_Controller
{
    public function __construct()
    {
        // var_dump('salud');
        // die;
        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

        $this->load->model('admin/admin_model', 'admin');
        $this->load->model('admin/user_model', 'user_model');
        $this->load->model('admin/activity_model', 'activity_model');
    }

    public function index()
    {
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/users/user_list');
        $this->load->view('admin/includes/_footer');
    }
}
