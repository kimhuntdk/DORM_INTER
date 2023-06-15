<?php $this->load->view('template/admin/lib-top'); ?>

<?php $rs = $result[0]; ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>
        <i class="fa fa-home fa-2x"></i>
        ข้อมูลห้องพัก
        <?=$rs->c_code?>
        <?=$rs->d_name?>
        ประเภท <?=$rs->d_number_bed?> เตียง
        <?=$rs->d_type?>
        <?=number_format($rs->d_price)?>
        <?=$rs->d_location?>
        (<?=$rs->d_position?>)
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

<?php

$q = $this->db->where('d_id',$rs->d_id)
              ->where('c_id',$rs->c_id)
              ->where('re_status','1')
              ->get('tbl_register_dorm');
$row_ = $q->num_rows();

?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

        	<div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-edit"></i>
                        ข้อมูลห้องพัก <?=$rs->c_code?>
                    </h5>

                    <div class="ibox-tools">
                        <a onclick="return confirm('ยืนยันการลบห้องพักยนี้ใช่หรือไม่')" href="del_room_byID?c_id=<?=base64_encode($rs->c_id)?>&d_id=<?=base64_encode($rs->d_id)?>" style="color: #000;">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                    </div>

                </div>
                <div class="ibox-content">
                    <form id="frm_class" name="frm_class" class="form-horizontal" action="update_room" method="post">
                        <input name="c_id" type="hidden" value="<?=$rs->c_id?>">
                        <input name="d_id" type="hidden" value="<?=$rs->d_id?>">
                       
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                            รหัสห้อง
                            <span style="color:red">*</span>
                        </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="c_code" type="text" class="form-control" placeholder="รหัสห้อง" required value="<?=$rs->c_code?>">
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
                                        <input name="c_bed" type="text" class="form-control" placeholder="จำนวนเตียง" required value="<?=$rs->c_bed?>">
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
                                            <option value="1" <?php if($rs->c_status == 1 && $this->input->get('ses_resec') == '0'){echo "selected";} ?>>
                                                ว่าง
                                            </option>
                                        	<option value="0" <?php if($rs->c_status == 0 || $this->input->get('ses_resec') == '1'){echo "selected";} ?>>
                                        		ไม่ว่าง (มีนิสิตเข้าพักแล้ว)
                                        	</option>
                                            <option value="3" <?php if($rs->c_status == 3){echo "selected";} ?>>
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
                                        บันทึกการแก้ไข
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

            <div class="i-box">

                <?php
                $rs_register = @$student[0];
                ?>

                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-edit"></i>
                        ข้อมูลนิสิตที่ใช้บริการ เช่าห้องพัก
                        
                    </h5>
                    <?php if($row_student > 0){ ?>
                    <div class="ibox-tools">
                        <a href="#" onclick="return modal_other_student('<?=$rs_register->re_gender?>','<?=$rs->d_id?>','<?=$rs->c_id?>','<?=$rs_register->re_date?>','<?=$rs_register->re_time?>','<?=$rs_register->re_status?>')" style="float: right;color:#000">
                            <i class="fa fa-plus"></i> เพิ่มนิสิตเข้าห้องพัก
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>รหัสนิสิต</th>
                                <th>ชื่อ-สกุล</th>
                                <th>สังกัดคณะ</th>
                                <th>สาขา</th>
                                <th>เบอร์ติดต่อ</th>
                                <th>เริ่มเข้าพัก</th>
                                <th class="text-right footable-visible footable-last-column">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($student as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?=$value->re_code?>
                                </td>
                                <td>
                                    <?=$value->re_fname." ".$value->re_lname?>
                                </td>
                                <td>
                                    <?=$value->fac_name?>
                                </td>
                                <td>
                                    <?=$value->re_subject?>
                                </td>
                                <td>
                                    <?=$value->re_tel?>
                                </td>
                                <td>
                                    <?=$value->re_date_success?>
                                </td>
                                <td class="text-right footable-visible footable-last-column">
                                    <div class="btn-group">
                                        <a href="edit-student?re_id=<?=base64_encode($value->re_id)?>&c_id=<?=$_GET['c_id']?>" class="btn-info btn btn-xs">
                                        <i class="fa fa-edit"></i>
                                        แก้ไขข้อมูล
                                        </a>
                                        <a href="#" onclick="return move_room('<?=$value->re_gender?>','<?=$value->d_id?>','<?=$value->re_id?>','<?=$value->re_time?>','<?=$value->c_id?>')" class="btn-success btn btn-xs">
                                        <i class="fa fa-circle-o-notch"></i>
                                        ย้ายห้อง/ย้ายหอ
                                        </a>
                                        <a onclick="return confirm('ยืนยันการออกจากการเช่าหอพัก?')" href="del_register_byID?re_id=<?=base64_encode($value->re_id)?>&c_data=c_data&c_id=<?=$_GET['c_id']?>" class="btn-danger btn btn-xs">
                                        <i class="fa fa-ban"></i>
                                        ย้ายออก
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<span id="result-modal"></span>

<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    function modal_other_student(re_gender,d_id,c_id,re_date,re_time,re_status){
        $.ajax({
            url: 'index.php/admin_student/modal_other_student',
            data: {
                re_gender:re_gender,d_id:d_id,c_id:c_id,
                re_date:re_date,re_time:re_time,re_status:re_status
            },
            type: 'POST',
            success: function(data){
                $("#result-modal").html(data);
                $("#modal-student").modal('show');
            }
        });
        return false;
    }

    function save_other_student(){
        if(confirm('ยืนยันการเพิ่มข้อมูลนิสิตเข้าห้องพัก?')){
            $.ajax({
                url: 'index.php/admin_student/save_other_student',
                data: $("#frm_other").serialize(),
                type: 'POST',
                success: function(data){
                    window.location.reload();
                }
            });
            return false;
        }return false;
    }

    function move_room(re_gender,d_id,re_id,re_time,c_id){
        $.ajax({
            url: 'index.php/admin_student/modal_move_room',
            data: {re_gender:re_gender,d_id:d_id,re_id:re_id,re_time:re_time,c_id:c_id},
            type: 'POST',
            success: function(data){
                $("#result-modal").html(data);
                $("#modal-move").modal('show');
            }
        });
        return false;
    }

    function select_dorm(re_gender,d_id,re_id,re_time,c_id){
        $.ajax({
            url: 'index.php/admin_student/select_dorm',
            data: {d_id:d_id,re_gender:re_gender,re_id:re_id,re_time:re_time,c_id},
            type: 'POST',
            success: function(data){
                $("#result-data").html(data);
            }
        });
        return false;
    }

    function change_move_room(c_id,d_id,re_id,re_time,old_d_id,old_c_id){

        if(confirm('ยืนยันการย้ายห้อง/ย้ายหอ?')){
            $.ajax({
                url: 'index.php/admin_student/change_move_room',
                data: {c_id:c_id,d_id:d_id,re_id:re_id,re_time:re_time,old_d_id:old_d_id,old_c_id:old_c_id},
                type: 'POST',
                success: function(data){

                    alert('ทำรายการสำเร็จ?');
                    window.location.href='admin-class-dorm?d_id='+d_id;
                }
            });
            return false;
        }return false;
    }

</script>

