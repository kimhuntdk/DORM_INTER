<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>เพิ่มข่าวประชาสัมพันธ์</h2>
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
                        <i class="fa fa-plus"></i>
                        เพิ่มข่าวประชาสัมพันธ์
                    </h5>
                    <div class="ibox-tools">
                        <a href="add-news"
                        onclick="return save_news()" style="float:right;color:#fff" class="label label-primary" style="color:#000">
                            <i class="fa fa-check"></i>
                            บันทึก
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                <div class="ibox-content no-padding">

                    <div class="summernote">
                        
                    </div>

                </div> 
                <input name="" id="data-news" type="hidden">
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

<script type="text/javascript">

    $(document).ready(function(){

        $('.summernote').summernote();

        $(".i-box").mouseover(function(){
            $("#data-news").val($(".summernote").code());
        });
    });

    function save_news(){
        var data_news = $("#data-news").val();
        $.ajax({
            url: 'index.php/admin_system/save_news',
            data: {data_news:data_news},
            type: 'POST',
            success: function(data){
                window.location.href='list-news';
            }
        });
        return false;
    }

</script>

