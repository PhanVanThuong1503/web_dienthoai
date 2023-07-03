<?php

    include("../admin/modules/pages/models/sanpham.php");
  

?>

<style>
    .contenttk {
    float: right;
    width: 1258px;
    height: 100%;
    padding-bottom: 100px;
    margin-right: 5px;
    min-height: 620px;
    
    }
    .sp{
        
        height: 150px;
        width: 300px;
        margin-top: 40px;
        margin-left: 40px;
        /* color: white; */
        background-color: white;
    }
    .sp p{
        text-align: left;
        padding-top: 20px;
        padding-left: 20px;

    }
    .sp img{
        width: 70px;
        margin-top: 20px;
        margin-left: 20px;
    }
    .sp>i{
        float: right;
        font-size: 50px;
        margin-right: 20px;
        margin-top: 40px;
        color: lightblue;
    }
    .thongkesp{
        margin-left: -20px;
        width: 1250px;
        height: 200px;
        /* background-color: red;    */
        display: flex;
        justify-items: center;
        /* text-align: center; */
        justify-content: center;
        
    }
    tr:nth-child(2n){
        background-color: #ebebeb;
    }
</style>

<?php
    // $db = new Database();
    $product = new product();
    // $pk = new phukien();
    // $news = new news();

?>
<div class="contenttk" style="background-color: #F5F5F5;">
    <div class="thongkesp">
        <div class="sp">
            
            <div style="display: flex; justify-content:space-between">
                <p style="color: red;">SẢN PHẨM</p>
                <p style="padding-right: 25px; font-weight:bold; font-size: 20px">
                    <?php
                        foreach($product->show_sum1() as $value){
                            echo $value['tongsl1'];
                        }
                        
                    ?>
                </p>
            </div>
            <i class="fa-solid fa-mobile-screen-button"></i>
            <!-- <i class="fa-solid fa-mobile-screen-button"></i> -->
            <img src="public/images/bar-chart.png">
        </div>
        <div class="sp">
            <div style="display: flex; justify-content:space-between">
                <p style="color: red;">PHỤ KIỆN</p>
                <p style="padding-right: 25px; font-weight:bold; font-size: 20px">
                    <?php
                        foreach($product->show_sum2() as $value){
                            echo $value['tongsl2'];
                        }

                    ?>
                </p>
            </div>
            <i class="fa-solid fa-headphones-simple"></i>
            <!-- <i class="fa-solid fa-mobile-screen-button"></i> -->
            <img src="public/images/bar-chart1.png">
        </div>
        <div class="sp">
            <div style="display: flex; justify-content:space-between">
                <p style="color: red;">TIN TỨC</p>
                <p style="padding-right: 25px; font-weight:bold; font-size: 20px">
                    <?php
                        foreach($product->show_sum3() as $value){
                            echo $value['tongsl3'];
                        }
                    ?>
                </p>
            </div>
            <i class="fa-regular fa-newspaper"></i>
            <!-- <i class="fa-solid fa-mobile-screen-button"></i> -->
            <img src="public/images/growth.png">
        </div>
        <div class="sp">
            <div style="display: flex; justify-content:space-between">
                <p style="color: red;">TỔNG ĐƠN HÀNG</p>
                <p style="padding-right: 25px; font-weight:bold; font-size: 20px">
                    <?php
                        foreach($product->show_donhang() as $value){
                            echo $value['tongsl4'];
                        }
                    ?>
                </p>
            </div>
            <i class="fa-solid fa-truck"></i>
            <!-- <i class="fa-solid fa-mobile-screen-button"></i> -->
            <img src="public/images/pie-chart.png">
        </div>
    </div>

    <div style="margin-left: 20px; margin-top: 30px">
        <h3 style="color: blue">TOP 5 SẢN PHẨM BÁN CHẠY NHẤT</h3>
        <table style="border: none; width: 100%; margin-top: 20px">
            <tr style="border-bottom: 1px solid gray; display: flex;">
                <th style="border: none; padding-left:20px; width: 100px">STT</th>
                <th style="border: none;  width: 400px">Tên sản phẩm</th>
                <th style="border: none; width: 300px">Ảnh</th>
                <th style="border: none; width: 300px">Giá</th>
                <th style="border: none; padding-right: 20px; width: 100px">Số lượng</th>
            </tr>
            
            <?php
                $i=1;
                foreach($product->show() as $value){
                    
                
            ?>
            <tr style="display: flex; height: 100px; line-height:80px">
                <td style="border: none; padding-left:25px;  width: 100px">#<?php echo $i++ ?></td>
                <td style="border: none;  width: 400px"><?php echo $value['product_name'] ?></td>
                <td style="border: none;  width: 300px"><img width="70px" src="../public/uploads/<?php echo $value['product_image']?>"></td>
                
                <td style="border: none; width: 300px"><?php echo $value['product_price'] ?></td>
                <td style="border: none; padding-right: 20px;  width: 100px"><?php echo $value['sl']; ?></td>
              
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>