

<div class="content">
    <p class="content-title" style="color: red; text-align:center">Sửa tin tức</p>
    <?php
        if($get_news)
        while($result = $get_news->fetch_assoc()){
    ?>
    <form action="" method="POST" enctype="multipart/form-data" style="margin-left: 200px" > 
            <label for=""> Tiêu đề</label><br>
            <input required type="text" name="news_name" placeholder="Tiêu đề" value="<?php echo substr($result['news_name'],0,38),'...' ?>"> <br>
        
            <label for="">Ảnh</label><br>
            <img src="../public/uploads/<?php  echo $result['news_image'] ?>" width="120px">
            <input class="input-file" type="file" name="news_image" style="margin-top:80px; margin-left:30px;">
            
             <br>
             <br><br>
            <label for="">Nội dung</label><br>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
            <br> <br>

            <input class="btn" type="submit" value="Sửa" name="suatintuc">
            <input class="btn" type="reset" value="Nhập lại">


        
    </form>
    <?php
                }
                ?>

</div>


