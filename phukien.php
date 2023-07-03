<?php
    include("config/config.php");
    include("header.php");
    include("menu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/lineicons.css">
    <link rel="stylesheet" href="public/css/starter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    <title>Phụ kiện</title>
    <style>
        a{
            text-decoration: none;
        }
     
    </style>
</head>
<body>

    <section class="myslider">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="admin/public/images/slidepk1.webp" style="height: 250px;" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="admin/public/images/slidepk2.webp" style="height: 250px;" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item">
                <img src="admin/public/images/slidepk3.webp" style="height: 250px;" class="d-block w-100" alt="...">
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>
    <p style="margin:10px 110px -35px ;"><a href="">Trang chủ </a>/ Phụ kiện</p>
    <section class="content8">

        <section class="mymaincontent-pk">
            <div class="row">
                <?php
                    
                    if(isset($_GET['trang'])){
                        $page = $_GET['trang'];
                    }
                    else
                    {
                        $page=1;
                    }
                    if($page=='' || $page==1){
                        $begin = 0;
                    }
                    else{
                        $begin = ($page*4)-4;
                    }
                ?>
                <?php
                    if(isset($_GET['cate_id'])){
                        $id=$_GET['cate_id'];
                        $sql_pro = "SELECT * FROM phukien WHERE cate_id='$id' LIMIT 8";
                    }else{
                        $sql_pro = "SELECT * FROM phukien LIMIT $begin, 4";
                    }
                    
                    $query_pro = mysqli_query($conn, $sql_pro);
                    while($row_pro=mysqli_fetch_array($query_pro)){
                ?>
                

                <div class="col" style="padding-right: 5px;">
                    <a href="chitietpk.php?pk_id=<?php echo $row_pro['pk_id'] ?>">
                        <div class="card" style="width: 19rem; height: 30rem; border: none;">
                            <div>
                                <img src="admin/public/images/sp.webp" class="card-img-top" alt="..." style="position:absolute;" >
                                <img src="public/uploads/<?php echo $row_pro['pk_anh'] ?>"  alt="..." style="margin-left: 60px; height: 180px; margin-top: 40px;" >
                            </div>
                    
                            <div class="card-body" style="margin-top: 20px; margin-left: -10px">
                                <h6 class="card-title"><a href="" style="color: #000;"><b><?php echo $row_pro['pk_ten'] ?></b></a></h6>
                                <div class="gia"><p><?php echo number_format($row_pro['pk_gia'],0,',','.'). 'đ' ?></p></div>
                                <div class="component" style="background: #f8f9fa; width: 300px; margin-top:7px; border-radius: 10px">
                                
                                    <div class="prd_config" style="width: 300px; height:80px" >
                                        <img src="admin/public/images/km.webp" alt="" style="border-radius: 50%; box-shadow: 0 0 0 1px #ffffff; width: 30px; margin-left: 20px;height:30px">
                                        <p style="font-size: 14px; margin-left:10px">Giảm 5% tối đa 1.200.000 đ khi trả góp qua Kredivo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
                
                
                   
            <div class="btn-group me-2" role="group" aria-label="First group">
            <p style="margin-top: 5px;">Trang: </p>
                
                <?php
                   if(isset($_GET['cate_id'])){
                        $sql_trang=mysqli_query($conn, "SELECT * FROM phukien WHERE cate_id='$id'");
                    }else{
                        $sql_trang=mysqli_query($conn, "SELECT * FROM phukien");
                    }
                    $row_count=mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/4);
                ?>
                <ul class="list_trang">
                <?php
                        if($page>3){
                            $first_page = 1;
                    ?>
                    <li><a href="?trang=<?php echo $first_page; ?>">First</a></li>
                    <?php    }
                            if($page>1){
                                $prev = $page-1;
                                ?>
                                <li><a href="?trang=<?php echo $prev; ?>">Prev</a></li>
                        <?php
                            }
                        
                    ?>
                    <?php
                        for($i=1; $i<=$trang; $i++)
                        {
                            if($i>$page-3 && $i<$page+3){
                            ?>
                            <li <?php if($i==$page){echo 'style="background: #999999"';}else{echo '';} ?>><a href="?trang=<?php echo $i ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        }
                        if($page<$trang-1){
                            $next = $page+1;
                    ?>
                    <li><a href="?trang=<?php echo $next; ?>">Next</a></li>
            <?php
                }
                    ?>
                    <?php
                        if($page<$trang-3){
                            $last_page = $trang;
                    ?>
                    <li><a href="?trang=<?php echo $last_page; ?>">Last</a></li>
                    <?php    }
                            
                        
                    ?>
                </ul>
            </div>


            <div style="height: 300px; width: 100%; margin-top: 50px; display: flex;">
                <div style="width:25%; height:300px;">
                    <div style="text-align: center; height: 200px; margin-top: 20px">
                        <div style="line-height: 150px;"><img src="admin/public/images/icpk1.png" alt="" style="height: 90px;"></div>
                        <div>
                            <b>Thương hiệu đảm bảo</b>
                            <p>Nhập khẩu và bảo hành chính hãng</p>
                        </div>
                    </div>
                </div>

                <div style="width:25%; height:300px;">
                    <div style="text-align: center; height: 200px; margin-top: 20px">
                        <div style="line-height: 150px;"><img src="admin/public/images/icpk2.png" alt="" style="height: 90px;"></div>
                        <div>
                            <b>Đổi trả dễ dàng</b>
                            <p>Theo chính sách đổi trả tại FPTShop</p>
                        </div>
                    </div>
                </div>

                <div style="width:25%; height:300px;">
                    <div style="text-align: center; height: 200px; margin-top: 20px">
                        <div style="line-height: 150px;"><img src="admin/public/images/icpk3.png" alt="" style="height: 90px;"></div>
                        <div>
                            <b>Giao hàng tận nơi</b>
                            <p>Tại 63 tỉnh thành</p>
                        </div>
                    </div>
                </div>

                <div style="width:25%; height:300px;">
                    <div style="text-align: center; height: 200px; margin-top: 20px">
                        <div style="line-height: 150px;"><img src="admin/public/images/icpk4.png" alt="" style="height: 90px;"></div>
                        <div>
                            <b>Sản phẩm chất lượng</b>
                            <p>Đảm bảo tương thích và độ bền cao</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        
    </section>


    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <?php
        include("footer.php");
    ?>
</body>
</html>