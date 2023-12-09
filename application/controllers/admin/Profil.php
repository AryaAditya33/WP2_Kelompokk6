<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function __construct()
    {
	parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("Siswa_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
        }

	public function index()
	{
        $data["user"] = $this->user_model->getAll();
        $data['current_user'] = $this->auth_model->current_user();
		$data['user'] = $this->user_model->getAll();
        $data['total_siswa'] = $this->Siswa_model->hitungSiswa();
        $this->load->view("admin/_partials/head.php");
        $this->load->view("admin/_partials/body.php");
        $this->load->view("admin/_partials/content.php", $data);
        $this->load->view("admin/profil.php", $data);
        $this->load->view("admin/_partials/footer.php");
        $this->load->view("admin/_partials/modal.php");
        $this->load->view("admin/_partials/js.php");

	}

}