<div class="modal inmodal" id="modal-pay" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-th modal-icon"></i>
                <h4 class="modal-title">
                    ภาระค่าใช้จ่าย ค่าน้ำ/ไฟ
                </h4>
            </div>
            <div class="modal-body">
                <h3>รายการค่าน้ำ</h3>
                 <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>ลำดับ</th>
                             <th>ค่าน้ำ</th>
                             <th>วันที่</th>
                             <th>สถานะ</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php foreach($rs as $key => $val){ ?>

                        <tr>
                            <td><?=($key+1)?></td>
                            <td><?=$val->water_number_meter*$val->water_unit?></td>
                            <td><?=$val->me_date?></td>
                            <td>
                                <?php
                                if($val->status_water == 'ยังไม่จ่าย'){
                                    $class="label label-danger";
                                }else{
                                    $class="label label-success";
                                }
                                ?>
                                <span class="<?=$class?>">
                                    <?=$val->status_water?>
                                </span>
                            </td>
                        </tr>

                        <?php } ?>
                     </tbody>
                 </table>
                 <hr>
                 <h3>รายการค่าไฟ</h3>
                 <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>ลำดับ</th>
                             <th>ค่าไฟ</th>
                             <th>วันที่</th>
                             <th>สถานะ</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php foreach($rs as $key => $val){ ?>

                        <tr>
                            <td><?=($key+1)?></td>
                            <td><?=$val->elec_number_meter*$val->elec_unit?></td>
                            <td><?=$val->me_date?></td>
                            <td>
                                <?php
                                if($val->status_elec == 'ยังไม่จ่าย'){
                                    $class="label label-danger";
                                }else{
                                    $class="label label-success";
                                }
                                ?>
                                <span class="<?=$class?>">
                                    <?=$val->status_elec?>
                                </span>
                            </td>
                        </tr>

                        <?php } ?>
                     </tbody>
                 </table>
                 <span style="color:red">
                     *** หมายเหตุ กรุณาชำระค่าน้ำ/ไฟ ได้ที่เจ้าหน้าที่ดูแลหอพักนั้น ตามกำหนดด้วย 
                 </span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>