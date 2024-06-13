<?php 

class Book_model extends CI_Model  {

    public function __construct() {
    parent::__construct();

    $this->load->database();
    
    }
    

        public function get_books() {
            $query = $this->db->get(‘books’);
            return $query->result_array();
            
            }
            
            public function insert_book($data) {
            var_dump($data['title']);
            $data= array(
               'title' => $data['title'],
                'author'=> $data['author'],
                'genre' => $data['genre'],
                'published_year' => $data['published_year'],
                'description' => $data['description']
            );
             $this->title = $data['title'];
            $this->author = $data['author'];
            $this->genre = $data['genre'];
            $this->published_year = $data['published_year'];
            var_dump($this->published_year);
            $this->description = $data['description'];
            
            // $sql = "INSERT INTO `books` (title, author, genre, published_year, description) VALUES ('".$data["title"]."', '".$data["author"]."', '".$data["genre"]."', '".$data["published_year"]."','".$data["description"]."')";
            // if($this->db->query($sql) == TRUE){
                // echo "success";
                // die();
            // }
            if($this->db->insert('books',$data)){
                return "data is inserted successfully";
            }
            else{
                return "error has occcured";
            }
            // $data=array(
            //     'title' => $data['title'],
            //     'author'=> $data['author'],
            //     'genre' => $data['genre'],
            //     'published_year' => $data['published_year'],
            //     'description' => $data['description']
            // );
           
            // $this->title = $data['title'];
            // $this->author = $data['author'];
            // $this->genre = $data['genre'];
            // $this->published_year = $data['published_year'];
            
            // $this->description = $data['description'];
            // die("here");
            
            // if($this->db->insert('books',$data)){
            //     return "data is inserted successfully";
            // }
            // else{
            //     return "error has occcured";
            // }
            }
            
            public function get_book_by_id($id) {
            
                $query = $this->db->get_where('books', array('id' => $id));
                return $query->row_array();
        
            // $query = $this->db->get_where('books', array('id' => $id));
            // // var_dump($query);
            // // die();
            // return $query->result_array();

            
            }
            
            public function update_book($id, $data) {
                // var_dump($id['title']);
                var_dump($data['title']);

                $data= array(
                    'title' => $data['title'],
                     'author'=> $data['author'],
                     'genre' => $data['genre'],
                     'published_year' => $data['published_year'],
                     'description' => $data['description']
                 );
                  $this->title = $data['title'];
                 $this->author = $data['author'];
                 $this->genre = $data['genre'];
                 $this->published_year = $data['published_year'];
                 var_dump($this->published_year);
                 $this->description = $data['description'];
                 $this->db->where('id', $this->input->post('id'));

                 if($this->db->update('books',$data));
            {
                return "data is updated successfully";
            }
                // $sql="UPDATE books SET title='".$data["title"]."', author='".$data["author"]."', genre='".$data["genre"]."', published_year='".$data["published_year"]."', description='".$data["description"]."' WHERE id='".$id."'";
                // if($this->db->query($sql) == TRUE){
                //     echo "success";
                // }
                // $sql = "UPDATE books SET title = '$data["title"]', author = '$data["author"]', genre = $data["genre"], published_year = $data["published_year"], description = $data["description"] WHERE id = $id";

                // $sql = "UPDATE `books` SET title = '', author = '$data["author"]', genre= $data["genre"], published_year= $data["published_year"], description = $data["description"]  WHERE id = $id";
                // $sql = "INSERT INTO `books` (title, author, genre, published_year, description) VALUES ('".$data["title"]."', '".$data["author"]."', '".$data["genre"]."', '".$data["published_year"]."','".$data["description"]."')";
                // if($this->db->query($sql) == TRUE){
                    // echo "succss";
                // }
        }
            
            public function delete_book($id) {
            
            return $this->db->delete('books', array('id' => $id));
            
            }
            
            }


?>