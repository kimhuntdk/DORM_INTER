<?php $this->load->view('template/admin/lib-top'); ?>

<?php
date_default_timezone_set("Asia/Bangkok");
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
                        <i class="fa fa-plus"></i>
                        เพิ่มข้อมูลมีเตอร์ น้ำ/ไฟ
                    </h5>
                    
                </div>

                <form action="save-add-meter" method="post">



                <div class="ibox-content">

                    <div>
                        <center>
                            <label>เลือกวันที่ :</label>
                            <input name="me_date" type="text" id="date" class="form-control" style="width: 200px; display: inline-block;" value="<?=date("Y-m-d")?>">
                        </center>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" style="margin-top: 15px;font-size: 11px;">
                            <thead>
                            <tr>
                                <th>เลขห้อง</th>
                                <th>ผู้เช่า</th>
                                <th>มิเตอร์น้ำ & ค่าน้ำ</th>
                                <th>มิเตอร์ไฟ & ค่าไฟ</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($rs_student as $k => $v){ 
                                $q = $this->db->where('re_time',$v->re_time)
                                ->join('tbl_class_dorm','tbl_class_dorm.c_id=tbl_register_dorm.c_id')->get('tbl_register_dorm');
                                $rs = $q->result();

                                $meter = $this->db->order_by('me_id','desc')->where('c_id',$rs[0]->c_id)->where('d_id',$rs[0]->d_id)->get('tbl_meter');
                                $rs_meter = @$meter->result();
                            ?>

                            <!-- hidden -->
                            <input name="c_id[]" type="hidden" value="<?=$rs[0]->c_id?>">

                            <input name="d_id[]" type="hidden" value="<?=$rs[0]->d_id?>">

                            <input name="water_unit[]" type="hidden" value="<?=$water[0]->u_price?>">

                            <input name="elec_unit[]" type="hidden" value="<?=$elec[0]->u_price?>">

                            <input name="water_number_meter[]" id="input_water_meter_<?=$k?>" type="hidden">

                            <input name="elec_number_meter[]" id="input_elec_meter_<?=$k?>" type="hidden">


                            <tr>
                                <td><?=$rs[0]->c_code?></td>
                                <td>
                                    <?php
                                    foreach ($rs as $key => $value) {
                                        echo $value->re_fname." ".$value->re_lname."<br>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div>
                                        <input id="water_meter_ago_<?=$k?>" name="" type="text" class="form-control" style="width: 100px;display:inline-block;" readonly value="<?=@$rs_meter[0]->water_meter_ago?>">
                                        <input id="water_meter_<?=$k?>" name="water_meter_ago[]" type="number" class="form-control" style="width: 110px;;display:inline-block;" onkeyup="return water_meter('<?=$k?>')">
                                        =
                                        <span id="text_water_meter_<?=$k?>">
                                            
                                        </span>
                                        <input id="water_price_<?=$k?>" name="" type="number" class="form-control" style="width: 80px;;display:inline-block;" value="<?php if($water[0]->u_status == 'true'){echo $water[0]->u_price_all;} ?>"> บาท
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="elec_meter_ago_<?=$k?>" name="" type="text" class="form-control" style="width: 100px;display:inline-block;" readonly value="<?=@$rs_meter[0]->elec_meter_ago?>">
                                        <input id="elec_meter_<?=$k?>" name="elec_meter_ago[]" type="number" class="form-control" style="width: 110px;;display:inline-block;" onkeyup="return elec_meter('<?=$k?>')">
                                        =
                                        <span id="text_elec_meter_<?=$k?>">
                                            
                                        </span>
                                        <input id="elec_price_<?=$k?>" name="" type="number" class="form-control" style="width: 80px;;display:inline-block;" value="<?php if($elec[0]->u_status == 'true'){echo $elec[0]->u_price_all;} ?>"> บาท
                                    </div>
                                </td>
                                
                            </tr>

                            <?php } ?>
                            <tr>
                                <td colspan="4" align="right">
                                    <button type="submit" onclick="return confirm('ยืนยันการบันทึกมิเตอร์ค่าน้ำ/ไฟ?')" class="btn btn-primary">
                                        <i class="fa fa-check"></i>
                                        บันทึก
                                    </button>
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                        </div>

                </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    function water_meter(k){
        var sum;
        var meter;
        var new_water_meter_ago;
        //มีเตอร์ที่แล้ว
        var water_meter_ago = parseInt($("#water_meter_ago_"+k).val());
        if($("#water_meter_ago_"+k).val() == ''){
            new_water_meter_ago = 0;
        }else{
            new_water_meter_ago = water_meter_ago
        }

        //มีเตอร์ปัจจุบัน
        var water_meter = parseInt($("#water_meter_"+k).val());
        
        //บาทต่อหน่วย
        var unit = parseInt('<?=$water[0]->u_price?>');

        sum = ((water_meter-new_water_meter_ago)*unit);

        //เป็นจำนวนเงิน
        var water_price = $("#water_price_"+k);
        water_price.val(sum);

        $("#text_water_meter_"+k).html(water_meter-new_water_meter_ago);

        $("#input_water_meter_"+k).val(water_meter-new_water_meter_ago);
    }

    function elec_meter(k){
        var sum;
        var meter;
        var new_elec_meter_ago;
        //มีเตอร์ที่แล้ว
        var elec_meter_ago = parseInt($("#elec_meter_ago_"+k).val());
        if($("#elec_meter_ago_"+k).val() == ''){
            new_elec_meter_ago = 0;
        }else{
            new_elec_meter_ago = elec_meter_ago
        }

        //มีเตอร์ปัจจุบัน
        var elec_meter = parseInt($("#elec_meter_"+k).val());
        
        //บาทต่อหน่วย
        var unit = parseInt('<?=$elec[0]->u_price?>');

        sum = ((elec_meter-new_elec_meter_ago)*unit);

        //เป็นจำนวนเงิน
        var elec_price = $("#elec_price_"+k);
        elec_price.val(sum);

        $("#text_elec_meter_"+k).html(elec_meter-new_elec_meter_ago);

        $("#input_elec_meter_"+k).val(elec_meter-new_elec_meter_ago);
    }
</script>

<script>
  $( function() {
    $( "#date" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
  } );
</script>

