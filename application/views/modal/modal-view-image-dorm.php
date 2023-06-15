<div class="modal inmodal" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 1100px;">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-home modal-icon"></i>
                <h6 class="modal-title">
                    <?=$rs_dorm->d_name?>
                    ประเภท <?=$rs_dorm->d_number_bed?> เตียง
                    <?=$rs_dorm->d_type?>
                    ราคา/เทอม <?=number_format($rs_dorm->d_price)?>
                    <?=$rs_dorm->d_location?>
                    (<?=$rs_dorm->d_position?>)
                </h6>
            </div>
            <div class="modal-body" style="background-color: #fff;">
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>