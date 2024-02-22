<?php
class Blog_model extends CI_Model{
    public function getBlog($limit, $offset){
            $filter = $this->input->get('find');
            // $this->db->where('title', $filter); /sama persis
            // $this->db->like('title', $filter); //mencari kata yang mengandung kata yang diinputkan
            $this->db->limit($limit, $offset);
        return $this->db->get("blog");
    }

    public function getCount(){
            $filter = $this->input->get('find');
        return $this->db->count_all_results("blog");
    }

    public function getDetail($field, $value){
        $this->db->where($field, $value);
        return $this->db->get('blog');
    }
    public function add($data){
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }
    public function update($id, $post){
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }

}
?>