<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("guru_model");
        $this->load->model("auth_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["guru"] = $this->guru_model->getAll();
        $this->load->view("admin/_partials/head.php");
        $this->load->view("admin/_partials/body.php");
        $this->load->view("admin/_partials/content.php", $data);
        $this->load->view("admin/guru/data_guru.php", $data);
        $this->load->view("admin/_partials/footer.php");
        $this->load->view("admin/_partials/modal.php");
        $this->load->view("admin/_partials/js.php");
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $student = $this->guru_model;
        $validation = $this->form_validation;
        $validation->set_rules($student->rules());

        if ($validation->run()) {
            $student->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/_partials/head.php");
        $this->load->view("admin/_partials/body.php");
        $this->load->view("admin/_partials/content.php", $data);
        $this->load->view("admin/guru/add.php", $data);
        $this->load->view("admin/_partials/footer.php");
        $this->load->view("admin/_partials/modal.php");
        $this->load->view("admin/_partials/js.php");

    }

    public function edit($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_user2'] = $this->guru_model->getById($id);
        if (!isset($id)) redirect('admin/siswa');
       
        $student = $this->guru_model;
        $validation = $this->form_validation;
        $validation->set_rules($student->rules());

        if ($validation->run()) {
            $student->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["student"] = $student->getById($id);
        if (!$data["student"]) show_404();
        
        $this->load->view("admin/_partials/head.php");
        $this->load->view("admin/_partials/body.php");
        $this->load->view("admin/_partials/content.php", $data);
        $this->load->view("admin/guru/edit.php", $data);
        $this->load->view("admin/_partials/footer.php");
        $this->load->view("admin/_partials/modal.php");
        $this->load->view("admin/_partials/js.php");
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->guru_model->delete($id)) {
            redirect(site_url('admin/siswa/'));
        }
    }
}
