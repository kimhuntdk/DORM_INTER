<?php

if(@$_COOKIE['level'] == ''){
    header("location: backend-login");
}

$q = $this->db->where('m_code',$_COOKIE['m_code'])
              ->get('tbl_manager');
$r = $q->result();

if($r[0]->m_profile == ""){
    $profile = "no_pic.png";
}else{
    $profile = $r[0]->m_profile;
}

if($_COOKIE['level'] == '0'){

    $q = $this->db->where('tbl_register_dorm.re_status','0')
                  ->group_by('tbl_register_dorm.re_time')
                  ->join('tbl_dorm','tbl_dorm.d_id=tbl_register_dorm.d_id')
                  ->get('tbl_register_dorm');

    $row_reg_dorm = $q->num_rows();

}else if($_COOKIE['level'] == '1'){

    $nu = $this->db->where('m_code',$_COOKIE['m_code'])
                   ->get('tbl_onus');

    $sum_row = 0;
    $total_sum_row = 0;

    foreach ($nu->result() as $key => $value) {
        $d_id = $value->d_id;

        $q = $this->db->where('tbl_register_dorm.re_status','0')
                      ->where('tbl_register_dorm.d_id',$d_id)
                      ->group_by('tbl_register_dorm.re_time')
                      ->join('tbl_dorm','tbl_dorm.d_id=tbl_register_dorm.d_id')
                      ->get('tbl_register_dorm');
        $q2 = $q->num_rows();
        $sum_row = $q2;
        $total_sum_row = $total_sum_row+$sum_row;

    }

    $row_reg_dorm = $total_sum_row;
}

$this->load->view('template/provider');

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Manager : <?=$_COOKIE['m_code']?>
    </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<style type="text/css">
    body{
        background-color:#2F4F4F;
    }
</style>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                            <span>
                            <img alt="image" class="img-circle" src="images-manager/<?=$profile?>" width="48" height="48" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                <?=$r[0]->m_fullname?>
                            </strong>
                             </span> <span class="text-muted text-xs block">
                             <?=level_manager($_COOKIE['level'])?>
                              <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile">แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href="reset-password">เปลี่ยนรหัสผ่าน</a></li>
                            <li class="divider"></li>
                            <li><a href="check_logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li class="<?php if($this->uri->segment(1) == 'admin-list-student'){echo "active";} ?>">
                    <a href="admin-list-student"><i class="fa fa-th"></i> <span class="nav-label">รายชื่อจองหอพัก</span>
                    <?php if($row_reg_dorm != 0){ ?>
                        <span class="label label-warning pull-right">
                            <?=$row_reg_dorm?>
                        </span>
                    <?php } ?>
                    </a>
                </li>

                <?php
                if(@$_COOKIE['level'] == 0){
                ?>

                <li class="<?php if($this->uri->segment(1) == 'admin-list-dorm'){echo "active";} ?>">
                    <a href="#"><i class="fa fa-database"></i> <span class="nav-label">ข้อมูลหอพัก</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                        <a href="admin-list-dorm">
                            จัดการหอพัก
                        </a></li>
                    </ul>
                </li>

                <?php }else{ ?>

                <li class="<?php if($this->uri->segment(1) == 'admin-list-dorm'){echo "active";} ?>">
                    <a href="admin-list-dorm"><i class="fa fa-database"></i> <span class="nav-label">หอพักที่รับผิดชอบ</span></a>  
                </li>

                <?php } ?>


                <?php
                if(@$_COOKIE['level'] == 0){
                ?>
                <li class="<?php if($this->uri->segment(1) == 'admin-list-employee'){echo "active";} ?>">
                    <a href="admin-list-employee"><i class="fa fa-list"></i> <span class="nav-label">
                        เจ้าหน้าที่ (ภาระหน้าที่)
                    </span></a>
                </li>
                <?php } ?>

                <li class="<?php if($this->uri->segment(1) == 'admin-report-register'){echo "active";} ?>">
                    <a href="admin-report-register"><i class="fa fa-th"></i> <span class="nav-label">
                        Report register
                    </span></a>
                </li>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#fff">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">
                        ยินดีต้อนรับ
                        <?=$r[0]->m_fullname?>
                        (<?=@$_COOKIE['m_code']?>)
                    </span>
                </li>

                <?php if(@$_COOKIE['level'] == 0){ ?>

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-gear"></i>  <span class="label label-warning">ตั้งค่า</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="setting">
                                <div>
                                    <i class="fa fa-cogs fa-fw"></i> ตั้งค่าระบบ
                                    <span class="pull-right text-muted small">Setting</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="list-news">
                                <div>
                                    <i class="fa fa-th fa-fw"></i> ข่าวประชาสัมพันธ์
                                    <span class="pull-right text-muted small">News</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="data-genaral">
                                <div>
                                    <i class="fa fa-list fa-fw"></i> ข้อมูลทั่วไป
                                    <span class="pull-right text-muted small">Data</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="file-manager">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> ไฟล์ระบบ
                                    <span class="pull-right text-muted small">System File</span>
                                </div>
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <?php } ?>


                <li>
                    <a href="check_logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            
