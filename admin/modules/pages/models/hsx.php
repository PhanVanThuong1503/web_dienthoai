<?php
    include("../admin/libraries/database.php")

?>

<?php
    class hsx{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function insert_hsx($data){
            // $ten_hsx = mysqli_real_escape_string($this->db->link, $data['ten_hsx']);
            // $diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
            // $sodt = mysqli_real_escape_string($this->db->link, $data['sodt']);
            if(!empty($data)){
                
                    $query = "INSERT INTO hsx(ten_hsx) value('$data')";
                    $result = $this->db->insert($query);
                    
                }

                
            }
        

        public function show_hsx(){
            $query = "SELECT *FROM hsx order by ma_hsx desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_hsx($ma_hsx){
            $query = "DELETE FROM hsx WHERE ma_hsx = '$ma_hsx'";
            $result = $this->db->delete($query);
            
        }

        public function update_hsx($data, $id){
            
            if(!empty($data)){
                
                    $query = "UPDATE hsx SET ten_hsx = '$data' where ma_hsx = '$id'";
                    $result = $this->db->update($query);
                    
                
                }
           
            }
            
            
        


        public function get_hsx_byid($id){
            $query = "SELECT *FROM hsx where ma_hsx = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
    }




?>