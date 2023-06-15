<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>เปลี่ยนรหัสผ่าน</h2>
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

<?php echo @$error; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

        	<div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-lock"></i>
                        เปลี่ยนรหัสผ่าน
                    </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="update_password" name="frm_register" class="form-horizontal">

                        <input name="m_code" type="hidden" value="<?=$_COOKIE['m_code']?>">

                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            รหัสผ่านเดิม
                        </label>
                            <div class="col-sm-5">
                                <input name="old_password" type="password" placeholder="รหัสผ่านเดิม" class="form-control" required>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            รหัสผ่านใหม่
                        </label>
                            <div class="col-sm-5">
                                <input name="new_password" type="password" placeholder="รหัสผ่านใหม่" class="form-control" required>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            ยืนยันรหัสผ่านใหม่
                        </label>
                            <div class="col-sm-5">
                                <input name="re_new_password" type="password" placeholder="ยืนยันรหัสผ่านใหม่" class="form-control" required>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                               
                        </label>
                            <div class="col-sm-5">
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

