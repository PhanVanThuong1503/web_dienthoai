<?php
    include("config/config.php");

    include("header.php");
    include("menu.php");

    if(isset($_POST['tukhoa']) && !empty($_POST['tukhoa'])){
        $tukhoa = $_POST['tukhoa'];
        $sql_pro = "SELECT * FROM product, category WHERE product.cate_id = category.cate_id AND product.product_name LIKE '%".$tukhoa."%'";
    }
    else
    {
        $sql_pro="SELECT * FROM product";
    }
    $query_pro = mysqli_query($conn, $sql_pro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form-search">
        
        <div class="search cs-search">
        
            <div class="title">
                    <div class="title1">
                        <h3 style="margin: 15px 0 -5px 0;">Từ khóa tìm kiếm: "<p style="color: red; display:inline"><?php if(isset($_POST['tukhoa'])){ echo $_POST['tukhoa'];} else{echo '^_^';} ?></p>"</h3>
                    </div>

                </div>
                
                <div class="prd">
                    <ul class="product_list">
                        <?php
                            while($row_pro=mysqli_fetch_array($query_pro)){
                                ?>
                        
                        <li> 
                            <a href="chitietsp.php?product_id=<?php echo $row_pro['product_id'] ?>">
                                <img src="admin/public/images/sp.webp" alt="" style="position: absolute;">
                                <img src="public/uploads/<?php echo $row_pro['product_image'] ?>" alt="" style="height: 150px; margin: 33px 65px">
                            
                                <h3><?php echo $row_pro['product_name'] ?></h3>
                                <div class="price" style="float: left;"><?php echo number_format($row_pro['product_price'],0,',','.') ?> <u>đ</u></div>
                                <div style="float: right; margin-top: 5px; color:red; text-decoration:line-through"><?php echo number_format($row_pro['price'],0,',','.') ?> <u>đ</u></div>
                                <div style="clear: both;"></div>
                                <div class="prd_config">
                                    <img src="admin/public/images/km.webp" alt="" style="border-radius: 50%; box-shadow: 0 0 0 1px #ffffff; width: 30px; margin-left: 20px">
                                    <p style="font-size: 14px;">Giảm 5% tối đa 1.200.000đ khi trả góp qua Kredivo</p>
                                </div>
                            </a>
                            
                        </li>
                        <?php
                            }
                        ?>
                        
                    </ul>
                </div>
        </div>
    </div>
</body>
<?php
    include("footer.php")
?>
</html>