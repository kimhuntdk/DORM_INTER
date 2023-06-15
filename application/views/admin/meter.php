<?php $this->load->view('template/admin/lib-top'); ?>

<?php
$d_id = base64_encode($rs_dorm['d_id']);
$k_d_id = base64_decode($d_id);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>
        <i class="fa fa-home fa-2x"></i>
        <?=$rs_dorm['d_name']?>
        ประเภท <?=$rs_dorm['d_number_bed']?>
        <?=$rs_dorm['d_type']?>
        <?=number_format($rs_dorm['d_price'])?>
        <?=$rs_dorm['d_location']?>
        (<?=$rs_dorm['d_position']?>)
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

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-th"></i>
                        ข้อมูลมีเตอร์ น้ำ/ไฟ
                    </h5>
                   
                    <div class="ibox-tools">
                       <a href="admin-add-meter?d_id=<?=$d_id?>" style="color: #000">
                            <i class="fa fa-plus"></i>
                            เพิ่มมีเตอร์ น้ำ/ไฟ
                        </a>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-top: 15px; font-size: 12px;">
                            <thead>
                            <tr>
                                <th>รหัสนิสิต</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ค่าน้ำ</th>
                                <th>ค่าไฟ</th>
                                <th class="text-right footable-visible footable-last-column">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($rs_student as $k => $v){ 
                                $q = $this->db->where('re_time',$v->re_time)->get('tbl_register_dorm');
                                $rs = $q->result();

                                $meter = $this->db->order_by('me_id','desc')->where('c_id',$rs[0]->c_id)->where('d_id',$rs[0]->d_id)->where('me_status','ยังไม่จ่าย')->get('tbl_meter');
                                $rs_meter = $meter->result();
                                $_row = $meter->num_rows();
                            ?>

                            <tr>
                                <td>
                                    <?php
                                    foreach ($rs as $key => $val) {
                                        echo $val->re_code."<br>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    foreach ($rs as $key => $val) {
                                        echo $val->re_fname." ".$val->re_lname."<br>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($_row == 0){
                                        echo "- ไม่มีค่าน้ำ";
                                    }else{
                                        foreach ($rs_meter as $key => $value) {
                                            if($value->status_water == 'ยังไม่จ่าย'){
                                                ?>

                                                วันที่ <?=$value->me_date." เป็นเงิน ".$value->water_number_meter*$value->water_unit." บาท"?>

                                                (<a href="#" onclick="return pay_meter('<?=$value->me_id?>','water')">
                                                    ชำระ
                                                </a>)

                                               <br>

                                                <?php
                                            }else{
                                                echo "จ่ายแล้ว<br>";
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($_row == 0){
                                        echo "- ไม่มีค่าไฟ";
                                    }else{
                                        foreach ($rs_meter as $key => $value) {
                                            if($value->status_elec == 'ยังไม่จ่าย'){
                                               ?>

                                                วันที่ <?=$value->me_date." เป็นเงิน ".$value->elec_number_meter*$value->elec_unit." บาท"?>

                                                (<a href="#" onclick="return pay_meter('<?=$value->me_id?>','elec')">
                                                    ชำระ
                                                </a>)

                                               <br>

                                                <?php
                                            }else{
                                                echo "จ่ายแล้ว<br>";
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-right footable-visible footable-last-column">
                                    <div class="btn-group">
                                    <a href="data-pay?c_id=<?=base64_encode($rs[0]->c_id)?>&d_id=<?=base64_encode($rs[0]->d_id)?>" class="btn-primary btn btn-xs">
                                        <i class="fa fa-list"></i>
                                        ข้อมูลค่าน้ำ/ไฟ
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
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    function pay_meter(me_id,me_type){
        if(confirm('ยืนยันการชำระค่าน้ำ?')){
            $.ajax({
                url: 'index.php/admin_meter/pay_meter',
                data: {me_id:me_id,me_type:me_type},
                type: 'POST',
                success: function(data){
                    alert('ชำระเรียบร้อย');
                    window.location.reload();
                }
            }); return false;
        }return false;
    }

</script>

