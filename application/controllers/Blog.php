<?php
class Blog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Blog_model');

    }
    public function index($offset = 0){

        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = $this->Blog_model->getCount();
        $config['per_page'] = 3;

        $this->pagination->initialize($config);


        $query = $this->Blog_model->getBlog($config['per_page'], $offset);
        $data['articles'] = $query->result_array();

        $this->load->view('blog', $data);
    }
    
    public function detail($url){
        // $query = $this->db->query('SELECT * FROM blog WHERE url = "'.$url.'"');
        // $this->db->where('url', $url);
        // $query = $this->db->get('blog');
        $query = $this->Blog_model->getDetail('url', $url);
        $data['articles'] = $query->row_array();
        
        $this->load->view('detail', $data);
    }

    public function add(){
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Konten', 'required');

        if($this->form_validation->run() === TRUE){
            $data['title'] = $this->input->post('title');
            $data['url'] = $this->input->post('url');
            $data['content'] = $this->input->post('content');
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cover'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $data['cover'] = $this->upload->data()['file_name'];
            }
        
            $id = $this->Blog_model->add($data);

            if($id){
               return redirect('blog');
            } else{
                echo "Data gagal disimpan";
            }

        }

        // if(isset($_POST['title'])){
        //     $data['title'] = $_POST['title'];
        //     $data['content'] = $_POST['content'];
        //     $this->db->insert('blog', $data);
        // print_r($data);
        // }

        $this->load->view('add');
    }

    public function edit($id){
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Konten', 'required');

        if($this->form_validation->run() === TRUE){
            $post['title'] = $this->input->post('title');
            $post['url'] = $this->input->post('url');
            $post['content'] = $this->input->post('content');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            
            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');

            if (!empty($this->upload->data()['file_name']))
            {
                $post['cover'] = $this->upload->data()['file_name'];
            }

            $id = $this->Blog_model->update($id,$post);

            return redirect('blog');
        }
        $query = $this->Blog_model->getDetail('id', $id);
        $data['articles'] = $query->row_array();
        $this->load->view('edit', $data);
    }

    public function delete($id){
        $this->Blog_model->delete($id);
        return redirect('blog');
    }
}
?>