<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>รายชื่อนิสิตจองหอพัก</h2>
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
                        <i class="fa fa-th"></i>
                        รายชื่อนิสิตที่สมัครหอพัก
                    </h5>
                </div>
                <div class="ibox-content">

                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนิสิต</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ชื่อหอพัก</th>
                                <th>ประเภทหอพัก</th>
                                <th>วันที่จอง</th>
                                <th>สถานะ</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $q = $this->db->where('tbl_register_dorm.re_status','0')
                                          ->join('tbl_dorm','tbl_dorm.d_id=tbl_register_dorm.d_id')
                                          ->get('tbl_register_dorm');
                            $result = $q->result();
                            $chk_row = $q->num_rows();
                            ?>

                            <?php foreach($result as $key => $val){
                                $q2 = $this->db->where('re_time',$val->re_time)
                                               ->get('tbl_register_dorm');
                                $rs = $q2->result();

                                $status = $this->provider->status_register($val->re_status);

                                $re_code = base64_encode($val->re_code);

                                $q3 = $this->employee_model
                                           ->get_onus_byID(
                                            $_COOKIE['m_code'],
                                            $val->d_id
                                            );
                                $q3 = $q3->result();
                                $d_id = "";
                                foreach ($q3 as $i => $value2) {
                                    $d_id = $value2->d_id;
                                }
                            ?>

                            <?php
                            if($_COOKIE['level'] == 0){
                                //ถ้าเป็น admin
                            ?>
                            
                            <tr>
                                <td><?=($key+1)?></td>
                                <td>
                                    <?=$val->re_code?>
                                </td>
                                <td>
                                    <?=$val->re_fname.' '.$val->re_lname?>
                                </td>
                                <td>
                                    <?=$val->d_name?>
                                    (<?=$val->d_position?>)
                                </td>
                                <td>
                                   <?=$val->d_type?> 
                                </td>
                                <td>
                                    <?=$val->re_date?>
                                </td>
                                <td>

                                    <?php
                                    if($val->re_status == 0){
                                        $class="label label-danger";
                                    }else if($val->re_status == 1){
                                        $class="label label-primary";
                                    }
                                    ?>
                                    <label class="<?=$class?>">
                                        <?=$status?> 
                                    </label>

                                    
                                </td>
                                <td class="text-right footable-visible footable-last-column">

                                <div class="btn-group">
                                    <a href="#" onclick="return modal_confirm('<?=$val->d_id?>','<?=$val->re_code?>')" class="btn-primary btn btn-xs">
                                        <i class="fa fa-check"></i>
                                        ยืนยัน
                                    </a>

                                    <a class="btn-danger btn btn-xs" href="del_register?re_code=<?=$re_code?>" onclick="return confirm('ยืนยันการยกเลิกการจองหอพักออกจากระบบ?')">
                                        <i class="fa fa-close"></i>
                                        ยกเลิก
                                    </a>   
                                </div>
                                    
                                    

                                </td>
                            </tr>

                            <?php }else{ //ถ้าเป็น เจ้าหน้าที่ ?>

                            <?php
                            if($d_id == $val->d_id){
                            ?>

                            <tr>
                                <td><?=($key+1)?></td>
                                <td>
                                   <?=$val->re_code?>

                                </td>
                                <td>
                                    <?=$val->re_fname.' '.$val->re_lname?>
                                </td>
                                <td>
                                    <?=$val->d_name?>
                                    (<?=$val->d_position?>)
                                </td>
                                <td>
                                   <?=$val->d_type?> 
                                </td>
                                <td>
                                    <?=$val->re_date?>
                                </td>
                                <td>

                                    <?php
                                    if($val->re_status == 0){
                                        $class="label label-danger";
                                    }else if($val->re_status == 1){
                                        $class="label label-primary";
                                    }
                                    ?>
                                    <label class="<?=$class?>">
                                        <?=$status?> 
                                    </label>

                                    
                                </td>
                                <td class="text-right footable-visible footable-last-column">

                                <div class="btn-group">
                                    <a href="#" onclick="return modal_confirm('<?=$val->d_id?>','<?=$val->re_code?>')" class="btn-primary btn btn-xs">
                                        <i class="fa fa-check"></i>
                                        ยืนยัน
                                    </a>
                                    <a class="btn-danger btn btn-xs" href="del_register?re_code=<?=$re_code?>" onclick="return confirm('ยืนยันการยกเลิกการจองหอพักออกจากระบบ?')">
                                        <i class="fa fa-close"></i>
                                        ยกเลิก
                                    </a>   
                                </div>
                                </td>
                            </tr>

                            <?php } ?>
                            <?php } ?>

                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>

<span id="result-modal"></span>

<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    function modal_confirm(d_id,re_code){
        $.ajax({
            url: 'index.php/admin_student/modal_confirm',
            data: {d_id:d_id,re_code:re_code},
            type: 'POST',
            success: function(data){
                $("#result-modal").html(data);
                $("#modal-confirm").modal('show');
            }
        });
        return false;
    }

    function confirm_checkIn(c_id,re_code){
        if(confirm('ยืนยันการเลือกเข้าห้องพักนี้ ใช่หรือไม่?')){

            $.ajax({
                url: 'index.php/admin_student/confirm_checkIn?c_id='+c_id+'&re_code='+re_code,
                success: function(data){
                    alert('ทำรายการสำเร็จเรียบร้อยแล้ว');
                    window.location.reload();
                }
            });
            return false;
            
        }return false;
    }
</script>

