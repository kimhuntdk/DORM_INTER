<?php $this->load->view('template/user/lib-top'); ?>

<style type="text/css">
    .i-box{
        margin-bottom: 10px;
    }
</style>

<!--
<div class="i-box">
    <div class="ibox-title">
        
    </div>
    <div class="ibox-content">
        
    </div>
</div>
-->

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>หน้าหลัก </h2>
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
        <div class="wrapper wrapper-content animated fadeInRight">

            <div id="result-data"> <!-- result-data -->

            <div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-search"></i>
                        ตรวจสอบรายชื่อที่สมัครหอพัก
                    </h5>
                </div>
                <div class="ibox-content">
                    <form action="search" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="ค้นหาด้วย รหัสนิสิต, ชื่อ-สกุล" required value="<?php if(@$_GET['q'] != ''){echo @$_GET['q'];} ?>"> 
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-search"></i>
                                ค้นหา
                            </button> 
                        </span>
                    </div>
                    </form>
                </div>
                
            </div>

            

            <?php if($rs[0]->s_status == 1){ ?>

            <div class="i-box">
                <div class="ibox-title">
                    <h5>
                        สมัครเข้าหอพัก
                    </h5>
                </div>
                <div class="ibox-content">
                    
                    <div class="row">
                        <a href="#" class="alert_male">
                        <div class="col-md-6">
                            <div class="ibox-content text-center">
                                <h1>
                                    สมัครหอพักชาย
                                </h1>
                                <div class="m-b-sm">
                                    <img alt="image" class="img-circle" src="images/male.jpg">
                                </div>
                                <p class="font-bold">
                                    หอพักยังว่าง
                                </p>
                                
                                <div class="text-center">
                                    <a class="btn btn-xs btn-white alert_male">
                                        <i class="fa fa-plus"></i>
                                        สมัครทันที
                                    </a>
                                </div>
                            </div>
                        </div>
                        </a>
                        <a href="#" class="alert_female" data-gender="female"> 
                        <div class="col-md-6">
                            <div class="ibox-content text-center">
                                <h1>สมัครหอพักหญิง</h1>
                                <div class="m-b-sm">
                                    <img alt="image" class="img-circle" src="images/female.jpg">
                                </div>
                                <p class="font-bold">
                                    หอพักยังว่าง
                                </p>
                                
                                <div class="text-center">
                                    <a class="btn btn-xs btn-white alert_female">
                                        <i class="fa fa-plus"></i>
                                        สมัครทันที
                                    </a>
                                </div>
                            </div>
                        </div> 
                        </a>            
                    </div>

                </div>
            </div>

            <?php } ?>

            

            <div class="i-box">

                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-home"></i>
                        รายชื่อหอพัก มหาวิทยาลัยมหาสารคาม
                    </h5>
                </div>
                <div class="ibox-content">

                <div id="tabs">
                  <ul>
                    <li><a href="#tabs-1">เขตพื้นที่ในเมือง</a></li>
                    <li><a href="#tabs-2">เขตพื้นที่ขามเรียง (มอใหม่)</a></li>
                  </ul>
                  <div id="tabs-1">
                    
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example5">
                        <thead>
                        <tr>
                            <th>ชื่อหอ</th>
                            <th>เพศ</th>
                            <th>ประเภทหอพัก</th>
                            <th>ราคา/ภาคเรียน</th>
                            <th>ที่ตั้ง</th>
                            <th>จำนวนที่รับได้/เตียง</th>
                            <th>ตัวอย่างหอ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach($dorm1 as $k => $val){

                        $q = $this->db->where('d_id',$val->d_id)
                                 // ->where('rooms_type', 2)
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
                        <tr>
                            <td><?=$val->d_name?></td>
                            <td>
                                <?php
                                if($val->d_type_gender == 'male'){
                                    echo "หอชาย";
                                }else{
                                    echo "หอหญิง";
                                }
                                ?>
                            </td>
                            <td>
                                <?=$val->d_number_bed?> เตียง
                                <?=$val->d_type?>
                            </td>
                            <td>
                                <?=number_format($val->d_price)?>
                            </td>
                            <td>
                                <?=$val->d_location?> 
                            </td>
                            <td align="center">
                                <?php
                                if($remain <= 0){
                                    $class = "label label-danger";
                                }else{
                                    $class = "label label-primary";
                                }
                                ?>
                                <label class="<?=$class?>">
                                    <?php
                                    if($remain <= 0){
                                        echo "ห้องพักเต็มแล้ว";
                                    }else{
                                        echo "ว่าง ".$remain." เตียง";
                                    }
                                    ?>
                                </label>
                            </td>
                            <td align="center">
                                <a href="<?=$val->url_image_view?>" target="_blank" class="label label-info" style="color:#fff">
                                   <i class="fa fa-file-picture-o"></i>
                                    ดูตัวอย่างหอพัก
                                </a>
                                <span id="btn_view_<?=$val->d_id?>"></span>
                            </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>

                  </div>
                  <div id="tabs-2">
                    
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example5">
                        <thead>
                        <tr>
                            <th>ชื่อหอ</th>
                            <th>เพศ</th>
                            <th>ประเภทหอพัก</th>
                            <th>ราคา/ภาคเรียน</th>
                            <th>ที่ตั้ง</th>
                            <th>จำนวนที่รับได้/เตียง</th>
                            <th>ตัวอย่างหอ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach($dorm2 as $k => $val){

                        // $q = $this->db->where('d_id',$val->d_id)
                        //           ->select_sum('c_bed')
                        //           ->get('tbl_class_dorm');
                        // $qs2 = $q->result();
                        // $number_bed = $qs2[0]->c_bed;
                        $q = $this->db->where('tbl_class_dorm.d_id', $val->d_id)
                        ->join('tbl_dorm', 'tbl_dorm.d_id = tbl_class_dorm.d_id')
                        ->where('tbl_dorm.rooms_type', 2)
                        ->select_sum('tbl_class_dorm.c_bed')
                        ->get('tbl_class_dorm');
                        $qs2 = $q->result();
                        $number_bed = $qs2[0]->c_bed;

                        $q2 = $this->db->where('d_id',$val->d_id)
                                    ->get('tbl_register_dorm');
                        $row2_ = $q2->num_rows();

                      echo  $remain = $number_bed - $row2_;
                        ?>
                        <tr>
                            <td><?=$val->d_name?></td>
                            <td>
                                <?php
                                if($val->d_type_gender == 'male'){
                                    echo "หอชาย";
                                }else{
                                    echo "หอหญิง";
                                }
                                ?>
                            </td>
                            <td>
                                <?=$val->d_number_bed?> เตียง
                                <?=$val->d_type?>
                            </td>
                            <td>
                                <?=number_format($val->d_price)?>
                            </td>
                            <td>
                                <?=$val->d_location?> 
                            </td>
                            <td align="center">
                                <?php
                                if($remain <= 0){
                                    $class = "label label-danger";
                                }else{
                                    $class = "label label-primary";
                                }
                                ?>
                                <label class="<?=$class?>">
                                    <?php
                                    if($remain <= 0){
                                        echo "ห้องพักเต็มแล้ว";
                                    }else{
                                        echo "ว่าง ".$remain." เตียง";
                                    }
                                    ?>
                                </label>
                            </td>
                            <td align="center">
                                <a href="<?=$val->url_image_view?>" target="_blank" class="label label-info" style="color:#fff">
                                   <i class="fa fa-file-picture-o"></i>
                                    ดูตัวอย่างหอพัก
                                </a>
                                <span id="btn_view_<?=$val->d_id?>"></span>
                            </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>

                  </div>
                  
                </div>

                
                </div>

            </div>

            <?php foreach($rs_news as $key => $val){ ?>
            <div class="i-box">
                <div class="ibox-title">
                    <h5>
                        ข่าวประชาสัมพันธ์ เมื่อวันที่ <?=$val->n_date?>
                    </h5>
                    <div class="ibox-tools">
                        โดย Administrator
                    </div>
                </div>
                <div class="ibox-content">
                    <?=$val->data_news?>
                </div>
            </div>
            <?php } ?>

            </div> <!-- end result-data -->

        </div>
    </div>
</div>


<!-- alert -->
<div class="modal inmodal" id="alert_male" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa fa-exclamation-circle modal-icon"></i>
                <h4 class="modal-title">
                    สมัครหอพักนิสิต มหาวิทยาลัยมหาสารคาม
                </h4>

            </div>
            <div class="modal-body" style="font-size:18px;">
                
                <?=$data_confirm[0]->g_data?>

                <div class="alert alert-warning" style="margin-top: 20px;">
                    
                <div class="row">
                    <div class="col-lg-12">

                    <style type="text/css">
                        .btn-group .active{
                            background-color: yellow;
                        }    
                    </style>

                    <form id="frm_select">
                    <center>
                    <div id="check" data-toggle="buttons" class="btn-group">
                        
                        <label  class="btn btn-md btn-white" style="font-size: 18px;"> 
                            <input type="radio" name="position" value="ม.เก่า"> 
                            <i class="fa fa-home fa-2x"></i>
                            เขตพื้นที่ในเมือง
                        </label>
                        

                        <label  class="btn btn-md btn-white" style="font-size: 18px;"> 
                            <input type="radio" name="position" value="ม.ใหม่">
                            <i class="fa fa-home fa-2x"></i> 
                            เขตพื้นที่ขามเรียง (มอใหม่)
                        </label>
                    </div>
                    </center>
                    <input name="gender" type="hidden" value="male">
                    </form>

                    </div>
                </div>

                </div>

            </div>
            <div class="modal-footer">
                <button id="btn_male" type="button" onclick="return register('alert_male')" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- alert -->
<div class="modal inmodal" id="alert_female" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa fa-exclamation-circle modal-icon"></i>
                <h4 class="modal-title">
                    สมัครหอพักนิสิต มหาวิทยาลัยมหาสารคาม
                </h4>

            </div>
            <div class="modal-body" style="font-size:18px;">
                <?=$data_confirm[0]->g_data?>

                <div class="alert alert-warning" style="margin-top: 20px;">
                    
                <div class="row">
                    <div class="col-lg-12">

                    <style type="text/css">
                        .btn-group .active{
                            background-color: yellow;
                        }    
                    </style>

                    <form id="frm_select2">
                    <center>
                    <div id="check2" data-toggle="buttons" class="btn-group">
                        
                        <label  class="btn btn-md btn-white" style="font-size: 18px;"> 
                            <input type="radio" name="position" value="ม.เก่า"> 
                            <i class="fa fa-home fa-2x"></i>
                            เขตพื้นที่ในเมือง
                        </label>
                        

                        <label  class="btn btn-md btn-white" style="font-size: 18px;"> 
                            <input type="radio" name="position" value="ม.ใหม่">
                            <i class="fa fa-home fa-2x"></i> 
                            เขตพื้นที่ขามเรียง (มอใหม่)
                        </label>
                    </div>
                    </center>
                    <input name="gender" type="hidden" value="female">
                    </form>

                    </div>
                </div>

                </div>

            </div>
            <div class="modal-footer">
                <button id="btn_female" type="button" onclick="return register2('alert_female')" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<span id="rs-data"></span>

<?php $this->load->view('template/user/lib-footer'); ?>

<script>


    $(function(){
        $.ajax({
            url: 'index.php/welcome/modal_welcome',
            success: function(data){
                $("#rs-data").html(data);
                $("#modal-welcome").modal('show');
            }
        });
        return false;
    });

    $('.alert_male').click(function () {
        $("#alert_male").modal('show');
        $("#btn_male").attr('disabled','disabled');
        $("#check").click(function(){
            $("#btn_male").removeAttr('disabled');
            
        });
    }); 

    $('.alert_female').click(function () {
        $("#alert_female").modal('show');
        $("#btn_female").attr('disabled','disabled');
        $("#check2").click(function(){
            $("#btn_female").removeAttr('disabled');
            
        });
    }); 

    function register(type){

        $("#"+type).modal('hide');
        $.ajax({
            url: 'index.php/ajax/content_register',
            data: $("#frm_select").serialize(),
            type: 'GET',
            beforeSend: function(){
                $("#result-data").html("<div class='sk-spinner sk-spinner-three-bounce' style='margin-top:50px;margin-bottom: 50px;'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");
            },
            success: function(data){
                $("#result-data").html(data);
            }
        });
        return false;
    }

    function register2(type){

        $("#"+type).modal('hide');
        $.ajax({
            url: 'index.php/ajax/content_register',
            data: $("#frm_select2").serialize(),
            type: 'GET',
            beforeSend: function(){
                $("#result-data").html("<div class='sk-spinner sk-spinner-three-bounce' style='margin-top:50px;margin-bottom: 50px;'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div>");
            },
            success: function(data){
                $("#result-data").html(data);
            }
        });
        return false;
    }
</script>

<script>
        $(document).ready(function(){
            $('.dataTables-example5').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
    </script>

    <script>
      $( function() {
        $( "#tabs" ).tabs();
      } );
  </script>



