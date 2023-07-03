<?php
include("../admin/libraries/database.php")

?>
<?php
class feedback
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function show_feedback()
    {
        $query = "SELECT * FROM lienhe ORDER BY fb_id desc";
        $result = $this->db->select($query);
        return $result;
    }


}
?>