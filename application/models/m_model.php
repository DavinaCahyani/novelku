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
   }
?>