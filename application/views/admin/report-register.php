<?php $this->load->view('template/admin/lib-top'); ?>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
    <h2>รายงานการสมัครเข้าจองหอพัก</h2>
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
                        Search
                    </h5>
                </div>
                <div class="ibox-content">
                <form class="form-horizontal" action="search-register" method="get">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-3">
                            <label>ตั้งแต่วันที่ :</label> <input required type="text" placeholder="Date start" name="date_start" id="date_start" class="form-control" value="<?php if(@$_GET['date_start'] != ""){echo @$_GET['date_start'];} ?>"></div>
                            <div class="col-md-3">
                            <label>ถึงวันที่ :</label><input required type="text" placeholder="Date end" name="date_end" id="date_end" class="form-control" value="<?php if(@$_GET['date_end'] != ''){echo @$_GET['date_end'];} ?>"></div>

                            <div class="col-md-3">
                                <label>เลือกหอพักที่รับผิดชอบ :</label>
                                <?php if($_COOKIE['level'] == 0){ ?>    

                                <select name="d_id" class="form-control">
                                    <option value="0">--หอทั้งหมด--</option>
                                    <?php foreach($rs_dorm as $k => $v){ ?>

                                    <option value="<?=$v->d_id?>">
                                        <?=$v->d_name?> (<?=$v->d_position?>)
                                    </option>

                                    <?php } ?>
                                </select>
                                <?php }else if($_COOKIE['level'] == 1){ ?>

                                <select name="d_id" class="form-control">

                                    <?php foreach($rs_dorm as $k => $v){ ?>
                                    <?php
                                    $q = $this->db->where('d_id',$v->d_id)->get('tbl_dorm');
                                    $r = $q->result();
                                    ?>

                                    <option value="<?=$r[0]->d_id?>">
                                        <?=$r[0]->d_name?> (<?=$r[0]->d_position?>)
                                    </option>

                                    <?php } ?>
                                </select>

                                <?php } ?>

                            </div>

                            <div class="col-md-3">

                                <button type="submit" class="btn btn-success" style="margin-top: 20px;">Search</button>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                </form>

                </div>

            </div>

        	<div class="i-box">
                <div class="ibox-title">
                    <h5>
                        <i class="fa fa-th"></i>
                        รายงานการสมัครเข้าจองหอพัก
                    </h5>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover dataTables-example1" style="margin-top: 15px;">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ชื่อหอพัก</th>
                            <th>เลขห้องพัก</th>
                            <th>ประเภทหอพัก</th>
                            <th>วันที่เข้าพัก</th>
                            <th>สถานะ</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(@$rs != ""){ ?>
                        <?php 
                        foreach($rs as $key => $val){ 
                            $q = @$this->db->where('d_id',$val->d_id)
                                          ->get('tbl_dorm');
                            $dorm = @$q->result();

                            $q2 = $this->db->where('c_id',$val->c_id)
                                           ->get('tbl_class_dorm');
                            $class = $q2->result();
                        ?>

                        <tr>
                            <td><?=($key+1)?></td>
                            <td><?=$val->re_code?></td>
                            <td>
                                <?=$val->re_fname." ".$val->re_lname?>
                            </td>
                            <td>
                                <?=$dorm[0]->d_name?> (<?=$dorm[0]->d_position?>)
                            </td>
                            <td><?=$class[0]->c_code?></td>
                            <td>
                                <?=$dorm[0]->d_type?>
                                (
                                <?php
                                if($dorm[0]->d_type_gender == 'male'){
                                    echo "หอชาย";
                                }else{
                                    echo "หอหญิง";
                                }
                                ?>
                                )
                            </td>
                            <td>
                                <?=$val->re_date_success?>
                            </td>
                            <td>
                                <label class="label label-primary">
                                    เข้าหอพักเรียบร้อย
                                </label>
                            </td>
                        </tr>

                        <?php } ?>
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

<script type="text/javascript">
    $(function(){
        $("#date_start").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#date_end").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });

    $(document).ready(function(){
            $('.dataTables-example1').DataTable({
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


