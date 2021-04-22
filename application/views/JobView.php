
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png');?>">
  <link rel="icon" type="image/png" href="<?=  base_url('assets/img/favicon.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Todolist Web by SGU
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="<?= base_url('assets/css/material-dashboard.css?v=2.1.2');?>" rel="stylesheet" />
  <link href="<?= base_url('assets/demo/demo.css');?>" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-latest.js"></script>
  <style type="text/css">
    #contentTxt {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
  </style>
</head>
<?php
include (APPPATH."views/header.php");
?>
<body class="">
  <div class="wrapper">
          <!-- Navbar -->
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Tổng công việc</p>
                  <h3 class="card-title"><?= $sumOfJob?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">date_range</i>
                    <div>Số công việc đã được tạo</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Tổng nhân viên</p>
                  <h3 class="card-title"><?= $sumOfNv?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">date_range</i>Số nhân viên trong công ty
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Tổng công việc chưa hoàn thành</p>
                  <h3 class="card-title"><?=$sumOfJobLate?>/<?=$sumOfJob?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">update</i> Toàn bộ công việc
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">done</i>
                  </div>
                  <p class="card-category">Tổng công việc đã hoàn thành</p>
                  <h3 class="card-title"><?= $sumOfJobDone?>/<?= $sumOfJob?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">update</i> Toàn bộ công việc
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- public -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Public Tasks</h4>
                  <p class="card-category">Task for all Users</p>
                  <div class="btn btn-round btn-fill btn-info" 
                  style="height: 38px;
                        float: right;
                        margin-left: 1%;" id = "newTaskbtnPublic">
                      Thêm thẻ mới</div>
                  <input type="text" class="form-control" 
                  style="width: 200px;
                          float: right;
                          color: white;"
                  placeholder="Nhập tên thẻ" id = "newTasktxtPublic">
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile testchoi" style="overflow-y:scroll; height: 280px;">
                      <table class="table">
                        <tbody>
                          <!-- o day -->
                          <?php
                            foreach ($jobList as $row)
                            {
                            if($row['job_type'] == 1)  
                            {     
                            ?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input cbTaskPublic" type="checkbox" value="" anlong="<?= $row['job_id'] ?>" 
                                  <?php 
                                    if($row['job_status'] == 0)
                                    {
                                      echo "unchecked";
                                    } else {
                                      echo "checked";
                                    }
                                  ?> >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td class="endDateformatPublic">
                              <?php 
                                $controller::formatEnddate($row['job_enddate'],$row['job_status']);
                                ?>
                            </td>

                            <td>
                              <?= $row['job_name'] ?>
                            </td>

                            <td>
                              <?= $row['nv_firstname'].' '.$row['nv_lastname']?>
                            </td>

                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm editBtnPublic" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm deleteBtnPublic" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          
                          <?php }} ?>   
                          <!--ket thuc day  -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- private -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Private Tasks</h4>
                  <p class="card-category">Only You and Admin can see</p>
                  <div class="btn btn-round btn-fill btn-info" 
                  style="height: 38px;
                        float: right;
                        margin-left: 1%;" id = "newTaskbtnPrivate">
                      Thêm thẻ mới</div>
                  <input type="text" class="form-control" 
                  style="width: 200px;
                          float: right;
                          color: white;"
                  placeholder="Nhập tên thẻ" id = "newTasktxtPrivate">
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile testchoi" style="overflow-y:scroll; height: 280px;">
                      <table class="table">
                        <tbody>
                          <!-- o day -->
                          <?php
                            foreach ($jobList as $row)
                            {
                            if($row['job_type'] == 0)
                            {
                              if($this->session->userdata('username') == "admin@gmail.com")
                              {    
                            ?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input cbTaskPrivate" type="checkbox" value="" anlong="<?= $row['job_id'] ?>" 
                                  <?php 
                                    if($row['job_status'] == 0)
                                    {
                                      echo "unchecked";
                                    } else {
                                      echo "checked";
                                    }
                                  ?> >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td class="endDateformatPublic">
                              <?php 
                                $controller::formatEnddate($row['job_enddate'],$row['job_status']);
                                ?>
                            </td>

                            <td>
                              <?= $row['job_name'] ?>
                            </td>

                            <td>
                              <?= $row['nv_firstname'].' '.$row['nv_lastname']?>
                            </td>

                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm editBtnPrivate" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm deleteBtnPrivate" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          
                          <?php }
                              else 
                              {
                                if($row['username'] == $this->session->userdata('nv_email'))
                                {?>
                                  <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input cbTaskPrivate" type="checkbox" value="" anlong="<?= $row['job_id'] ?>" 
                                  <?php 
                                    if($row['job_status'] == 0)
                                    {
                                      echo "unchecked";
                                    } else {
                                      echo "checked";
                                    }
                                  ?> >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td class="endDateformatPublic">
                              <?php 
                                $controller::formatEnddate($row['job_enddate'],$row['job_status']);
                                ?>
                            </td>

                            <td>
                              <?= $row['job_name'] ?>
                            </td>

                            <td>
                              <?= $row['nv_firstname'].' '.$row['nv_lastname']?>
                            </td>

                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm editBtnPrivate" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm deleteBtnPrivate" anlong="<?= $row['job_id'] ?>">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                               <?php }
                              } 
                        }}?>   
                          <!--ket thuc day  -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>

<!-- Modal Edit -->
<div class="modal fade editModalPublic" role="dialog" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog modal-dialog modal-lg" >
        <div class="modal-content">
        
            <div class="modal-header">
              <img src="<?= base_url('assets/img/icons8-task-completed-20.png')?>" style="">
                <input class="nameTxt" type="text" style="border: none; font-size: 30px; width: 800px;" value="" id="nameTxt" anlong = "">
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-8">

                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group" style="margin-top: 11px;">
                          <label class="bmd-label-floating"></label>
                          <button type="button" rel="tooltip" title="Remove StartDate" class="btn btn-danger btn-link btn-sm" id="resetStartdate" style="">
                          <i class="material-icons">close</i>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: black;font-weight: bold;">Start Date</label>
                          <input type="date" class="form-control" id="startdateTxt" style="">
                          
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group" style="margin-top: 11px;">
                          <label class="bmd-label-floating"></label>
                          <button type="button" rel="tooltip" title="Remove EndDate" class="btn btn-danger btn-link btn-sm" id="resetEnddate" style="">
                          <i class="material-icons">close</i>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="color: black;font-weight: bold;">End Date</label>
                          <input type="date" class="form-control" id="enddateTxt">
                        </div>
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" style="margin-top: -10px;">
                        <input class="" id="dateError" style="color: red; width: 100%; border: none;" readonly>
                        </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <img src="<?= base_url('assets/img/icons8-edit-property-20.png')?>" style="">
                          <label style="color: black;font-weight: bold;">Description</label>
                          <div class="form-group">
                            <textarea id="contentTxt" class="contentTxt" rows="4" style=""></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" style="margin-top: -10px;">
                          <img src="<?= base_url('assets/img/icons8-upload-file-10.png')?>" style="">
                          <label style="color: black;font-weight: bold;">Files</label>
                          <input type="file" name="" id="fileInput">
                          <button id="chooseFileBtn">Choose</button>
                          <button id="saveFileBtn">Save</button>
                          <p id="fileErr" style="color:red; font-weight: bold;"></p>
                          <div class="form-group">
                            <!-- file area -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <!-- <div class="card">                            
                            <div class="card-body"> -->
                            <!-- <div class="tab-content"> -->
                            <div class="tab-pane active" id="profile" >
                            <table class="table table-borderless">
                              <!-- khu vuc file -->
                            <tbody style="height: 100px;" class="fileArea">
                            
                              <!-- end -->
                            </tbody>
                            </table>
                            </div>
                            <!-- </div> -->
                            <!-- </div>
                          </div> -->
                        </div>
                      </div>
                    </div> 
<!-- end of file area -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: -30px;">
                      <div class="col-md-12">

                        <div class="form-group">                          
                          <img src="<?= base_url('assets/img/icons8-table-of-content-20.png')?>" style="">
                          <label style="color: black;font-weight: bold;">Comments</label>
                        </div>
                        <div class="form-group" style="margin-top: -30px; ">
                          <div class="card">
                            <div class="card-header" >
                            <input type="text" class="form-control" 
                              style="width: 350px;
                              float: left;
                              color: black;"
                              placeholder="Write comment here..." id = "commentTxt" value="">
                            <div class="btn btn-round btn-fill btn-info" 
                              style="height: 35px;
                              float: left;
                              margin-left: 1%;" id = "commentBtn">
                                  Send</div>
                            </div>
                          </div>
                        </div>

                          <div class="form-group" style="margin-top: -65px;">
                            <div class="card">
                            <div class="card-header" >
                            <div class="card-body">
                            <div class="tab-content">
                            <div class="tab-pane active" id="profile" >
                            <table class="table table-borderless">
                              <!-- khu vuc comment -->
                            <tbody style="height: 100px;" class="commentArea">
                              
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                          </div>
                        </div>
                          </div>

                        </div>

                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <img src="<?= base_url('assets/img/icons8-add-user-group-man-man-20.png')?>" style="">
                      <label class="bmd-label-floating" style="color: black;font-weight: bold;">Partners</label>
                      <div class="btn btn-primary btn-block" style="height: 40px;width: 90px;text-align: left;" id="thanhvienBtn">More</div>  

                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <!-- <div class="card">                            
                            <div class="card-body"> -->
                            <!-- <div class="tab-content"> -->
                            <div class="tab-pane active" id="profile" >
                            <table class="table table-borderless">
                              <!-- khu vuc partner -->
                            <tbody class="partnerArea">
                            
                              <!-- end -->
                            </tbody>
                            </table>
                            </div>
                            <!-- </div> -->
                            <!-- </div>
                          </div> -->
                        </div>
                      </div>
                    </div> 

                    </div>
                  </div>

                </div>
            </div>
            
            
        </div>
    </div>
</div>
<!-- End of Modal edit -->
<!-- edit modal -->
                            <div class="modal fade editCmtModal" id="editCmtModal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
        
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Comment</h5>
                            </div>
            
                            <div class="modal-body">
                              <label style="color: black;font-weight: bold;">New Comment</label>
                              <input type="text" id="contentEditModal" style="width: 100%;">
                            </div>
            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary closeEditCmtModal"  >Close</button>
                              <button type="button" class="btn btn-primary saveEditCmtModal" anlong="">Save</button>
                              </div>
            
                            </div>
                            </div>
                            </div>
                              <!-- end -->
    <!-- add partner modal -->
                            <div class="modal fade partnerModal" id="partnerModal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
        
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Comment</h5>
                            </div>
            
                            <div class="modal-body">
                              <!-- partner body modal -->
                                                    <!-- <div class="col-lg-6 col-md-12"> -->
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Employees List</h4>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody class="partnerModalBody">
                          <!-- o day private -->
                           
                           <!-- ket huc private -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <!-- </div>   -->
                              <!-- end body -->
                            </div>
            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary closePartnerModal">Close</button>
                              </div>
            
                            </div>
                            </div>
                            </div>
                              <!-- end -->
  <?php include (APPPATH.'controllers/AjaxController.php') ?>
</body>

</html>