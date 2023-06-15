<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>เจ้าหน้าที่ แก้ไขข้อมูลเจ้าหน้าที่</h2>
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
                        แก้ไขข้อมูลเจ้าหน้าที่
                    </h5>
                </div>
                <div class="ibox-content">
                    
                <form name="frm_register" class="form-horizontal" action="update_employee" method="post" enctype="multipart/form-data">

                    <input name="m_id" type="hidden" value="<?=$result->m_id?>">
                        
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        รหัสเจ้าหน้าที่
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_code" type="text" readonly class="form-control" value="<?=$result->m_code?>">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        รูปโปรไฟล์
                        <span style="color:red">png,jpg,gif</span>
                        <br>
                        <?php
                        if($result->m_profile == ""){
                            $profile = "no_pic.png";
                        }else{
                            $profile = $result->m_profile;
                        }
                        ?>
                        <img src="images-manager/<?=$profile?>" width="48" height="48" style="margin-top: 8px;">

                    </label>
                        <div class="col-sm-5">
                            <input name="m_profile" type="file" class="form-control">
                            <input name="old_profile" type="hidden" value="<?=$result->m_profile?>">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ชื่อ-สกุล
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_fullname" type="text" placeholder="ชื่อ-สกุล" class="form-control" required value="<?=$result->m_fullname?>">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ตำแหน่งงาน
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_position" type="text" placeholder="ตำแหน่งงาน" class="form-control" required value="<?=$result->m_position?>">
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
                            $q = $this->employee_model->get_onus_byID($result->m_code,$value->d_id);
                            $k = $q->result();
                            $d_id = "";
                            $m_code = "";
                            foreach ($k as $k => $val) {
                                $d_id = $val->d_id;
                                $m_code = $val->m_code;
                            }
                        ?>

                        <div class="col-md-4">
                            
                            <label style="font-weight:normal;font-size: 12px;">
                            <input name="d_id[]" type="checkbox" value="<?=$value->d_id?>" <?php if($d_id == $value->d_id){echo "checked";} ?>>
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
                        <hr>
                        <label>
                        <input type="checkbox" value="true" name="m_status_meter" <?php if($result->m_status_meter == 'true'){echo "checked";} ?>> เปิดใช้งานมิเตอร์ น้ำ/ไฟ
                        </label>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Username
                        <span style="color:red">*</span>
                    </label>
                        <div class="col-sm-5">
                            <input name="m_username" type="text" readonly class="form-control" required value="<?=$result->m_username?>">
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">
                        ส้ราง Password ใหม่
                    </label>
                        <div class="col-sm-5">
                            <input name="new_password" type="password" placeholder="Create password" class="form-control">
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

