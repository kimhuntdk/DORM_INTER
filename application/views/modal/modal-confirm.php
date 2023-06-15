<div class="modal inmodal" id="modal-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 1050px;">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-home modal-icon"></i>
                <h4 class="modal-title">
                    เลือกห้องพัก (<?=$rs['d_name']?>)
                </h4>
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
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php
                        $k_d_id = $rs['d_id'];
                        $q = $this->db->where('d_id',$k_d_id)->get('tbl_class_dorm');

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
                                        if($remain_bed != 0){
                                        $alert = "return confirm_checkIn('".base64_encode($val->c_id)."','".base64_encode($re_code)."')";
                                        }else{
                                            $alert = "";
                                        }

                                    }else if($val->c_status == 1){
                                        $div_c = "btn btn-primary";
                                        if($remain_bed != 0){
                                        $alert="return confirm_checkIn('".base64_encode($val->c_id)."','".base64_encode($re_code)."')";
                                        }else{
                                            $alert = "";
                                        }
                                    }else if($val->c_status == 3){
                                        $div_c = "btn btn-danger";
                                        $alert = "";
                                    }

                                }

                                $c_id = base64_encode($val->c_id); 
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

                <div class="alert alert-danger" style="color: red;font-size: 18px">
                                <b>*** หมายเหตุ</b>
                                <div class="b1">
                                    <div >
                                        <label>
                                            <div class="btn btn-primary">
                                                สี เขียว
                                            </div>
                                        </label>
                                        ห้องพักว่าง
                                    </div>
                                    <div>
                                        <label>
                                            <div class="btn btn-success">
                                                สี น้ำเงิน
                                            </div>
                                        </label>
                                        ห้องพักมีนิสิตเข้าพักแล้ว (ยังไม่เต็ม)
                                    </div>
                                    <div>
                                        <label>
                                            <div class="btn btn-warning">
                                                สี ส้ม
                                            </div>
                                        </label>
                                        ห้องพักมีนิสิตเข้าพักแล้ว (เต็ม)
                                    </div>
                                    <div>
                                        <label>
                                            <div class="btn btn-danger">
                                                สี แดง
                                            </div>  
                                        </label>
                                        ห้องพักไม่สะดวกในการให้บริการ
                                    </div>
                                </div>

                            </div>

            </div>
        </div>
    </div>
</div>