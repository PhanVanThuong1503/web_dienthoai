<?php
    include("config/config.php");
    mysqli_set_charset($conn, 'UTF8');
    include("header.php");
    include("menu.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="content9">
    <p style="font-size: 18px;"><a href="index.php">Trang chủ</a> / Tin tức</p>

    <div class="main" style="margin-top: 40px;">
        <div class="sidebar">
            <div class="danhmuc">
                <p class="ten-tieude">TIN TỨC NỔI BẬT</p>
                <ul style="margin: -20px 0 0 -40px;">
                    <?php  
                        $get_news = mysqli_query($conn, "SELECT * FROM news LIMIT 8");
                        if($get_news){
                            $i = 0;
                            while($result1 = mysqli_fetch_array($get_news)){
                                $i++;
                                
                    ?>
                    <li class="dm-sp">
                        <a href="chitiettintuc.php?id=<?php echo $result1['news_id'] ?>">
                            <img src="public/uploads/<?php echo $result1['news_image'] ?>" alt="">
                            <p><?php echo substr($result1['news_name'],0,23),'...' ?></p>
                        </a>
                    </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>

        <div class="content-list-tt">
            <?php  
                $get_news2 = mysqli_query($conn, "SELECT * FROM news LIMIT 9");
                if($get_news2){
                    $i = 0;
                    while($result2 = mysqli_fetch_array($get_news2)){
                        $i++;
                        
            ?>
            <li>
                <a href="chitiettintuc.php?id=<?php echo $result2['news_id'] ?>"><img src="public/uploads/<?php echo $result2['news_image'] ?>" alt=""></a>
                <a href="chitiettintuc.php?id=<?php echo $result2['news_id'] ?>" class="ten_tt"><?php echo $result2['news_name'] ?></a>
                <p><?php echo substr($result2['description'],0,204),'...' ?></p>
            </li>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php
    include("footer.php")
?>

</body>
</html>