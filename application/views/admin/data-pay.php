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
                        ข้อมูลการใช้ น้ำ/ไฟ
                    </h5>
                               
                </div>
                <div class="ibox-content">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" style="margin-top: 15px; font-size: 12px;">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>มิเตอร์น้ำ</th>
                                <th>จำนวนหน่วย (น้ำ) ที่ใช้</th>
                                <th>มิเตอร์ไฟ</th>
                                <th>จำนวนหน่วย (ไฟ) ที่ใช้</th>
                                <th>วันที่</th>
                                <th class="text-center">สถานะจ่ายน้ำ/ไฟ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rs as $key => $value): ?>

                            <tr>
                                <td><?=($key+1)?></td>
                                <td>
                                    <?=$value->water_meter_ago?>
                                </td>
                                <td>
                                    <?=$value->water_number_meter?> หน่วย
                                    เป็นเงิน 
                                    <?=$value->water_number_meter*$value->water_unit?> บาท
                                    (<?=$value->status_water?>)
                                </td>
                                <td>
                                   <?=$value->elec_meter_ago?> 
                                </td>
                                <td>
                                   <?=$value->elec_number_meter?> หน่วย
                                   เป็นเงิน 
                                    <?=$value->elec_number_meter*$value->elec_unit?> บาท
                                    (<?=$value->status_elec?>)
                                </td>
                                <td><?=$value->me_date?></td>
                                <td>
                                    <?=$value->me_status?>
                                </td>
                            </tr>
                                
                            <?php endforeach ?>
                            
                            </tbody>
                        </table>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script>
        $(document).ready(function(){
            $('.dataTables').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
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

