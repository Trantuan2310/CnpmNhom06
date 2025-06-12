<?php
  require('inc/essentials.php');
  require('inc/db_config.php');
  adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Người Dùng</title>
  <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Tài Khoản Khách Hàng</h3>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="text-end mb-4">
              <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Nhập để tìm kiếm...">
            </div>

            <div class="table-responsive">
              <table class="table table-hover border text-center" style="min-width: 1300px;">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Họ và Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Ngày Đăng Ký</th>
                  </tr>
                </thead>
                <tbody id="users-data">                 
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>


  <?php require('inc/scripts.php'); ?>

  <script>
    function get_users()
    {
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/users.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
      xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;
      }
    
      xhr.send('get_users');
    }
    
    
    function toggle_status(id,val)
    {
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/users.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
      xhr.onload = function(){
        if(this.responseText==1){
          alert('success','Đã bật trạng thái!');
          get_users();
        }
        else{
          alert('success','Máy chủ ngừng hoạt động!');
        }
      }
    
      xhr.send('toggle_status='+id+'&value='+val);
    }
    
    function search_user(username){
      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/users.php",true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
      xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;
      }
    
      xhr.send('search_user&name='+username);
    }
    
    window.onload = function(){
      get_users();
    }
  </script>

</body>
</html>