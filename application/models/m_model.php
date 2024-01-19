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

    public function getDataUser() {
        $this->db->where('role', 'user');
        $query = $this->db->get('auth');

        return $query->result();
    }
    public function count($column, $where, $table) {
        $this->db->select('COUNT(*) as total');
        $this->db->where($column, $where);
        $this->db->from($table);

        $query = $this->db->get();

        return $query->row()->total;
    }
    
    public function get_cerita_novel() {
        $query = $this->db->get('cerita_novel');

        return $query->result();
    }

    public function get_cerita_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('cerita_novel');
        $this->db->where('id_user', $user_id);
        $query = $this->db->get();

        return $query->result();
    }
    public function status_cerita_belum_disetujui()
    {
        $data = $this->db->where(['status' => 'belum disetujui'])->get('cerita_novel');
        return $data;
    }
    public function cerita_disetujui() {
        $query = $this->db->get_where('cerita_novel', array('status' => 'disetujui'));

        return $query->result();
    }
    public function grafik_perminggu() {
        $query = $this->db->query("
            SELECT DAYNAME(tanggal_buat) as day, COUNT(*) as jumlah
            FROM cerita_novel
            WHERE tanggal_buat >= CURDATE() - INTERVAL 7 DAY
            GROUP BY day
        ");

        return $query->result();
    }
    public function update_novel($id_novel, $data)
    {
        // Fungsi untuk mengubah data novel dalam tabel 'cerita_novel' berdasarkan ID novel
        $where = array('id_novel' => $id_novel);
        return $this->ubah_data('cerita_novel', $data, $where);
    }

    public function get_novel_by_id($id_novel)
    {
        // Fungsi untuk mendapatkan detail novel berdasarkan ID
        return $this->db->get_where('cerita_novel', array('id_novel' => $id_novel))->row();
    }

}

?>