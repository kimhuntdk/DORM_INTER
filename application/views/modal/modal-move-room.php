<style type="text/css">
    #tr-div:hover{
        background-color: #eee;
        cursor: pointer;
    }
</style>

<div class="modal inmodal" id="modal-move" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:1050px;">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-circle-o-notch modal-icon"></i>
                <h4 class="modal-title">
                    ย้ายห้อง/ย้ายหอ
                </h4>
                <small class="font-bold">
                    
                </small>
            </div>
            <div class="modal-body" style="background-color:#fff;">

                <div id="result-data">

                <table class="table table-striped table-bordered" style="font-size:17px;background-color:#fff;">
                    <?php
                    foreach ($result as $key => $value) {
                    ?>
                    <tr onclick="return select_dorm('<?=$value->d_type_gender?>','<?=$value->d_id?>','<?=$re_id?>','<?=$re_time?>','<?=$c_id?>')" id="tr-div" style="<?php if($value->d_id == $d_id){echo "background-color:#FFFF99;font-weight:bold";} ?>">
                        <td><?=($key+1)?></td>
                        <td>  
                            
                            <i class="fa fa-home fa-2x"></i>
                            <?=$value->d_name?>
                            ประเภท <?=$value->d_number_bed?> เตียง
                            <?=$value->d_type?>
                            ราคา/เทอม <?=number_format($value->d_price)?>
                            <?=$value->d_location?>
                            (<?=$value->d_position?>)
                            
                            <?php
                            if($value->d_id == $d_id){
                            ?>
                            <span style="font-size:12px;color:red;font-weight:bold">
                                หอพักปัจจุบัน
                            </span>
                            <?php } ?>

                        </td>
                    </tr>
                    <?php } ?>
                </table>

                </div>
            
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <!--
                <button type="button" class="btn btn-primary">
                   <i class="fa fa-check"></i> บันทึก
                </button>
                -->
            </div>
        </div>
    </div>
</div>