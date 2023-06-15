<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข้อมูลทั่วไป</h2>
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
                        <i class="fa fa-list"></i>
                        ข้อมูลทั่วไป
                    </h5>
                    <div class="ibox-tools">
                        class="img-responsive"
                    </div>
                </div>
                <div class="ibox-content">

                <form id="frm_register" class="form-horizontal" action="update_genaral" method="post">

                    <?php
                    foreach ($rs as $key => $value) {
                        $label = "";
                        if($key == 0){
                            $label = "Dialog Welcome";
                            $class = "dialog";
                            $id = "data-dialog";
                        }else if($key == 1){
                            $label = "ขั้นตอนสมัครหอพัก";
                            $class = "help-register";
                            $id = "data-help-register";
                        }else if($key == 2){
                            $label = "ติดต่อเรา";
                            $class = "contact";
                            $id = "data-contact";
                        }else if($key == 3){
                            $label = "เกียวกับเรา";
                            $class = "about";
                            $id = "data-about";
                        }else if($key == 4){
                            $label = "Confirm Register";
                            $class = "confirm";
                            $id = "data-confitm";
                        }else if($key == 5){
                            $label = "How to Print";
                            $class = "print";
                            $id = "data-print";
                        }
                        else if($key == 6){
                            $label = "Policy regis";
                            $class = "lop";
                            $id = "data-lop";
                        }
                        
                    ?>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <?=$label?> :
                    </label>
                        <div class="col-sm-10">

                            <div class="ibox-content no-padding">
                                <div class="<?=$class?>">
                                    <?=$value->g_data?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <input name="g_data[]" id="<?=$id?>" type="hidden">

                    <input name="g_id[]" type="hidden" value="<?=$value->g_id?>">

                    <?php } ?>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">
                        
                    </label>
                        <div class="col-sm-10">

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i>
                            บันทึก
                        </button>
                        <button class="btn btn-danger">
                            <i class="fa fa-close"></i>
                            ยกเลิก
                        </button>
                            
                        </div>
                    </div>

                </form>
                    
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">

    $(document).ready(function(){

        $('.dialog').summernote();
        $('.help-register').summernote();
        $('.contact').summernote();
        $('.about').summernote();
        $('.confirm').summernote();
        $('.print').summernote();
        $('.lop').summernote();

        $(".i-box").mouseover(function(){
            $("#data-dialog").val($(".dialog").code());
            $("#data-help-register").val($(".help-register").code());
            $("#data-contact").val($(".contact").code());
            $("#data-about").val($(".about").code());
            $("#data-confitm").val($(".confirm").code());
            $("#data-print").val($(".print").code());
            $("#data-lop").val($(".lop").code());
        });
    });

    function update_news(){
        var data_news = $("#data-news").val();
        var n_id = $("#n_id").val();
        $.ajax({
            url: 'index.php/admin_system/update_news',
            data: {data_news:data_news,n_id:n_id},
            type: 'POST',
            success: function(data){
                window.location.href='list-news';
            }
        });
        return false;
    }

</script>

