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
                <strong>สมัครหอพักนิสิต</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div id="result-data"> <!-- result-data -->


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

            <?php }else{ ?>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <?=$set[0]->alert_text?>

                    <span style="font-size: 20px;">
                        <i class="fa fa-calendar"></i> ตั้งแต่วันที่ : <?=$this->register_model->convert_date(strtotime($set[0]->day_start))?>
                        -
                        <i class="fa fa-calendar"></i> ถึง : <?=$this->register_model->convert_date(strtotime($set[0]->day_stop))?>
                    </span>

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
