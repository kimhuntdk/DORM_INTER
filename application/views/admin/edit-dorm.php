<?php $this->load->view('template/admin/lib-top'); ?>

<?php
$d_id = base64_decode($_GET['d_id']);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>แก้ไขข้อมูลหอพัก ID = <?=$d_id?></h2>
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
                        <i class="fa fa-search"></i>
                        ฟอร์ม แก้ไขข้อมูลหอพัก ID = <?=$d_id?>
                    </h5>
                </div>
                <div class="ibox-content">
                    <form id="frm_dorm" name="frm_dorm" class="form-horizontal" action="update_dorm" method="post">
                        <input name="d_id" type="hidden" value="<?=$result['d_id']?>">
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            ชื่อหอพัก
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-8" style="margin-left:15px;">
                                <div class="row">
                                    <input required placeholder="ชื่อหอพัก" name="d_name" type="text" class="form-control" value="<?=$result['d_name']?>">
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            จำนวนเตียง
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-2">
                                    <input name="d_number_bed" type="number" placeholder="จำนวนเตียง" class="form-control" required value="<?=$result['d_number_bed']?>" required>
                                    </div>
                                    <div class="col-md-5">
                                    <select name="d_type" class="form-control" required>
                                        <option value="">
                                            --เลือกประเภทหอ--
                                        </option>
                                        <option value="ปรับอากาศ" <?php if($result['d_type'] == 'ปรับอากาศ'){echo "selected";} ?>>ปรับอากาศ</option>
                                        <option value="พัดลม" <?php if($result['d_type'] == 'พัดลม'){echo "selected";} ?>>พัดลม</option>
                                        <option value="other" <?php if($result['d_type'] == 'other'){echo "selected";} ?>>อื่นๆ</option>
                                    </select>
                                    </div>
                                    <div class="col-md-3"><input name="d_price" type="number" placeholder="ราคา" class="form-control" value="<?=$result['d_price']?>" required>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            เขตพื้นที่
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-8" style="margin-left:15px;">
                                <div class="row">
                                    <input placeholder="เขตพื้นที่" name="d_location" type="text" class="form-control" value="<?=$result['d_location']?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Location มหาลัย
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    
                                    <div class="col-md-5">
                                    <select name="d_position" class="form-control" required>
                                        <option value="">
                                            --เลือก Location--
                                        </option>
                                        <option value="ม.เก่า" <?php if($result['d_position'] == 'ม.เก่า'){echo "selected";} ?>>ม.เก่า</option>
                                        <option value="ม.ใหม่" <?php if($result['d_position'] == 'ม.ใหม่'){echo "selected";} ?>>ม.ใหม่</option>
                                        <option value="other" <?php if($result['d_position'] == 'other'){echo "selected";} ?>>อื่นๆ</option>
                                    </select>
                                    </div>
                                    <div class="col-md-5">
                                    <select name="d_type_gender" class="form-control" required>
                                        <option value="">
                                            --Gender--
                                        </option>
                                        <option value="male" <?php if($result['d_type_gender'] == 'male'){echo "selected";} ?>>หอพักชาย</option>
                                        <option value="female" <?php if($result['d_type_gender'] == 'female'){echo "selected";} ?>>หอพักหญิง</option>
                                        <option value="other" <?php if($result['d_type_gender'] == 'other'){echo "selected";} ?>>อื่นๆ</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            URL ตัวอย่างหอพัก
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <input name="url_image_view" type="text" class="form-control" value="<?=$result['url_image_view']?>">
                                
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            การแสดงห้องพัก
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="d_side" class="form-control" required>
                                            <option value="">
                                                --ตำแหน่งรวมห้องพัก--
                                            </option>
                                            <option value="2" <?php if($result['d_side'] == '2'){echo "selected";} ?>>
                                                2 แถว (หน้าชนหน้า)
                                            </option>
                                            <option value="1" <?php if($result['d_side'] == '1'){echo "selected";} ?>>
                                                แถวเดียว
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            จำนวนชั้น
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="d_bathroom" type="number" class="form-control" placeholder="จำนวนชั้น" value="<?=$result['d_bathroom']?>" required>
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

