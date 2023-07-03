<?php
    include("../admin/libraries/database.php")

    // $filepath = realpath(dirname(__FILE__));
    // include ($filepath.'../admin//libraries/database.php');
?>
<?php
    class category{
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }
        public function insert_category($cate_name){
            if(!empty($cate_name)){
                $query = "INSERT INTO category(cate_name) VALUE('$cate_name')";
                $result = $this->db->insert($query);

                
            }
        }


        public function show_category(){
            $query = "SELECT *FROM category ORDER BY cate_id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatebyId($id){
            $query = "SELECT *FROM category WHERE cate_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($cate_name, $id){
           
            $cate_name = mysqli_real_escape_string($this->db->link, $cate_name);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(!empty($cate_name)){
                $query = "UPDATE category SET cate_name = '$cate_name' WHERE cate_id = '$id'";
                $result = $this->db->update($query);

            }
        }


        public function delete_cate($id){
            $query = "DELETE FROM category WHERE cate_id = '$id'";
            $result = $this->db->delete($query);
            
        }
    }
?>