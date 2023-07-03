<?php
//day la du lieu duoc load len dau tien khi he thong vao file ,tai nguyen dung chung cung se duoc load len o day vi hafm nay se duoc load len toan file 
function construct() {
    load_model('index');
    load('lib','valication');
}
function updateAction(){
    global $username,$password,$error;
    if(isset($_POST['btn-update'])){
        // echo"da ket noi thanh cong";
        //thuc hien thuat toan dat co hieu
        $error = array();//phat co
        //valication username
        if(empty($_POST['display-name'])){
            $error['display-name']="Khong duoc de trong ten hien thi";
        }else{
            if(!(strlen($_POST['display-name'])>=6 && (strlen($_POST['display-name']))<=32)){
                $error['display-name']="do dai tu 6 den 32 ki tu";
            }else{
                if(!is_username($_POST['display-name'])){
                    $error['display-name']="khong dung dinh dang ten hien thi";
                }else{
                    $display_name =$_POST['display-name'];
                }
            }
        }

        //valication phone
        if(empty($_POST['tel'])){
            $error['tel']="khong duoc de trong so dien thoai";
        }else{
            if(!is_phone($_POST['tel'])){
                $error['tel']="khong dung dinh dang so dien thoai";
            }else{
                $tel = $_POST['tel'];
                // echo $tel;
            }
        }

        //valication address
        if(empty($_POST['address'])){
            $error['address']="khong duoc de trong dia chi";
        }else{
            $address = htmlentities($_POST['address']);
            //htmlentities ham dung de bien nhung ngon ngu html thanh van ban thuan chi co chuc nang de doc dung de bao mat trong web ,tan cong xxs
        }
        // show_array($_POST);

        if(empty($error)){
            $data =array(
                'fullname'=>$display_name,
                'phone'=>$tel,
                'address'=>$address
            );
            update_accout(user_login(),$data);
            // echo "cap nhat thanh cong";
        }else{
            $error['account']= "ten dang nhap hoac mat khau khong ton tai ";
        }
    }
    $info_user = get_info_by_usename(user_login());
    $data['info_user'] = $info_user;
    load_view('update',$data);
    
}

function loginAction() {
    //ham time() dung de lay ma thoi gian hay noi cach khac la de  update ma vao ben trong database
    // echo time();
    //ham date() dung de xuat ra ngay thang nam hay tham tri la gio phut tu ma gui  vao database tu ham time()
    // echo date("d/m/Y h:m:s");
    echo date('F jS, Y g:i:s a', mktime(0, 0, 0, 0, 0, 2013));
    global $username ,$password,$error ;
    if(isset($_POST['btn-login'])){
        //thuc hien thuat toan hay dat co hieu
        $error = array();//phat co
        //valication username
        if(empty($_POST['username'])){
            $error['username']="khong duoc de trong username";
        }else{
            if(!(strlen($_POST['username'])>=5 && (strlen($_POST['username']))<=32)){
                $error['username']="do dai tu 5 den 32 ki tu";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username']="khong dung dinh dang username";
                }else{
                    $username =$_POST['username'];
                }
            }
        }
        
        //valication password
        if(empty($_POST['password'])){
            $error['password']="khong duoc de trong  password";
        }else{
            if(!is_password($_POST['password'])){
                $error['password']="khong dung dinh dang password";
            }else{
                $password = md5($_POST['password']);
            }
        }
    
        if(empty($error)){
            if(check($username,$password)){
                $_SESSION['is_login']= true;
                $_SESSION['user_login']= $username;
               redirect_to("?mod=users&controller=team");
            }
        }else{
            $error['account']= "ten dang nhap hoac mat khau khong ton tai  ";
        }
    }

    load_view('log');
}

function ressetpassAction(){
    global $username ,$password,$error ;
    if(isset($_POST['btn-submit'])){
        //thuc hien thuat toan dat co hieu
        $error = array();//phat co
        //valication password old
        if(empty($_POST['pass-old'])){
            $error['pass-old']="truong nay khong duoc de trong ";
        }else{
            if(!is_password($_POST['pass-old'])){
                $error['pass-old']="khong dung dinh dang mat khau";
            }else{
                $pass_old = md5($_POST['pass-old']);
            }
        }


        //valication password new
        if(empty($_POST['pass-new'])){
            $error['pass-new']="vui long nhap mat khau moi";
        }else{
            if(!is_password($_POST['pass-new'])){
                $error['pass-new']="khong dung dinh dang mat khau";
            }else{
                $pass_new = md5($_POST['pass-new']);
            }
        }
        //valication confirm-pass
        if(empty($_POST['confirm-pass'])){
            $error['confirm-pass']="vui long dien vao truong xac nhan mat khau";
        }else{
            if(!is_password($_POST['confirm-pass'])){
                $error['confirm-pass']="khong dung dinh dang mat khau";
            }else{
                $confirm_pass = md5($_POST['confirm-pass']);
            }
        }

        if(empty($error)){
            if(check_pass($pass_old)){
                if($pass_new == $confirm_pass){
                    // echo"ket noi thanh cong";
                    $data=array(
                        'password'=>$pass_new
                    );
                    update_pass_new($data,$pass_old);
                }
                echo "cap nhat thanh cong";
            }else{
                $error['pass-old']="Mat khau chua dung vui long nhap lai";
            }
        }else{
            $error['account']= "Mat khau ban nhap chua dung ";
        }
    }
    load_view('ressetpass');
}

function logoutAction(){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect_to("?mod=users&action=login");
}
