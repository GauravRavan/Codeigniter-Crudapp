<?php
class Show_model extends CI_Model {
    public function getData() {
        $query = $this->db->query('SELECT * FROM notes2');
        return $query->result();
    }

    public function deleteData($id) {
        // $this->db->where('id', $id);
        // $this->db->delete('notes2'); // Replace 'your_table_name' with your actual table name
        return $this->db->delete('notes2', ['id'=> $id]);
    }
    public function showedit($id) {
        $showedit = $this->db->get_where('notes2', ['id'=> $id]);
        return $showedit->result_array();

    }
}  
?>
