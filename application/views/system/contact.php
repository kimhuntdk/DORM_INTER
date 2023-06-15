<?php $this->load->view('template/user/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ติดต่อเรา</h2>
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
                        <i class="fa fa-flask"></i>
                        ติดต่อเรา
                    </h5>
                </div>
                <div class="ibox-content">
                    <?=$rs[0]->g_data?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/user/lib-footer'); ?>

