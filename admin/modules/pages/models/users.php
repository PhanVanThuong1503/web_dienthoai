<?php
include("../admin/libraries/database.php")

?>
<?php
class user
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function show_user()
    {
        $query = "SELECT * FROM user ORDER BY user.user_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    
    public function delete_user($id)
    {
        $query = "DELETE FROM user WHERE user_id = '$id'";
        $result = $this->db->delete($query);
        
    }

}
?>