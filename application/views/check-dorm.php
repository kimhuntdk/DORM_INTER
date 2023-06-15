<?php $this->load->view('template/user/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข้อมูลหอพักทั้งหมด </h2>
        <ol class="breadcrumb">
            <li>
                <a href="welcome">Home</a>
            </li>
            <li class="active">
                <strong>หน้าหลัก</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row" style="margin-top: 12px; margin-left: 12px; margin-right: 12px;">
            

            <div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-search"></i>
                        ตรวจสอบหอพักนิสิต
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="input-group">
                        <input name="keyword" id="keyword" type="text" class="form-control" placeholder="ค้นหาด้วยชื่อหอพัก หรือประเภทห้อง"> 

                        <span class="input-group-btn"> 
                            <a href="" onclick="return search_dorm()" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                                ค้นหา
                            </a> 
                        </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div id="result-search">

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">
                <div style="margin:15px;">
                <h2 style="margin-bottom:15px;">
                    หอพักเขตพื้นที่ในเมือง (<?=$row_dorm1?>)
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
                        <a href="javascript:void(0)">
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
                <a href="#" onclick="return check_list_dorm('<?=$val->d_id?>')">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <span id="loading_<?=$val->d_id?>"></span>
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
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

                <div style="margin:15px;">
                <br><br><br><br><br><br><br><br>
                <br><br><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="javascript:void(0)">
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
                <a href="#" onclick="return check_list_dorm('<?=$val->d_id?>')">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <span id="loading_<?=$val->d_id?>"></span>
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
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>
            </div>

            <div class="row">
                <div style="margin:15px;">
                <h2>หอพักเขตพื้นที่ขามเรียง (<?=$row_dorm2?>) </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="javascript:void(0)">
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
                <a href="#" onclick="return check_list_dorm('<?=$val->d_id?>')">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <span id="loading_<?=$val->d_id?>"></span>
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
                        <a href="javascript:void(0)">
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
                <a href="#" onclick="return check_list_dorm('<?=$val->d_id?>')">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <span id="loading_<?=$val->d_id?>"></span>
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
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
</div>

<span id="result-data"></span>


<?php $this->load->view('template/user/lib-footer'); ?>

<script type="text/javascript">
    $("#keyword").keyup(function(e){

        if(e.keyCode == 13){
            search_dorm();
            return false;
        }

        return false;

    });
    function search_dorm(){
        var keyword = $("#keyword").val();
        $.ajax({
            url: 'index.php/ajax/search_dorm',
            data: {keyword:keyword},
            type: 'POST',
            beforeSend: function(){
                $("#result-search").html("<div class='sk-spinner sk-spinner-three-bounce' style='margin-top:50px;margin-bottom: 50px;'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");
            },
            success: function(data){
                $("#result-search").html(data);
            }
        });
        return false;

    }

    function check_list_dorm(d_id){
        $("#loading_"+d_id).show();
        $.ajax({
            url: 'index.php/welcome/modal_check_list_dorm',
            data: {d_id:d_id},
            type: 'POST',
            beforeSend: function(){
                $("#loading_"+d_id).html("<div class='sk-spinner sk-spinner-three-bounce'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");
            },
            success: function(data){
                $("#loading_"+d_id).hide();
                $("#result-data").html(data);
                $("#modal-list-dorm").modal('show');
            }
        });
        return false;
    }
</script>

