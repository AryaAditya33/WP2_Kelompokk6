<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
	parent::__construct();
        $this->load->model("auths_model");
        $this->load->library('form_validation');
        }

	public function index()
	{
        $data['current_user'] = $this->auths_model->current_user();
        $this->load->view("siswaa/_partials/head.php");
        $this->load->view("siswaa/_partials/body.php");
        $this->load->view("siswaa/_partials/content.php", $data);
        $this->load->view("siswaa/dashboard", $data);
        $this->load->view("siswaa/_partials/footer.php");
        $this->load->view("siswaa/_partials/modal.php");
        $this->load->view("siswaa/_partials/js.php");

	}
        
        public function sendEmail()
        {
        $data['current_user'] = $this->auths_model->current_user();
      // Konfigurasi email
        $config = [
            'useragent' => "CodeIgniter",
            'mailpath' => "/usr/bin/sendmail",
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'aryaaditya0303@gmail.com',  // Email gmail
            'smtp_pass'   => 'sgeg rhrq nytz bqme',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('aryaaditya0303@gmail.com', 'NewStudentInformation');

        // Email penerima
        $this->email->to($data['current_user']->email); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Link Untuk Test Ujian');

        // Isi email
        $this->email->message("Hai! Ini Link Ujian Untuk Test! <br><br> KLIK <strong><a href='https://forms.gle/ZQTGYoSYJmenEvxm6' target='_blank' rel='noopener'>DISINI</a></strong> UNTUK MELAKUKAN TEST UJIAN!");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        $this->session->set_flashdata('messageEmail', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>LINK TELAH BERHASIL DIKIRIMKAN KE EMAIL ANDA!</div>');
            redirect(site_url('students/dashboard'));
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
        }
}
