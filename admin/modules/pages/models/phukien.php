<?php
include("../admin/libraries/database.php")

?>
<?php
class phukien
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_phukien($data, $files)
    {
        $pk_ten = mysqli_real_escape_string($this->db->link, $data['pk_ten']);
        $pk_gia = mysqli_real_escape_string($this->db->link, $data['pk_gia']);
        $pk_soluong = mysqli_real_escape_string($this->db->link, $data['pk_soluong']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['pk_anh']['name'];
        $file_size = $_FILES['pk_anh']['size'];
        $file_temp = $_FILES['pk_anh']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../public/uploads/" .$unique_image;

        move_uploaded_file($file_temp, $uploaded_image);
        if ($file_name != '') {
            $query = "INSERT INTO phukien(pk_ten, cate_id, pk_gia, pk_soluong, pk_anh) 
                VALUE('$pk_ten', '$category', '$pk_gia', '$pk_soluong', '$unique_image')";
            $result = $this->db->insert($query);

            
        }
        
    }


    public function show_phukien()
    {
        $query = "SELECT phukien.*, category.cate_name FROM phukien INNER JOIN category ON phukien.cate_id = category.cate_id ORDER BY phukien.pk_id desc";
        // $query = "SELECT *FROM product ORDER BY product_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_sum()
    {
        $query =  "SELECT SUM(pk_soluong) AS 'tongsl' FROM phukien";
        $arr = $this->db->select($query);
        return $arr;
    }
    /////
    public function show_category()
    {
        $query = "SELECT *FROM category ORDER BY cate_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getphukienbyId($id)
    {
       // $query = "SELECT *FROM product WHERE product_id = '$id'";
       $query = "SELECT phukien.*, category.cate_name
       FROM phukien INNER JOIN category ON phukien.cate_id = category.cate_id
       WHERE pk_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_phukien($data, $files, $id)
    {

        $pk_ten = mysqli_real_escape_string($this->db->link, $data['pk_ten']);
        $pk_gia = mysqli_real_escape_string($this->db->link, $data['pk_gia']);
        $pk_soluong = mysqli_real_escape_string($this->db->link, $data['pk_soluong']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['pk_anh']['name'];
        $file_size = $_FILES['pk_anh']['size'];
        $file_temp = $_FILES['pk_anh']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../public/uploads/" .$unique_image;

        // move_uploaded_file($file_temp, $uploaded_image);



        if (!empty($file_name)) {
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "UPDATE phukien SET 
                pk_ten = '$pk_ten', 
                pk_gia = '$pk_gia',
                pk_soluong = '$pk_soluong',
                pk_anh = '$unique_image',
                cate_id = '$category'
                WHERE pk_id = '$id' ";

            $sql = "SELECT * FROM phukien WHERE pk_id='$id' LIMIT 1";
            $query1=$this->db->select($sql);
            while($row = mysqli_fetch_array($query1)){
                unlink('../public/uploads/'.$row['pk_anh']);
            }
        } 
        else {
            $query = "UPDATE phukien SET 
                pk_ten = '$pk_ten', 
                cate_id = '$category',
                pk_gia = '$pk_gia',
                pk_soluong = '$pk_soluong'
                
                WHERE pk_id = '$id' ";
        }

        $result = $this->db->update($query);
    }

    public function delete_phukien($id)
    {
        $sql1 = "SELECT * FROM phukien WHERE pk_id='$id' limit 1";
        $result1 = $this->db->select($sql1);
        while($row = mysqli_fetch_array($result1)){
            unlink('../public/uploads/'.$row['pk_anh']);
        }

        $query = "DELETE FROM phukien WHERE pk_id = '$id'";
        $result = $this->db->delete($query);
    }


   

}
?>