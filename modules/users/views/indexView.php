<?php
// echo $a;
//show_array($list_users);
?>
<?php
get_header();
?>
<div id="wp-content" >
<body>
        <h1>Danh sách thành viên</h1>
        <table>
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Năm sinh</td>
                    <td>username</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($list_users)) {
                    $t = 0;
                    foreach ($list_users as $user) {
                        $t ++;
                        ?>
                        <tr>
                            <td><?php echo $t; ?></td>
                            <td><?php echo $user['fullname'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['birth'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </body>
</div>
<?php
get_footer();
?>
<!-- hiển thị thông tin cho người dùng xem -->
