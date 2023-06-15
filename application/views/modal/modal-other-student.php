<div class="modal inmodal" id="modal-student" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 700px;">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-home modal-icon"></i>
                <h4 class="modal-title">
                    เพิ่มนิสิตเข้าห้องพัก
                </h4>
                <small class="font-bold">
                    
                </small>
            </div>
            <div class="modal-body">

                <form id="frm_other" name="frm_other" class="form-horizontal">

                <input name="re_gender" type="hidden" value="<?=$_POST['re_gender']?>">
                <input name="d_id" type="hidden" value="<?=$_POST['d_id']?>">
                <input name="c_id" type="hidden" value="<?=$_POST['c_id']?>">
                <input name="re_date" type="hidden" value="<?=$_POST['re_date']?>">
                <input name="re_time" type="hidden" value="<?=$_POST['re_time']?>">
                <input name="re_status" type="hidden" value="<?=$_POST['re_status']?>">
                
                <div class="form-group">
                <label class="col-sm-3 control-label">
                    ชื่อ-นามสกุล
                    <span style="color:red">*</span>
                </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4"><input name="re_fname" type="text" placeholder="ชื่อ" class="form-control" required></div>
                            <div class="col-md-4">
                            <input name="re_lname" type="text" placeholder="นามสกุล" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                <label class="col-sm-3 control-label">
                    รหัสประจำตัว 11 หลัก
                    <span style="color:red">*</span>
                </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4">
                            <input name="re_code" type="text" placeholder="รหัส" maxlength="11" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <select name="re_level_class" required class="form-control">
                                    <option value="">--เลือกชั้นปี--</option>
                                    <option value="1">ชั้นปีที่ 1</option>
                                    <option value="2">ชั้นปีที่ 2</option>
                                    <option value="3">ชั้นปีที่ 3</option>
                                    <option value="4">ชั้นปีที่ 4</option>
                                    <option value="other">อื่นๆ</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                <label class="col-sm-3 control-label">
                    คณะ/วิทยาลัย
                    <span style="color:red">*</span>
                </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="fac_id" class="form-control" required>
                                    <option value="">--เลือกคณะ--</option>
                                    <?php foreach($facuty as $value): ?>
                                    <option value="<?=$value->fac_id?>">
                                        <?=$value->fac_name?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input name="re_subject" type="text" placeholder="สาขา" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                <label class="col-sm-3 control-label">
                    หมายเลขโทรศัพท์
                    <span style="color:red">*</span>
                </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-4">
                            <input name="re_tel" type="text" placeholder="หมายเลขโทรศัพท์" maxlength="10" class="form-control" required> 
                            </div>
                            <div class="col-md-4"><input name="re_email" type="email" placeholder="อีเมล์" class="form-control"></div>
                        </div>
                    </div>
                </div>

                </form>
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" onclick="return save_other_student()" class="btn btn-primary">
                   <i class="fa fa-check"></i> บันทึก
                </button>
            </div>
        </div>
    </div>
</div>