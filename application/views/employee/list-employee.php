<?php $this->load->view('template/admin/lib-top'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>ข้อมูลเจ้าหน้าที่</h2>
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
                        ข้อมูลเจ้าหน้าที่
                    </h5>
                    <div class="ibox-tools">
                        <a href="add-employee" style="float: right;color:#000">
                            <i class="fa fa-plus"></i> เพิ่มเจ้าหน้าที่
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($rs as $key => $value) {
                                $m_id = base64_encode($value->m_id);
                            ?>
                            <tr>
                                <td><?=($key+1)?></td>
                                <td><?=$value->m_code?></td>
                                <td><?=$value->m_fullname?></td>
                                <td><?=$value->m_position?></td>
                                <td><?=$value->m_username?></td>
                                <td>
                                    <i class="fa fa-close fa-2x"></i>
                                </td>
                                <td class="text-right footable-visible footable-last-column">
                                    <div class="btn-group">
                                        <a href="edit-employee?m_id=<?=$m_id?>" class="btn-info btn btn-xs">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a onclick="return confirm('ยืนยันการลบข้อมูลพนักงาน?')" href="del_manager_byID?m_id=<?=$m_id?>" class="btn-danger btn btn-xs">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </a>
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