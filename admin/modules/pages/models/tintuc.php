<?php
    include("../admin/libraries/database.php")
?>
<?php
    class news{
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }
        public function insert_news($data, $file){
            $news_name = mysqli_real_escape_string($this->db->link, $data['news_name']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['news_image']['name'];
            $file_size = $_FILES['news_image']['size'];
            $file_temp = $_FILES['news_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "../public/uploads/" .$unique_image;
            move_uploaded_file($file_temp, $uploaded_image);

            if ($file_name != '') {
                
                $query = "INSERT INTO news(news_name, news_image, description) 
                    VALUE('$news_name', '$unique_image', '$description')";
                $result = $this->db->insert($query);
    
                
            }
        }


        public function show_news(){
            $query = "SELECT *FROM news ORDER BY news_id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getnewsbyId($id)
        {
            $query = "SELECT *FROM news WHERE news_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_news($data, $files, $id)
        {

            $news_name = mysqli_real_escape_string($this->db->link, $data['news_name']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);

            $permited = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['news_image']['name'];
            $file_size = $_FILES['news_image']['size'];
            $file_temp = $_FILES['news_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "../public/uploads/" .$unique_image;

            // move_uploaded_file($file_temp, $uploaded_image);



            if (!empty($file_name)) {
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE news SET 
                    news_name = '$news_name', 
                    news_image = '$unique_image',
                    description = '$description'
                    WHERE news_id = '$id' ";

                $sql = "SELECT * FROM news WHERE news_id='$id' LIMIT 1";
                $query1=$this->db->select($sql);
                while($row = mysqli_fetch_array($query1)){
                    unlink('../public/uploads/'.$row['news_image']);
                }
            } 
            else {
                $query = "UPDATE news SET 
                    news_name = '$news_name', 
                    description = '$description'
                    WHERE news_id = '$id' ";
            }

            $result = $this->db->update($query);
            
        }


        public function delete_news($id)
        {
            $sql = "SELECT * FROM news WHERE news_id='$id' limit 1";
            $result1 = $this->db->select($sql);
            while($row = mysqli_fetch_array($result1)){
                unlink('../public/uploads/'.$row['news_image']);
            }

            $query = "DELETE FROM news WHERE news_id = '$id'";
            $result = $this->db->delete($query);
            
        }
    }
?>