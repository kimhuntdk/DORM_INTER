<?php if($row == 0){ ?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

            <center>
                <span style="font-size: 25px; font-weight: bold;">
                    ไม่พบการค้นหา
                </span>
            </center>
                
            </div>
        </div>
    </div>
</div>

<?php }else{ ?>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
        	<div class="row">

                <?php
                foreach ($rs as $key => $val) {
                    $d_id = base64_encode($val->d_id);
                    $uri = "admin-class-dorm?d_id=".$d_id;

                    $q = $this->db->where('d_id',$val->d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs1 = $q->result();
                    $number_bed = $qs1[0]->c_bed;

                    $q2 = $this->db->where('d_id',$val->d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;

                ?>
                <a href="#" onclick="return check_list_dorm('<?=$val->d_id?>')">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                        <span id="loading_<?=$val->d_id?>"></span>
                        <h5 class="m-b-md">
                            <?=$val->d_name?> 
                            (<?=$val->d_position?>)
                            <br>
                            <span style="font-size: 12px;color:#222">
                                <i class="fa fa-user"></i>
                                <?php
                                if($val->d_type_gender == 'male'){
                                    echo "หอชาย";
                                }else{
                                    echo "หอหญิง";
                                }
                                ?>
                            </span>
                        </h5>
                        <h2 style="color:#660000">
                        
                        <?php if($val->d_type_gender == 'male'){ ?>
                        <img src="images/male.jpg" width="30" height="30">
                        <?php }else{ ?>
                        <img src="images/female.jpg" width="30" height="30">
                        <?php } ?>

                            ว่าง <?=$remain?> เตียง
                        </h2>
                        <small>
                            ประเภท <?=$val->d_number_bed?> เตียง
                            <?=$val->d_type?>
                            <?=number_format($val->d_price)?>
                        </small>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>

            </div>

            </div>
        </div>
    </div>
</div>

<?php } ?>