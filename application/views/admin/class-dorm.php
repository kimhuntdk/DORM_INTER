<?php $this->load->view('template/admin/lib-top'); ?>

<style type="text/css">
    .b1{
        margin-left: 30px;
        margin-top: 10px;
    }
    .b1 div{
        margin-top: 5px;
        color: #000;
    }
    .b1 div .btn{
        color: #fff;
    }
    .b1 div label{
        display: inline-block;
        width: 120px;
        text-align: right;
        padding-right: 8px;
    }
</style>

<?php
$d_id = base64_encode($rs_dorm['d_id']);
$k_d_id = base64_decode($d_id);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>
        <i class="fa fa-home fa-2x"></i>
        <?=$rs_dorm['d_name']?>
        ประเภท <?=$rs_dorm['d_number_bed']?> เตียง
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
                        <i class="fa fa-search"></i>
                        ตำแหน่งห้องพักทั้งหมด
                        

                    </h5>
                    <div class="ibox-tools">
                    
                    <?php if($rs_dorm['d_status_meter'] == 'true'){ ?>
                    
                       <a href="admin-meter?d_id=<?=$d_id?>" style="color: #000">
                            <i class="fa fa-check"></i>
                            จัดการมีเตอร์ น้ำ/ไฟ
                        </a>
                    
                    <?php } ?>
                    </div>
                </div>
                <div class="ibox-content">


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-default" onclick="return dataItem('<?=$_GET['d_id']?>','item')">
                                        <i class="fa fa-th"></i> แสดงแบบ Item
                                    </a>
                                    <a href="#" class="btn btn-default" onclick="return dataItem('<?=$_GET['d_id']?>','list')">
                                        <i class="fa fa-list"></i> แสดงแบบรายการ
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <form style="display: inline-block;" method="post" enctype="multipart/form-data" action="import_room">
                                        <div class="input-group">

                                        <span class="input-group-addon">
                                            Import File excel (xlsx, xls, CSV). : 
                                        </span>
                                        <input required name="fileEx" type="file" class="form-control" style="display: inline-block;">
                                        <input name="d_id" type="hidden" value="<?=$_GET['d_id']?>">

                                        <span class="input-group-btn"> <button type="submit" class="btn btn-primary">Import
                                        </button> </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div id="result-data">

                        <div class="row">

                            <?php
                            $q = $this->db->where('d_id',$k_d_id)
                                          ->get('tbl_class_dorm');

                            foreach($q->result() as $key => $val){

                                $q = $this->db->where('d_id',$val->d_id)
                                              ->where('c_id',$val->c_id)
                                              ->where('re_status','1')
                                              ->get('tbl_register_dorm');
                                $row_ = $q->num_rows();

                                if($row_ >= $val->c_bed){

                                    $div_c = "btn btn-warning";
                                    $ses_resec = 1;

                                }else{

                                    $ses_resec = 0;

                                    if($val->c_status == 0){
                                        $div_c = "btn btn-success";
                                    }else if($val->c_status == 1){
                                        $div_c = "btn btn-primary";
                                    }else if($val->c_status == 3){
                                        $div_c = "btn btn-danger";
                                    }
                                }


                                $c_id = base64_encode($val->c_id);
                            ?>

                            <a href="admin-data-room?c_id=<?=$c_id?>&ses_resec=<?=$ses_resec?>" class="<?=$div_c?>" style="margin-top: 5px;">

                                <i class="fa fa-home fa-2x"></i>
                                <?=$val->c_code?>
                            </a>

                            <?php } ?>

                            <a href="admin-add-room?d_id=<?=$d_id?>" class="btn btn-white m-r-sm">
                                <i class="fa fa-plus fa-2x"></i>
                            </a>

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

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    function dataItem(d_id,type){
        if(type == 'item'){
            window.location.reload();
        }else{
            $.ajax({
                url: 'index.php/admin_dorm/dataItem',
                data: {d_id:d_id},
                type: 'POST',
                success: function(data){
                    $("#result-data").html(data);
                }
            });
            return false;
        }
    }
</script>

