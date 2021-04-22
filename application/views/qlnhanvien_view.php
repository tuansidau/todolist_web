<?php
include (APPPATH."views/header.php");
?>
<!doctype html>
<html lang="en">
  <head>
   <title>Table 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <link rel="stylesheet" href="<?php echo base_url('assets/table/css/style.css'); ?>">

   <script src="<?php echo base_url('assets/table/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/table/js/popper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/table/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/table/js/main.js'); ?>"></script>

  <script type="text/javascript">
   $(document).ready(function(){  
     $('.sua').click(function(event) {
         $.post("<?php echo base_url('index.php/qlnhanvien/getNv'); ?>",{id:$(this).attr("id")},function(data){
            $('#ho').val(data.nv_firstname);
            $('#ten').val(data.nv_lastname);  
            $('#namsinh').val(data.nv_birthday);  
            $('#sdt').val(data.nv_phone);  
            $('#diachi').val(data.nv_address);  
            $('#email').val(data.nv_email);  
            $('#gioitinh').val(data.nv_gender);    
            $('#nvid').val(data.nv_id); 
         },"json");
         $('#suanv').modal('show');
     });
  });
  </script>>

<style>
  .popover
  {
      width: 100%;
      max-width: 800px;
     height: 800px;
  }
    .popover.fade.bottom.in
  {
    top:99px;
    left: 657px;
    /*display: block;*/
    max-width: 800px;
  } 
  .arrow
  {
    left: 77%;
  }
  </style>
  
   </head>
   <body>
   <section class="ftco-section">
      <div class="container">
                 
         <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
               <h3 class="heading-section">Danh sách nhân viên</h3>
            </div>
         </div>
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#themnv">Thêm nhân viên</a>
          <form action="search" method="post">
              <input type="type" name="search">            
              <button type="submit" class="btn btn-success justify-content-centered">Tìm kiếm</button>
          </form>
         <div class="row">
            <div class="col-md-12">
               <div class="table-wrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($listNV as $row) {
                        if($row['nv_email'] != 'admin'){
                          echo "<tr>";
                          echo '<th scope="row">'.$row['nv_firstname']."</th>";
                          echo "<td>".$row['nv_lastname']."</td>"; 
                          echo "<td>".$row['nv_gender']."</td>";
                          echo "<td>".$row['nv_birthday']."</td>";
                          echo "<td>".$row['nv_phone']."</td>";
                          echo "<td>".$row['nv_email']."</td>";
                          echo "<td>".$row['nv_address']."</td>";
                          echo '<td><a class="btn btn-warning sua" id="'.$row["nv_id"].'">Sửa</a></td>';
                          echo '<td><a class="btn btn-danger" id="xoa" href="xoaNv/'.$row["nv_id"].'">Xóa</a></td>';
                          echo '<input type="hidden" name="nv_id" id="nv_id" />' ;
                          echo "<tr>";
                        }
                      }
                    ?>
                    </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>

<div class="modal fade" id="themnv">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content d-flex justify-content-center h-100">
      <div class="modal-header d-flex justify-content-center">
        <h3 class="modal-title text-center text-primary" id="signuplbl w-100">Thêm nhân viên</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div> 
      <div class="modal-body d-flex justify-content-center" style="line-height: 50px;">
        <form action="themNv" method="POST">
         <div class="form-group">
           <label for="fname">Họ</label>
            <input type="text" class="form-control" name="nv_firstname" required="">
         </div>
         <div class="form-group">  
            <label for="lname">Tên</label>
            <input type="text" class="form-control" name="nv_lastname" required="">
         </div>
         <div class="form-group">    
            <label for="dob">Ngày sinh</label>
            <input type="date" class="form-control" name="nv_birthday" required="">
          </div>
         <div class="form-group">  
           <label>Số điện thoại</label>
            <input type="text" class="form-control" name="nv_phone" required="" pattern ="[0-9]{10}">
          </div>
         <div class="form-group">  
            <label>Email</label>
            <input type="text" class="form-control" name="nv_email" required="">
         </div>
         <div class="form-group">  
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="nv_address" required="">
         </div>
          <div class="form-group">  
            <label>Giới tính</label>
            <select class="form-control" name="nv_gender" >
               <option value="Nữ">Nữ</option>
               <option value="Nam">Nam</option>
            </select>
         </div>
         <div class="d-flex justify-content-center mt-3 login_container form-group">
            <button type="submit" class="btn btn-success justify-content-centered">Thêm nhân viên</button>
         </div>
        </form>   
      </div>
      </div>
    </div>  
</div>

<div class="modal fade" id="suanv">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content d-flex justify-content-center h-100">
      <div class="modal-header d-flex justify-content-center">
        <h3 class="modal-title text-center text-primary" id="signuplbl w-100">Sửa nhân viên</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> 
      <div class="modal-body d-flex justify-content-center" style="line-height: 50px;">
        <form action="suaNv" method="POST">
          <div class="form-group">
             <input type="text" name="nv_id" id="nvid" hidden />
           <label for="fname">Họ</label>
            <input type="text" class="form-control" name="nv_firstname" id="ho" required="">
         <div class="form-group">  
            <label for="lname">Tên</label>
            <input type="text" class="form-control" name="nv_lastname"  id="ten" required="">
         <div class="form-group">    
            <label for="dob">Ngày sinh</label>
            <input type="date" class="form-control" name="nv_birthday" id="namsinh" required="">
          </div>
         <div class="form-group">  
           <label>Số điện thoại</label>
            <input type="text" class="form-control" name="nv_phone" id="sdt" required="" pattern ="[0-9]{10}">
          </div>
         <div class="form-group">  
            <label>Email</label>
            <input type="text" class="form-control" name="nv_email" id="email" required="">
         </div>
         <div class="form-group">  
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="nv_address"  id="diachi" required="">
         </div>
          <div class="form-group">  
            <label>Giới tính</label>
            <select class="form-control" name="nv_gender" id="gioitinh">
               <option value="Nữ">Nữ</option>
               <option value="Nam">Nam</option>
            </select>
         </div>
          <div class="d-flex justify-content-center mt-3 login_container form-group">
            <button type="submit" class="btn btn-success justify-content-centered">Sửa thông tin</button>
            </div>
        </form>   
      </div>
    </div>  
  </div>
</div>

     
   </body>
</html>

