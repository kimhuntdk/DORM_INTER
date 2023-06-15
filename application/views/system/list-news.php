<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข่าวประชาสัมพันธ์</h2>
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
                        ข่าวประชาสัมพันธ์
                    </h5>
                    <div class="ibox-tools">
                        <a href="add-news" style="color:#000">
                            <i class="fa fa-plus"></i>
                            เพิ่มข่าว
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ลำดับข่าว</th>
                        <th>รายละเอียด</th>
                        <th>วันที่</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($rs as $key => $value) {
                    ?>
                    <tr class="gradeX">
                        <td>
                            <?=($key+1)?>
                        </td>
                        <td>
                            <?=$value->data_news?>
                        </td>
                        <td>
                            <?=$value->n_date?>
                        </td>
                        <td class="right">
                            <div class="btn-group">
                                <a href="edit-news?n_id=<?=base64_encode($value->n_id)?>" class="btn-info btn btn-xs">Edit</a>
                                <a onclick="return confirm('ยืนยันการลบข่าวประชาสัมพันธ์?')" href="del_news_byID?n_id=<?=base64_encode($value->n_id)?>" class="btn-danger btn btn-xs">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('template/admin/lib-footer'); ?>

