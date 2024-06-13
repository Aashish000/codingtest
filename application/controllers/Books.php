
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

class Books extends CI_Controller {

public function __construct() {

parent::__construct();
$this->load->database();
$this->load->helper('url');


}

public function index() {
    //query to get data 
    $query=$this->db->get('books');
    // $data['json']=$query->result_array();
    //sending data using json encode
    echo json_encode($query->result_array());
    // echo ($query->result_array());
    // return json_encode($query->result_array());
    
    
}

public function insert_book(){
    //get form data 
    $form_data = $this->input->post();
    //load model
    $this->load->model('Book_model');
    //insert function
    $this->Book_model->insert_book($form_data);
    //send response
    $response = "success";
    return $response;
    // var_dump($form_data);
    die();
   
//     $data = json_decode(file_get_contents('php://input'), true);
//     $this->load->model('Book_model');
//     $this->Book_model->insert_book($data);
//     $r = "added successfully";
//     $this->response($r);

}

public function get_book_by_id($id) {
    //load model
    $this->load->model('Book_model');
    //get data to book variable
    $book = $this->Book_model->get_book_by_id($id);
    //check if has value then echo else error
    if ($book) {
        echo json_encode($book);
    } else {
        show_404();
    }
//     $query = $this->db->get_where('books', array('id' => $id));
//     echo json_encode($query);
// //    $query = json_encode($query->row_array());
//    var_dump($query->row_array());
    
    }
// Include methods for create, update, and delete operations
public function update_book($id) {
    //get form data 
    $form_data = $this->input->post();
    //load model
    $this->load->model('Book_model');
    //update 
    $this->Book_model->update_book($id,$form_data);
    
    }
public function delete_book($id) {
//return db delete
        return $this->db->delete('books', array('id' => $id));
        
        }
}

?>