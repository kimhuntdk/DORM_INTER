<?php $this->load->view('template/user/lib-top'); ?>

<style type="text/css">
    .i-box{
        margin-bottom: 10px;
    }
</style>

<!--
<div class="i-box">
    <div class="ibox-title">
        
    </div>
    <div class="ibox-content">
        
    </div>
</div>
-->


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>
        ผลการค้นหา "<?=$q?>"
        (<?=$row?> รายการ)
    </h2>
        <ol class="breadcrumb">
            <li>
                <a href="welcome">Home</a>
            </li>
            <li class="active">
                <strong>search</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            
           <div id="result-data"> <!-- result-data -->
                <div class="i-box">
                    <div class="ibox-title">
                        <h5>
                            <i class="fa fa-search"></i>
                            ตรวจสอบรายชื่อที่สมัครหอพัก
                        </h5>
                    </div>
                    <div class="ibox-content">

                        <?php
                        if($row != 0){
                        ?>

                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนิสิต</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ชื่อหอพัก</th>
                                <th>ประเภทหอพัก</th>
                                <th>วันที่เริ่มจอง</th>
                                <th>Date check-in</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($result as $key => $val){
                                $status = $this->provider->status_register($val->re_status);
                            ?>
                            <tr>
                                <td>
                                    <?=($key+1); ?>
                                </td>
                                <td>
                                    <?=$val->re_code?>
                                </td>
                                <td>
                                    <?=$val->re_fname." ".$val->re_lname?>
                                </td>
                                <td>
                                    <?=$val->d_name?>
                                    (<?=$val->d_type?> <?=number_format($val->d_price)?>)
                                </td>
                                <td>
                                    <?php
                                    if($val->re_gender == 'male'){
                                        echo "Male";
                                    }else if($val->re_gender == 'female'){
                                        echo "Female";
                                    }
                                    ?>
                                </td>
                                <td class="text-navy">
                                    <?=$val->re_date?>
                                </td>
                                <td class="text-navy">
                                <?=$val->re_check_in?>
                                </td>
                                <td class="text-navy">
                                <?=$val->re_country?>
                                </td>
                                <td>
                                    <?php
                                    if($val->re_status == 0){
                                        $class="label label-danger";
                                    }else if($val->re_status == 1){
                                        $class="label label-primary";
                                    }
                                    ?>
                                    <label class="<?=$class?>">
                                        <?=$status?> 
                                    </label>
                                    <?php
                                    if($val->re_status == 1){
                                    ?>
                                    <?php
                                    if($val->d_status_meter == 'true'){
                                    ?>
                                    |
                                    <a href="#" onclick="return modal_data_pay('<?=$val->c_id?>','<?=$val->d_id?>')" class="label label-info">
                                        <i class="fa fa-th"></i>
                                        ภาระค่าใช้จ่าย
                                    </a>
                                    <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>

                        <?php }else{ ?>

                            <br><br>
                            <center>
                                <h2>
                                    <i class="fa fa-exclamation-triangle"></i>
                                    ไม่พบข้อมูลการค้นหา "<?=$q?>"
                                </h2>
                            </center>

                        <?php } ?>

                    </div>
                </div>
           </div>         
        </div>
    </div>
</div>

<span id="data-pay"></span>

<?php $this->load->view('template/user/lib-footer'); ?>

<script type="text/javascript">
    function modal_data_pay(c_id,d_id){
        $.ajax({
            url: 'index.php/welcome/modal_pay',
            data: {c_id:c_id,d_id:d_id},
            type: 'POST',
            success: function(data){
                $("#data-pay").html(data);
                $("#modal-pay").modal('show');
            }
        });return false;
    }
</script>

