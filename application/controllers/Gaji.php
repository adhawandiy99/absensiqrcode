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
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->user = $this->ion_auth->user()->row();
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
        $chek = $this->ion_auth->is_admin();

        if (!$chek) {
            $hasil = 0;
        } else {
            $hasil = 1;
        }
        $user = $this->user;
        $gaji = $this->Gaji_model->get_all();

        $data = array(
            'gaji_data' => $gaji,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
            'result' => $hasil,

        );
        $this->template->load('template/template', 'gaji/gaji_list', $data);
        $this->load->view('template/datatables');
    }

    public function form($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $row = $this->Gaji_model->get_by_id($id);
        $karyawan = $this->Karyawan_model->get_all_query_total();
        // print_r($karyawan);
        // die();
        $data = array(
            'karyawan' => $karyawan,
            'row' => $row,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
        );
        $this->template->load('template/template', 'gaji/gaji_form', $data);
    }
    public function save($id)
    {
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
            );
            if($this->Gaji_model->get_by_id($id)){
                //todo update
                $this->Gaji_model->update($id, $data);
                $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data gaji'));
            }else{
                //todo insert
                $this->Gaji_model->insert($data);
                $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambah data gaji'));
            }
            redirect(site_url('gaji'));
        }
    }

    
    public function delete($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
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
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $row = $this->Gaji_model->get_by_id($id);
        $karyawan = $this->Karyawan_model->get_all_query_total();
        // print_r($karyawan);
        // die();
        $data = array(
            'karyawan' => $karyawan,
            'row' => $row,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
        );
        $this->template->load('template/template', 'gaji/gaji_slip', $data);
    }
}
