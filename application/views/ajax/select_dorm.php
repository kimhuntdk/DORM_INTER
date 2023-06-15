<div class="alert alert-info">
&nbsp;&nbsp;&nbsp;
    <small class="font-bold">
        จำนวนเตียง 
        <?=$rs['d_number_bed']?>
        ประเภท <?=$rs['d_type']?>
        ราคา/เทอม <?=number_format($rs['d_price'])?>
        &nbsp;
        <?=$rs['d_location']?>
        (<?=$rs['d_position']?>)
    </small>
</div>


<div class="row">
    <div class="col-lg-12">

        <?php
        $k_d_id = $rs['d_id'];
        $q = $this->db->where('d_id',$k_d_id)
                      ->get('tbl_class_dorm');
        foreach($q->result() as $key => $val){

            $q = $this->db->where('d_id',$val->d_id)
                          ->where('c_id',$val->c_id)
                          ->where('re_status','1')
                          ->get('tbl_register_dorm');
            $row_ = $q->num_rows();
            $remain_bed = $val->c_bed-$row_;

            if($row_ >= $val->c_bed){

                $div_c = "btn btn-warning";
                $alert = "";

            }else{

                if($val->c_status == 0){

                    $div_c = "btn btn-success";
                    $alert="return change_move_room('".base64_encode($val->c_id)."','".base64_encode($val->d_id)."','".base64_encode($re_id)."','".$re_time."','".$d_id."','".$c_id."')";

                }else if($val->c_status == 1){

                    $div_c = "btn btn-primary";
                    $alert="return change_move_room('".base64_encode($val->c_id)."','".base64_encode($val->d_id)."','".base64_encode($re_id)."','".$re_time."','".$d_id."','".$c_id."')";

                }else if($val->c_status == 3){

                    $div_c = "btn btn-danger";
                    $alert = "";

                }

            }

        ?>

        <a href="#" onclick="<?=$alert?>" class="<?=$div_c?>" style="margin-top: 5px;">
            <i class="fa fa-home"></i>
            <?=$val->c_code?>

            <br>
            <?php if($remain_bed == 0){ ?>
                <span class="label label-danger">
                    เตียงไม่ว่าง
                </span>
            <?php }else{ ?>
                <span class="label label-warning">
                    ว่าง <?=$remain_bed?> เตียง
                </span>
            <?php } ?>

        </a>

        <?php } ?>
    </div>
</div>
<hr>
