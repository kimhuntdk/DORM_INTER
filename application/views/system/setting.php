<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ตั้งค่าระบบ</h2>
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

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

        	<div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-cogs"></i>
                        ตั้งค่าระบบ
                    </h5>
                </div>
                <div class="ibox-content">

                <form id="frm_register" name="frm_register" class="form-horizontal" method="post" action="update_setting">

                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        อัตราค่าบริการ (การใช้น้ำ)
                    </label>
                        <div class="col-sm-9">

                           <div class="input-group date">
                                <span class="input-group-addon">บาท/หน่วย </span><input name="u_water" type="text" class="form-control" value="<?=$water[0]->u_price?>">

                                <span class="input-group-addon">หรือเหมารวม </span><input name="u_water_all" type="text" class="form-control" value="<?=$water[0]->u_price_all?>">
                            </div>
                           
                        </div>
                    </div>

                     <div class="hr-line-dashed"></div>

                     <div class="form-group">
                    <label class="col-sm-3 control-label">
                        อัตราค่าบริการ (การใช้ไฟ)
                    </label>
                        <div class="col-sm-9">
                           <div class="input-group date">
                                <span class="input-group-addon">บาท/หน่วย </span><input name="u_elec" type="text" class="form-control" value="<?=$elec[0]->u_price?>">

                                <span class="input-group-addon">หรือเหมารวม </span><input name="u_elec_all" type="text" class="form-control" value="<?=$elec[0]->u_price_all?>">
                            </div>
                           
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        การจองหอพัก
                    </label>
                        <div class="col-sm-9">
                            <label>
                            <input name="s_status" value="true" type="checkbox" <?php if($rs[0]->s_status == 1){ echo "checked"; } ?>>
                            เปิดการจองหอพัก
                            </label>
                            <div class="input-group date">
                                <span class="input-group-addon">ตั้งแต่วันที่ </span><input name="day_start" id="date_start" type="text" class="form-control" value="<?=$rs[0]->day_start?>">

                                <span class="input-group-addon">ถึงวันที่ </span><input name="day_stop" type="text" id="date_stop" class="form-control" value="<?=$rs[0]->day_stop?>">
                            </div>
                            <span style="color:red">
                                <strong>
                                    ตั้งแต่วันที่ <?=$rs[0]->day_start?>
                                    &nbsp;&nbsp;
                                    ถึงวันที่ <?=$rs[0]->day_stop?>
                                </strong>
                            </span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ข้อความแสดงเมื่อปิดระบบจอง
                    </label>
                        <div class="col-sm-9">
                            <div class="ibox-content no-padding">
                                <div class="alert-text">
                                    <?=$rs[0]->alert_text?>
                                </div>
                            </div>
                            <input name="alert_text" id="data-text" type="hidden">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">

                        </label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i>
                                บันทึก
                            </button>
                            <button type="reset" class="btn btn-danger">
                                <i class="fa fa-close"></i>
                                ยกเลิก
                            </button>
                        </div>
                    </div>


                </form>
                    
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    $(function(){
        $("#date_start").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#date_stop").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('.alert-text').summernote();

        $(".i-box").mouseover(function(){
            $("#data-text").val($(".alert-text").code());
        });
    });
</script>

