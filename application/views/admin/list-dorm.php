<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข้อมูลหอพัก </h2>
        <ol class="breadcrumb">
            <li>
                <a href="admin-welcome">Home</a>
            </li>
            <li class="active">
                <strong>หน้าหลัก</strong>
            </li>
        </ol>
    </div>
</div>

<?php if(@$_COOKIE['level'] == 0){//สำหรับ admin ?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">
                <div style="margin:15px;">
                <h2 style="margin-bottom:15px;">
                    หอพักเขตพื้นที่ในเมือง (มอเก่า) (<?=$row_dorm1?>)
                <!-- 
                <span style="float:right">
                    <a href="#" class="btn btn-success">
                        เพิ่มหอพักใหม่
                    </a>
                </span>
                -->
                </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="admin-welcome">
                            <img src="images/male.jpg" width="30" height="30">
                            หอพักชาย
                        </a>
                    </li>
                </ol>
                </div>
                <?php
                foreach ($result_male1 as $key => $val) {
                    $d_id = base64_encode($val->d_id);
                    $uri = "admin-class-dorm?d_id=".$d_id;

                    $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs1 = $q->result();
                    $number_bed = $qs1[0]->c_bed;
                    
                    $q2 = $this->db->where('d_id',$val->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;
                    


                ?>
                <a href="<?=$uri?>">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <h5 class="m-b-md">
                            <?=$val->d_name?>
                        </h5>
                        <h2 style="color:#660000">
                        <i class="fa fa-home fa-2x"></i>
                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>
                        <div class="m-t-sm">
                            <a href="admin-edit-dorm?d_id=<?=$d_id?>" class="text-muted"><i class="fa fa-edit"></i> แก้ไข</a>

                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

                
            </div>

            <div class="row">
                <div style="margin:15px;">
                
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <img src="images/female.jpg" width="30" height="30">
                            หอพักหญิง
                        </a>
                    </li>
                </ol>
                </div>

                <?php
                foreach ($result_female1 as $key => $val) {
                    $d_id = base64_encode($val->d_id);
                    $uri = "admin-class-dorm?d_id=".$d_id;

                    $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs2 = $q->result();
                    $number_bed = $qs2[0]->c_bed;

                    $q2 = $this->db->where('d_id',$val->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;
                ?>
                <a href="<?=$uri?>">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <h5 class="m-b-md">
                            <?=$val->d_name?>
                        </h5>
                        <h2 style="color:#660000">
                        <i class="fa fa-home fa-2x"></i>
                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>
                        <div class="m-t-sm">
                            <a href="admin-edit-dorm?d_id=<?=$d_id?>" class="text-muted"><i class="fa fa-edit"></i> แก้ไข</a>
                            
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>
            </div>

            <div class="row">
                <div style="margin:15px;">
                <h2>หอพักเขตพื้นที่ขามเรียง (มอใหม่) (<?=$row_dorm2?>) </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="admin-welcome">
                            <img src="images/male.jpg" width="30" height="30">
                            หอพักชาย
                        </a>
                    </li>
                </ol>
                </div>

                <?php
                foreach ($result_male2 as $key => $val) {
                    $d_id = base64_encode($val->d_id);
                    $uri = "admin-class-dorm?d_id=".$d_id;

                    $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs3 = $q->result();
                    $number_bed = $qs3[0]->c_bed;

                    $q2 = $this->db->where('d_id',$val->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;
                ?>
                <a href="<?=$uri?>">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <h5 class="m-b-md">
                            <?=$val->d_name?>
                        </h5>
                        <h2 style="color:#660000">
                        <i class="fa fa-home fa-2x"></i>
                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>
                        <div class="m-t-sm">
                            <a href="admin-edit-dorm?d_id=<?=$d_id?>" class="text-muted"><i class="fa fa-edit"></i> แก้ไข</a>
                           
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

                <div style="margin:15px;">
                <br><br><br><br><br><br><br><br>
                <br><br><br><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <img src="images/female.jpg" width="30" height="30">
                            หอพักหญิง
                        </a>
                    </li>
                </ol>
                </div>

                <?php
                foreach ($result_female2 as $key => $val) {
                    $d_id = base64_encode($val->d_id);
                    $uri = "admin-class-dorm?d_id=".$d_id;

                    $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs4 = $q->result();
                    $number_bed = $qs4[0]->c_bed;

                    $q2 = $this->db->where('d_id',$val->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;
                ?>
                <a href="<?=$uri?>">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <h5 class="m-b-md">
                            <?=$val->d_name?>
                        </h5>
                        <h2 style="color:#660000">
                        <i class="fa fa-home fa-2x"></i>
                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>
                        <div class="m-t-sm">
                            <a href="admin-edit-dorm?d_id=<?=$d_id?>" class="text-muted"><i class="fa fa-edit"></i> แก้ไข</a>
                           
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php }else{ // สำหรับพนักงาน ?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <?php
                foreach ($rs as $key => $val) {
                    $q = $this->employee_model
                              ->get_onus_byID(
                                $_COOKIE['m_code'],
                                $val->d_id
                                );
                    $d_id = "";
                    foreach ($q->result() as $k => $value) {
                        $d_id = $value->d_id;

                        $uri = "admin-class-dorm?d_id=".base64_encode($d_id);

                        $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                        $qs5 = $q->result();
                        $number_bed = $qs5[0]->c_bed;

                        $q2 = $this->db->where('d_id',$val->d_id)
                                       //->where('re_status',1)
                                       ->get('tbl_register_dorm');
                        $row2_ = $q2->num_rows();

                        $remain = $number_bed - $row2_;

                       // echo $number_bed;


                    }
                ?>

                <?php if($d_id == $val->d_id){ ?>

                <a href="<?=$uri?>">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <h5 class="m-b-md">
                            <?=$val->d_name?>
                        </h5>
                        <h2 style="color:#660000">
                        <i class="fa fa-home fa-2x"></i>
                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>

                        <div class="m-t-sm">
                            <a href="admin-edit-dorm?d_id=<?=base64_encode($d_id)?>" class="text-muted"><i class="fa fa-edit"></i> แก้ไข</a>

                        </div>
                        
                        </div>
                    </div>
                </div>
                </a>

                <?php } ?>

                <?php } ?>

            </div>
        </div>
    </div>
</div>


<?php } ?>


<?php $this->load->view('template/admin/lib-footer'); ?>

