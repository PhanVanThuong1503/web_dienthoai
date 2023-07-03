// function signup(){
//     event.preventDefault();
//     var username = document.getElementById("username").value;
//     var email = document.getElementById("email").value;
//     var password = document.getElementById("password").value;
//     var user = {
//         username : username,
//         email : email,
//         password : password,
//     }
//     var json = JSON.stringify(user);
//     localStorage.setItem(username, json);
//     alert("Đăng ký thành công");
//     window.location.href="login.php"
// }

// function login(){
//     event.preventDefault();
//     var username = document.getElementById("username").value;
//     var email = document.getElementById("email").value;
//     var password = document.getElementById("password").value;
//     var user = localStorage.getItem(username);
//     var data = JSON.parse(user);
//     if(user == null){
//         alert("Email hoặc password không chính xác");
//         window.location.href="login.php"
//     }
//     else if(username == data.username && email == data.email && password == data.password){
//         window.location.href="index.php"
//     }
    
// }