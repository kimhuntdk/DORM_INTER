<?php
$q = $this->db->where('me_id','1')->get('tbl_menu_user');
$result = $q->result();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ระบบสมัครเข้าหอพักนิสิต | มหาวิทยาลัยมหาสารคาม Mahasarakham University</title>

    <meta property="og:image" content="https://dorm.msu.ac.th/MSU_DORM/file-system/1705641.png">

    <meta name="description" content="งานบริการหอพักนิสิต กองอาคารสถานที่ มหาวิทยาลัยมหาสารคาม เปิดรับสมัครหอพัก  นิสิตใหม่และนิสิตปัจจุบัน สามารถสมัครผ่านระบบได้ที่
https://dorm.msu.ac.th,ระบบสมัครหอพักนิสิต,ระบบจองหอพักนิสิต,ระบบหอพักนิสิต,สมัครหอพัก,หอในมมส,หอในมอเก่า,หอในมอใหม่,หอพักนิสิต,หอพักนักศึกษา,หอพักมมส,ระบบหอพักนักศึกษา, มหาวิทยาลัยมหาสารคาม, dorm, MSU, msu, Mahasarakham University">

    <meta name="keyword" content="ระบบสมัครหอพักนิสิต MSU Mahasarakham University">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">


    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />


    <link rel="shortcut icon" href="images/favicon.ico">

</head>

<body id="body">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="<?php if($this->uri->segment(1) == 'welcome'){echo "active";} ?>">
                    <a href="welcome"><i class="fa fa-home"></i> <span class="nav-label">
                        <?=$result[0]->home?>
                    </span></a>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'register'){echo "active";} ?>">
                    <a href="register"><i class="fa fa-plus"></i> <span class="nav-label">
                        <?=$result[0]->register?>
                    </span></a>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'check-dorm'){echo "active";} ?>">
                    <a href="check-dorm"><i class="fa fa-check"></i> <span class="nav-label">
                        <?=$result[0]->check_dorm?>
                    </span></a>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'help-register'){echo "active";} ?>">
                    <a href="help-register"><i class="fa fa-diamond"></i> <span class="nav-label">
                        <?=$result[0]->help_regis?>
                    </span></a>
                </li>

                <li class="<?php if($this->uri->segment(1) == 'help-print'){echo "active";} ?>">
                    <a href="help-print"><i class="fa fa-list"></i> <span class="nav-label">
                        <?=$result[0]->help_print?>
                    </span></a>
                </li>

                <li class="<?php if($this->uri->segment(1) == 'help-lop'){echo "active";} ?>">
                    <a href="help-lop"><i class="fa fa-list"></i> <span class="nav-label">
                        <?=$result[0]->help_lop?>
                    </span></a>
                </li>
          
                <li class="<?php if($this->uri->segment(1) == 'about'){echo "active";} ?>">
                    <a href="about"><i class="fa fa-pie-chart"></i> <span class="nav-label">
                        <?=$result[0]->about?>
                    </span>  </a>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'contact'){echo "active";} ?>">
                    <a href="contact"><i class="fa fa-flask"></i> <span class="nav-label">
                        <?=$result[0]->contact?>
                    </span></a>
                </li>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form action="search" role="search" method="get" class="navbar-form-custom">
                <div class="form-group">
                    <input name="q" type="text" placeholder="ค้นหาด้วย รหัสนิสิต, ชื่อ-สกุล" required class="form-control" name="top-search" id="top-search" value="<?php if(@$_GET['q'] != ''){echo @$_GET['q'];} ?>">
                </div>
            </form>
            
        </div>
           

        </nav>
        </div>