<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ไฟล์ระบบ</h2>
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

        	<div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                               
                                <button id="upload" class="btn btn-primary btn-block">Upload Files</button>
                                <div class="hr-line-dashed"></div>
                                <h5>Folders</h5>
                                <ul class="folder-list" style="padding: 0">
                                    <li><a href=""><i class="fa fa-folder"></i> Files</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Pictures</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Web pages</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Illustrations</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Films</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Books</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                          
                <?php
                foreach ($rs as $k => $val) {
                ?>
                <div class="file-box">
                    <div class="file">
                        <a target="_blank" href="file-system/<?=$val->f_name?>">
                        <span class="corner"></span>

                        <?php
                        if(preg_match('/jpg/', $val->f_name) or preg_match('/png/', $val->f_name) or preg_match('/gif/', $val->f_name) or preg_match('/JPG/', $val->f_name) or preg_match('/PNG/', $val->f_name) or preg_match('/GIF/', $val->f_name)){
                        ?>
                        <div class="image">
                            <img alt="image" class="img-responsive" src="file-system/<?=$val->f_name?>">
                        </div>
                        <?php }else{ ?>

                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>

                        <?php } ?>
                        <div class="file-name">
                            <?=$val->f_name?>
                            <br/>
                            <small>
                            <?=$val->f_date?>
                            <span style="float: right">
                                <a onclick="return confirm('ยืนยันการลบไฟล์?')" href="del_file_byID?f_id=<?=base64_encode($val->f_id)?>" style="float: right">
                                <i class="fa fa-trash"></i>
                                ลบ
                                </a>
                            </span>
                            </small>
                        </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<span id="result-data"></span>

<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">
    $("#upload").click(function(){

        $.ajax({
            url: 'index.php/admin_system/upload',
            success: function(data){
                $("#result-data").html(data);
                $("#modal-upload").modal('show');
            }
        });
        return false;

    });
</script>

