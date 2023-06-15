<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>แก้ไขข่าวประชาสัมพันธ์</h2>
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
                        <i class="fa fa-edit"></i>
                        แก้ไขข่าวประชาสัมพันธ์
                    </h5>
                    <div class="ibox-tools">
                        <a href="#"
                        onclick="return update_news()" style="float:right;color:#fff" class="label label-primary" style="color:#000">
                            <i class="fa fa-check"></i>
                            บันทึกการแก้ไข
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                <div class="ibox-content no-padding">

                    <div class="summernote">
                        <?=$rs[0]->data_news?>
                    </div>

                </div> 
                <input name="" id="data-news" type="hidden">
                <input name="" id="n_id" type="hidden" value="<?=$rs[0]->n_id?>">
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

