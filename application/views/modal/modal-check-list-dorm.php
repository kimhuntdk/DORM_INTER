<div class="modal inmodal" id="modal-list-dorm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 1100px;">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-home modal-icon"></i>
                <h5 class="modal-title">
                    <?=$rs_dorm[0]->d_name?>
                    ประเภท <?=$rs_dorm[0]->d_number_bed?> เตียง
                    <?=$rs_dorm[0]->d_type?>
                    ราคา/เทอม <?=number_format($rs_dorm[0]->d_price)?>
                    <?=$rs_dorm[0]->d_location?>
                    (<?=$rs_dorm[0]->d_position?>)
                </h5>
            </div>
            <div class="modal-body" style="background-color: #fff;">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-top: 15px; background-color: #fff;">
                         <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนิสิต</th>
                                
                                
                                <th>ห้อง</th>
                            </tr>
                         </thead>
                         <tbody>
                         <?php
                         foreach ($rs_student as $key => $val) {
                            $fac = $this->welcome_model->get_facuty_byId($val->fac_id);
                            $fac = $fac->result();

                            $class = $this->db->where('c_id',$val->c_id)
                                              ->get('tbl_class_dorm');
                            $re = $class->result();
                         ?>

                         <tr>
                             <td><?=($key+1)?></td>
                             <td><?=$val->re_code?></td>
                             
                             <td><?=$re[0]->c_code?></td>
                         </tr>

                         <?php } ?>

                         </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
    </script>