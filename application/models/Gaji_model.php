<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji_model extends CI_Model
{

    public $table = 'gaji';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $sql = "SELECT g.*,a.id_karyawan,a.nama_karyawan,b.nama_jabatan,c.nama_shift,d.nama_gedung,d.alamat
        from gaji g 
        left join karyawan a on g.karyawan_id=a.id
        left join jabatan b on a.jabatan=b.id_jabatan 
        left join shift c on a.id_shift = c.id_shift
        left join gedung d on a.gedung_id=d.gedung_id";
         return $this->db->query($sql)->result();
    }
    function get_by_karyawan_id($id)
    {
        $sql = "SELECT g.*,a.id_karyawan,a.nama_karyawan,b.nama_jabatan,c.nama_shift,d.nama_gedung,d.alamat
        from gaji g 
        left join karyawan a on g.karyawan_id=a.id
        left join jabatan b on a.jabatan=b.id_jabatan 
        left join shift c on a.id_shift = c.id_shift
        left join gedung d on a.gedung_id=d.gedung_id where g.karyawan_id='".$id."'";
         return $this->db->query($sql)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_q($id)
    {
      $sql = "SELECT g.*,a.id_karyawan,a.nama_karyawan,a.status_karyawan,b.nama_jabatan,c.nama_shift,d.nama_gedung,d.alamat
        from gaji g 
        left join karyawan a on g.karyawan_id=a.id
        left join jabatan b on a.jabatan=b.id_jabatan 
        left join shift c on a.id_shift = c.id_shift
        left join gedung d on a.gedung_id=d.gedung_id where g.id='".$id."'";
         return $this->db->query($sql)->result();
    }

 //    // get total rows
 //    function total_rows($q = NULL) {
 //        $this->db->like('id_jabatan', $q);
	// $this->db->or_like('nama_jabatan', $q);
	// $this->db->from($this->table);
 //        return $this->db->count_all_results();
 //    }

 //    // get data with limit and search
 //    function get_limit_data($limit, $start = 0, $q = NULL) {
 //        $this->db->order_by($this->id, $this->order);
 //        $this->db->like('id_jabatan', $q);
	// $this->db->or_like('nama_jabatan', $q);
	// $this->db->limit($limit, $start);
 //        return $this->db->get($this->table)->result();
 //    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}