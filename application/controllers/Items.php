<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('item_model');
    }

    public function index() {
        $data['items'] = $this->item_model->get_items();
        $this->load->view('items/index', $data);
    }

    public function create() {
        $this->load->view('items/create');
    }

    public function edit($id) {
        $data['item'] = $this->item_model->get_item_by_id($id);
        $this->load->view('items/edit', $data);
    }

    public function add_item() {
        // Get the inputs from POST data
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
    
        // Prepare data array
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price
        );
    
        // File Upload Logic
        $config['upload_path'] = './assets/img/items/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '1310720'; // 1.5 MB
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('images')) {
            $upload_data = $this->upload->data();
            $data['images'] = $upload_data['file_name'];
        } else {
            $data['images'] = 'default_item_image.png'; // Default image if upload fails
        }
    
        // Insert item into database
        $this->item_model->add_item($data);
    
        redirect('items'); // Redirect to items listing page
    }
    
    

    public function update_item() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        );
        $this->item_model->update_item($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_item($id) {
        $this->item_model->delete_item($id);
        echo json_encode(array("status" => TRUE));
    }
}
?>
