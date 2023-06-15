<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข้อมูลส่วนตัว</h2>
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
                        แก้ไขข้อมูลส่วนตัว
                    </h5>
                </div>
                <div class="ibox-content">
                    
                    <form method="post" action="update_profile" name="frm_register" class="form-horizontal" enctype="multipart/form-data">

                        <input name="m_id" type="hidden" value="<?=$profile->m_id?>">

                        <input name="m_code" type="hidden" value="<?=$profile->m_code?>">

                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            รูปโปรไฟล์ 
                            <span style="color: red">jpg,png,gif เท่านั้น</span>
                            <br>
                            <?php
                            if($profile->m_profile == ""){
                                $pic = "no_pic.png";
                            }else{
                                $pic = $profile->m_profile;
                            }
                            ?>
                            <img src="images-manager/<?=$pic?>" width="48" height="48" style="margin-top: 8px;"> 
                        </label>
                            <div class="col-sm-5">
                                <input name="m_profile" type="file" class="form-control">
                                <input name="old_profile" type="hidden" value="<?=$profile->m_profile?>">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            ชื่อ-นามสกุล   
                        </label>
                            <div class="col-sm-5">
                                <input name="m_fullname" type="text" placeholder="ชื่อ-นามสกุล" class="form-control" required value="<?=$profile->m_fullname?>">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">
                            ตำแหน่ง
                        </label>
                            <div class="col-sm-5">
                                <input name="m_position" type="text" placeholder="ตำแหน่ง" class="form-control" required value="<?=$profile->m_position?>">
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

