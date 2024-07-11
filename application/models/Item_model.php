<?php
class Item_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database library in the constructor
        $this->load->helper('url');
    }

    public function get_items() {
        return $this->db->get('items')->result_array();
    }

    public function get_item_by_id($id) {
        return $this->db->get_where('items', array('id' => $id))->row_array();
    }

    // public function add_item($data) {
    //     $this->db->insert('items', $data);
    //     return $this->db->insert_id();
    // }
    public function add_item($data) {
        // Check if there are image details in $data
        if (isset($data['m_image']) && isset($data['pet_entry_id'])) {
            // Prepare image data for insertion
            $image_data['image_path'] = $data['m_image'];
            $image_data['pet_entry_id_img'] = $data['pet_entry_id'];
            
            // Insert image data into 'pet_images' table
            $this->db->insert('pet_images', $image_data);
        }
    
        // Remove image details from $data if they were there
        unset($data['m_image']);
        unset($data['pet_entry_id']);
    
        // Insert item data into 'items' table
        $this->db->insert('items', $data);
        
        // Return the ID of the inserted item
        return $this->db->insert_id();
    }
    

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }

    public function delete_item($id) {
        $this->db->where('id', $id);
        $this->db->delete('items');
    }
}
?>
