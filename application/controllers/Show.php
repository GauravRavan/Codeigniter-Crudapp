<?php
class Show extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("Show_model");
        $this->load->library('form_validation');

    }

    public function index() {
        $this->load->database();
        $data['result'] = $this->Show_model->getData();
        $this->load->view('show', $data);
    }

    public function delete($id) {
        $this->Show_model->deleteData($id);

        // Redirect back to the same page (show) after deleting the record
        redirect(base_url("show"));
    }
    public function showadd() {
        //redirect(base_url("add"));
        $this->load->view('add');
    }
    public function add() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('userInfo', 'User Info', 'required');

        if($this->form_validation->run() == FALSE) {
            $alert_message = "Enter valid inputs.";
            redirect("http://localhost/codeigniter/crud/index.php/show/showadd?alert=".urlencode($alert_message));
           }
        else{
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name= $this->input->post('name');
            $userInfo = $this->input->post('userInfo');
            $data = array(
                'user' => $name,
                'info' => $userInfo
                        );

        $this->db->insert('notes2', $data);
        redirect(base_url("show"));
    }}
}
    public function edit($id) {
        $data['record'] = $this->Show_model->showedit($id); // Load data from the model
        $this->load->view("edit", $data); // Pass data to the view
        
    }
    public function uedit($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('userInfo', 'User Info', 'required');

        if($this->form_validation->run() == FALSE) {
            $alert_message = "Enter valid inputs.";
            redirect("http://localhost/codeigniter/crud/index.php/show/edit/{$id}?alert=".urlencode($alert_message));
            // redirect("http://localhost/codeigniter/crud/index.php/show/edit/". $id);
            

        }else{
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name= $this->input->post('name');
            $userInfo = $this->input->post('userInfo');
            $data = array(
                'user' => $name,
                'info' => $userInfo
                        );

         $this->db->set($data);                
        $this->db->where('id', $id);
        $this->db->update('notes2');
        redirect(base_url("show"));
      }
    }

}
}

?>