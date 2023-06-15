<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>แก้ไขข้อมูลนิสิต</h2>
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
                        <i class="fa fa-edit"></i>
                        แก้ไขข้อมูลนิสิต
                    </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="update_student" name="frm_register" class="form-horizontal">

                        <input name="re_id" type="hidden" value="<?=$rs[0]->re_id?>">
                        <input name="c_id" type="hidden" value="<?=$_GET['c_id']?>">
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            ชื่อ-นามสกุล
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4"><input name="re_fname" type="text" placeholder="ชื่อ" class="form-control" required value="<?=$rs[0]->re_fname?>"></div>
                                    <div class="col-md-4">
                                    <input name="re_lname" type="text" placeholder="นามสกุล" class="form-control" required value="<?=$rs[0]->re_lname?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            รหัสประจำตัว 11 หลัก
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">
                                    <input name="re_code" type="text" placeholder="รหัส" maxlength="11" readonly class="form-control"  value="<?=$rs[0]->re_code?>">

                                    <!-- readonly ไม่ให้พิมพ -->
                                    
                                    </div>
                                    <div class="col-md-4">
                                        <select name="re_level_class" required class="form-control">
                                            <option value="">--เลือกชั้นปี--</option>
                                            <option value="1" <?php if($rs[0]->re_level_class == 1){ echo "selected"; } ?>>ชั้นปีที่ 1</option>
                                            <option value="2" <?php if($rs[0]->re_level_class == 2){ echo "selected"; } ?>>ชั้นปีที่ 2</option>
                                            <option value="3" <?php if($rs[0]->re_level_class == 3){ echo "selected"; } ?>>ชั้นปีที่ 3</option>
                                            <option value="4" <?php if($rs[0]->re_level_class == 4){ echo "selected"; } ?>>ชั้นปีที่ 4</option>
                                            <option value="other" <?php if($rs[0]->re_level_class == 'other'){ echo "selected"; } ?>>อื่นๆ</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            คณะ/วิทยาลัย
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="fac_id" class="form-control" required>
                                            <option value="">--เลือกคณะ--</option>
                                            <?php foreach($facuty as $value): ?>
                                            <option value="<?=$value->fac_id?>" <?php if($rs[0]->fac_id == $value->fac_id){ echo "selected"; } ?>>
                                                <?=$value->fac_name?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input name="re_subject" type="text" placeholder="สาขา" class="form-control" required value="<?=$rs[0]->re_subject?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            หมายเลขโทรศัพท์
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">
                                    <input name="re_tel" type="text" placeholder="หมายเลขโทรศัพท์" maxlength="10" class="form-control" required value="<?=$rs[0]->re_tel?>"> 
                                    
                                    </div>
                                    <div class="col-md-4"><input name="re_email" type="email" placeholder="อีเมล์" class="form-control" value="<?=$rs[0]->re_email?>"></div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            
                        </label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">
                                   <i class="fa fa-check"></i>
                                   บันทึกการแก้ไข 
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

