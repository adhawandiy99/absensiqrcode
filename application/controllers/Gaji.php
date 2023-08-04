<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Gaji_model');
        $this->load->model('Users_model');
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->user = $this->ion_auth->user()->row();
        $this->profile = $this->Users_model->getProfile($this->user->id);
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

        Toast.fire({
            type: '" . $type . "',
            title: '" . $title . "'
        });
        ";
        return $messageAlert;
    }

    public function index()
    {
        if ($this->profile->name!='admin' && $this->profile->name!='finance') {
            show_error('Hanya Administrator & finance yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $data = array(
            'gaji_data' => $this->Gaji_model->get_all(),
            'user' => $this->user,
            'profile'   => $this->profile,

        );
        $this->template->load('template/template', 'gaji/gaji_list', $data);
        $this->load->view('template/datatables');
    }

    public function form($id)
    {
        if ($this->profile->name!='admin' && $this->profile->name!='finance') {
            show_error('Hanya Administrator & finance yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $row = @$this->Gaji_model->get_by_id_q($id)[0];
        $karyawan = $this->Karyawan_model->get_all_query_total();
        $data = array(
            'karyawan' => $karyawan,
            'row' => $row,
            'user' => $user,
        );
        $this->template->load('template/template', 'gaji/gaji_form', $data);
    }
    public function save($id)
    {
        if ($this->profile->name!='admin' && $this->profile->name!='finance') {
            show_error('Hanya Administrator & finance yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('gaji', TRUE));
        } else {
            $data = array(
                'gaji' => strtoupper($this->input->post('gaji', TRUE)),
                'potongan_asuransi' => strtoupper($this->input->post('potongan_asuransi', TRUE)),
                'potongan_mangkir' => strtoupper($this->input->post('potongan_mangkir', TRUE)),
                'potongan_pph' => strtoupper($this->input->post('potongan_pph', TRUE)),
                'tunjangan_jabatan' => strtoupper($this->input->post('tunjangan_jabatan', TRUE)),
                'tunjangan_konsumsi' => strtoupper($this->input->post('tunjangan_konsumsi', TRUE)),
                'tunjangan_harian' => strtoupper($this->input->post('tunjangan_harian', TRUE)),
                'bonus_target' => strtoupper($this->input->post('bonus_target', TRUE)),
                'total_gaji' => strtoupper($this->input->post('total_gaji', TRUE)),
                'karyawan_id' => strtoupper($this->input->post('karyawan_id', TRUE)),
                'periode' => strtoupper($this->input->post('periode', TRUE)),
                'total_kehadiran' => strtoupper($this->input->post('total_kehadiran', TRUE)),
                'total_alpha' => strtoupper($this->input->post('total_alpha', TRUE)),
                'potongan_pph_persen' => strtoupper($this->input->post('potongan_pph_persen', TRUE)),
            );
            if($this->Gaji_model->get_by_id($id)){
                //todo update
                $this->Gaji_model->update($id, $data);
                $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data gaji'));
            }else{
                //todo insert
                $this->Gaji_model->insert($data);
                $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambah data gaji'));
                $this->kirimEmail('riswandi.adha@gmail.com', 'Notifikasi Pengiriman Gaji', 'gaji nya adalah 99999999');

            }
            redirect(site_url('gaji'));
        }
    }

    
    public function delete($id)
    {
        if ($this->profile->name!='admin' && $this->profile->name!='finance') {
            show_error('Hanya Administrator & finance yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $row = $this->Gaji_model->get_by_id($id);

        if ($row) {
            $this->Gaji_model->delete($id);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menghapus data gaji'));
            redirect(site_url('gaji'));
        } else {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'data gaji tidak ditemukan'));
            redirect(site_url('gaji'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('gaji', 'gaji', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function slip($id)
    {
        $user = $this->user;
        $row = $this->Gaji_model->get_by_id_q($id)[0];
        // $karyawan = $this->Karyawan_model->get_all_query_total();
        $data = array(
            'row' => $row,
            'user' => $user
        );

        $this->template->load('template/template', 'gaji/gaji_slip', $data);
    }
    public function printer()
    {
        // die();
        $id = $this->input->post('gaji_id', TRUE);
        $user = $this->user;
        $row = $this->Gaji_model->get_by_id_q($id)[0];
        $data = array(
            'row' => $row,
            'user' => $user
        );
        $this->load->library('pdf');
        $html = $this->load->view('gaji/_pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
    public function slip_perorang()
    {
        $gaji = $this->Gaji_model->get_by_karyawan_id(129);
        $data = array(
            'gaji_data' => $gaji,
            'user'      => $this->user,
            'profile'   => $this->profile,
        );
        $this->template->load('template/template', 'gaji/gaji_list', $data);
        $this->load->view('template/datatables');
    }
    public function kirimEmail($to_email,$subject,$html_content)
    {
        $url = 'https://api.brevo.com/v3/smtp/email';
        $ch = curl_init($url);
        $datanya = ["sender"=>["name"=>"Riswandi Adha", "email"=>"riswandiadha.e03100141@gmail.com"], "to"=>[["email"=>$to_email,"name"=>$to_email]],"subject"=>$subject,"htmlContent"=>$html_content];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datanya));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'accept: application/json',
            'api-key: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',
            'content-type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
