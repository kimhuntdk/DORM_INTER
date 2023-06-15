
<div id="panel_<?=$time?>" class="panel-info"> 
    <div class="panel-heading">
        <strong>ผู้สมัครใหม่</strong> 
        <!--
        <span style="float:right">
            <a href="#" style="color:#fff" onclick="return remove_form('<?=$time?>')">
                x
            </a>
        </span>
        -->
    </div>
    <div class="panel-body">
        <div class="form-group">
        <label class="col-sm-3 control-label">
            ชื่อ-นามสกุล
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4"><input name="re_fname[]" id="re_fname_<?=$time?>" type="text" placeholder="ชื่อ" class="form-control" required></div>
                    <div class="col-md-4">
                    <input name="re_lname[]" id="re_lname_<?=$time?>" type="text" placeholder="นามสกุล" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
        <label class="col-sm-3 control-label">
            รหัสประจำตัวนิสิต 11 หลัก
            <span style="color:red">*</span>
        </label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                    <input name="re_code[]" id="re_code_<?=$time?>" type="text" placeholder="รหัส" maxlength="11" class="form-control re_code_<?=$time?>" required onkeyup="return check_code(<?=$time?>)" onblur="return b_code(<?=$time?>)">
                    <span id="code_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                    <div class="col-md-4">
                        <select name="re_level_class[]" id="re_level_class_<?=$time?>" required class="form-control">
                            <option value="">--เลือกชั้นปี--</option>
                            <option value="1">ชั้นปีที่ 1</option>
                            <option value="2">ชั้นปีที่ 2</option>
                            <option value="3">ชั้นปีที่ 3</option>
                            <option value="4">ชั้นปีที่ 4</option>
                            <option value="5">Master</option>
                            <option value="6">Doctor</option>
                            <option value="other">อื่นๆ</option>
                        </select>
                        <input name="re_gender" type="hidden" value="<?=$gender?>">
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
                        <select name="fac_id[]" id="fac_id_<?=$time?>" class="form-control" required>
                            <option value="">--เลือกคณะ--</option>
                            <?php foreach($facuty as $value): ?>
                            <option value="<?=$value->fac_id?>">
                                <?=$value->fac_name?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input name="re_subject[]" id="re_subject_<?=$time?>" type="text" placeholder="สาขา" class="form-control" required>
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
                    <input name="re_tel[]" id="re_tel_<?=$time?>" type="text" placeholder="หมายเลขโทรศัพท์" maxlength="10" class="form-control" required onkeyup="return check_tel(<?=$time?>)" onblur="return t_tel(<?=$time?>)"> 
                    <span id="tel_error_<?=$time?>" style="color:red;font-size:12px;">
                        
                    </span>
                    </div>
                    <div class="col-md-4"><input name="re_email[]" type="email" placeholder="อีเมล์" class="form-control"></div>
                </div>
            </div>
        </div>  

    </div>
</div>
<script>

    function check_code(time){
        var re_code = $(".re_code_"+time);
        if(isNaN(re_code.val())){
            re_code.val("");
        }
    }

    function b_code(time){
        var re_code = $(".re_code_"+time);
        var code_error = $("#code_error_"+time);
        if(re_code.val().length < 11){
            re_code.css({
                "border" : "2px solid red"
            });
            code_error.html("รหัสนิสิตต้อง 11 หลักเท่านั้น");
        }else{
            re_code.css({
                "border" : "1px solid #ccc"
            }); 
            code_error.html("");
        }
    } 

    function check_tel(time){

        var re_tel = $("#re_tel_"+time);
        if(isNaN(re_tel.val())){
            re_tel.val("");
        }

    }

    function t_tel(time){
        var re_tel = $("#re_tel_"+time);
        var tel_error = $("#tel_error_"+time);
        if(re_tel.val().length < 10){
            re_tel.css({
                "border" : "2px solid red"
            });
            tel_error.html("เบอร์โทรศัพท์ 10 หลักเท่านั้น");
        }else{
            re_tel.css({
                "border" : "1px solid #ccc"
            }); 
            tel_error.html("");
        }
    }
</script>