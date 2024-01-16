<?php
class M_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function get_data($table) {
        return $this->db->get($table);
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    function delete($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }
    function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    function get_by_id($tabel, $id_column, $id)
    {
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }
    public function ubah_data($table, $data, $where)
    {
        // Fungsi untuk mengubah data dalam tabel
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
    public function get_by_column($table, $column, $value)
    {
        return $this->db->get_where($table, array($column => $value));
    }
   // application/models/Auth_model.php

    public function getDataUser() {
        $this->db->where('role', 'user');
        $query = $this->db->get('auth');

        // Mengembalikan hasil query sebagai array
        return $query->result();
    }
    public function countTotalUser() {
        $this->db->select('COUNT(*) as total');
        $this->db->where('role', 'user');
        $this->db->from('auth');

        $query = $this->db->get();

        return $query->row()->total;
    }
    public function countTotalCerita() {
        $this->db->select('COUNT(*) as total');
        $this->db->from('cerita_novel');

        $query = $this->db->get();

        return $query->row()->total;
    }
    public function get_cerita_novel() {
        // Gantilah 'nama_tabel' dengan nama tabel sesuai dengan struktur database Anda
        $query = $this->db->get('cerita_novel');

        // Mengembalikan hasil query sebagai array
        return $query->result();
    }

    public function get_cerita_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('cerita_novel');
        $this->db->where('id_user', $user_id);
        $query = $this->db->get();

        return $query->result();
    }

}

?>