<?php
include("../admin/libraries/database.php")

?>
<?php
class product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_product($data, $files)
    {
        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
        $product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $product_quantity = mysqli_real_escape_string($this->db->link, $data['product_quantity']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $hsx = mysqli_real_escape_string($this->db->link, $data['hsx']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_temp = $_FILES['product_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../public/uploads/" .$unique_image;

        move_uploaded_file($file_temp, $uploaded_image);
        if ($file_name != '') {
            
            $query = "INSERT INTO product(product_name, price, product_price, product_quantity, product_image, description, cate_id, ma_hsx) 
                VALUE('$product_name', '$price', '$product_price', '$product_quantity', '$unique_image', '$description', '$category', '$hsx')";
            $result = $this->db->insert($query);

            
        }
    }


    public function show_product()
    {
        $query = "SELECT product.*, category.cate_name, hsx.ten_hsx
                      FROM product INNER JOIN category ON product.cate_id = category.cate_id
                      INNER JOIN hsx on product.ma_hsx = hsx.ma_hsx
                      ORDER BY product.product_id desc";
        // $query = "SELECT *FROM product ORDER BY product_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_sum1()
    {
        $query =  "SELECT SUM(product_quantity) AS 'tongsl1' FROM product";
        $arr = $this->db->select($query);
        return $arr;
    }
    public function show_sum2()
    {
        $query =  "SELECT SUM(pk_soluong) AS 'tongsl2' FROM phukien";
        $arr = $this->db->select($query);
        return $arr;
    }
    public function show_sum3()
    {
        $query =  "SELECT count(*) AS 'tongsl3' FROM news";
        $arr = $this->db->select($query);
        return $arr;
    }

    public function show_donhang(){
        $query = "SELECT COUNT(*) as 'tongsl4' FROM tblorder WHERE status = '2'";
        $arr = $this->db->select($query);
        return $arr;
    }

    public function show(){
        $query = "SELECT order_detail.product_id, product_name, product_image, product_price, SUM(quantity) as'sl' FROM order_detail INNER JOIN product ON order_detail.product_id=product.product_id 
        INNER JOIN tblorder ON order_detail.order_id=tblorder.order_id WHERE tblorder.status='2' group by product_id, product_name, product_image, product_price
        ORDER BY sl DESC limit 5 ";
        $arr = $this->db->select($query);
        return $arr;
    }
    public function show_category()
    {
        $query = "SELECT *FROM category ORDER BY cate_id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_hsx(){
        $query = "SELECT *FROM hsx order by ma_hsx desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproductbyId($id)
    {
       // $query = "SELECT *FROM product WHERE product_id = '$id'";
       $query = "SELECT product.*, category.cate_name
       FROM product INNER JOIN category ON product.cate_id = category.cate_id
       WHERE product_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $files, $id)
    {

        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
        $product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);
        
        $product_quantity = mysqli_real_escape_string($this->db->link, $data['product_quantity']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $hsx = mysqli_real_escape_string($this->db->link, $data['hsx']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_temp = $_FILES['product_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../public/uploads/" .$unique_image;




        if (!empty($file_name)) {
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "UPDATE product SET 
                product_name = '$product_name', 
                product_price = '$product_price',
                product_quantity = '$product_quantity',
                product_image = '$unique_image',
                description = '$description',
                cate_id = '$category',
                ma_hsx = '$hsx'
                WHERE product_id = '$id' ";

            $sql = "SELECT * FROM product WHERE product_id='$id' LIMIT 1";
            $query1=$this->db->select($sql);
            while($row = mysqli_fetch_array($query1)){
                unlink('../public/uploads/'.$row['product_image']);
            }
        } 
        else {
            $query = "UPDATE product SET 
            product_name = '$product_name', 
            product_price = '$product_price',
            product_quantity = '$product_quantity',
            description = '$description',
            cate_id = '$category',
            ma_hsx = '$hsx'
            WHERE product_id = '$id' ";
        }

        $result = $this->db->update($query);
        
    }

    public function delete_product($id)
    {
        $sql = "SELECT * FROM product WHERE product_id='$id' limit 1";
        $result1 = $this->db->select($sql);
        while($row = mysqli_fetch_array($result1)){
            unlink('../public/uploads/'.$row['product_image']);
        }

        $query = "DELETE FROM product WHERE product_id = '$id'";
        $result = $this->db->delete($query);
        
    }


    public function getproduct_bycateid($cate_id){
        $query = "SELECT product.*,category.cate_name
        FROM product INNER JOIN category ON product.cate_id = category.cate_id
        WHERE category.cate_id = '$cate_id' ";
        $result = $this->db->select($query);
        return $result;
    }

}
?>