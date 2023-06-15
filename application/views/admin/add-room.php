<?php $this->load->view('template/admin/lib-top'); ?>

<?php
$d_id = base64_decode($_GET['d_id']);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>
        <i class="fa fa-home fa-2x"></i>
        <?=$rs_dorm['d_name']?>
        ประเภท <?=$rs_dorm['d_number_bed']?> เตียง
        <?=$rs_dorm['d_type']?>
        <?=number_format($rs_dorm['d_price'])?>
        <?=$rs_dorm['d_location']?>
        (<?=$rs_dorm['d_position']?>)
    </h2>
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
                        <i class="fa fa-plus"></i>
                        เพิ่มห้อง
                    </h5>
                </div>
                <div class="ibox-content">
                    <form id="frm_dorm" name="frm_dorm" class="form-horizontal" action="insert_room" method="post">

                    	<input name="d_id" type="hidden" value="<?=$d_id?>">
                       
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            รหัสห้อง
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="c_code" type="text" class="form-control" placeholder="รหัสห้อง" required>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            จำนวนเตียง
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="c_bed" type="text" class="form-control" placeholder="จำนวนเตียง" required>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            สถานะห้อง
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="c_status" class="form-control" required>
                                        	<option value="">
                                        		--สถานะห้อง--
                                        	</option>
                                            <option value="1" selected>
                                                ว่าง
                                            </option>
                                        	<option value="0">
                                        		ไม่ว่าง (มีนิสิตเข้าพักแล้ว)
                                        	</option>
                                            <option value="3">
                                                ไม่สะดวกในการให้บริการ
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            
                        </label>
                            <div class="col-sm-9" style="margin-left:15px;">
                                <div class="row">
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
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

