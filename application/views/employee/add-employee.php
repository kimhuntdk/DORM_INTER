<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>เจ้าหน้าที่ เพิ่มข้อมูลเจ้าหน้าที่</h2>
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
                        <i class="fa fa-plus"></i>
                        เพิ่มข้อมูลเจ้าหน้าที่
                    </h5>
                </div>
                <div class="ibox-content">
                    
                <form name="frm_register" class="form-horizontal" action="save_employee" method="post" enctype="multipart/form-data">
                        
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        รหัสเจ้าหน้าที่
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_code" type="text" placeholder="รหัสเจ้าหน้าที่" class="form-control" required>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        รูปโปรไฟล์

                        <span style="color:red">png,jpg,gif</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_profile" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ชื่อ-สกุล
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_fullname" type="text" placeholder="ชื่อ-สกุล" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ตำแหน่งงาน
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_position" type="text" placeholder="ตำแหน่งงาน" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ภาระหน้าที่ดูแลหอพัก
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-8">
                        <div class="row">
                        <?php
                        foreach ($rs as $key => $value) {
                        ?>

                        <div class="col-md-4">
                            <label style="font-weight:normal">
                            <input name="d_id[]" type="checkbox" value="<?=$value->d_id?>">
                            <?=$value->d_name?>
                            <strong><?=$value->d_position?></strong>
                            <?php
                            if($value->d_type_gender == 'male'){
                                echo "(หอชาย)";
                            }else{
                                echo "(หอหญิง)";
                            }
                            ?>
                            </label>
                        </div>

                        <?php } ?>
                        </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Username
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_username" type="text" placeholder="Username" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Password
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_password" type="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Re-Password
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_re_password" type="password" placeholder="Re-Password" class="form-control" required>
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

