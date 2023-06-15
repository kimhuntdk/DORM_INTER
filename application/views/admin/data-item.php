<style type="text/css">
	.chb{
		height: 20px;
		width: 20px;
	}
</style>

<strong>ทั้งหมด <?=$row?> ห้อง</strong>
<hr>

<form id="frm_class">
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr bgcolor="#eee">
			<th width="10%">
				<center>
					<label>
						<input class="chb" id="checkAll" name="" type="checkbox"> &nbsp; ทั้งหมด
					</label>
				</center>
			</th>
			<th width="50%">
				<center>รหัสห้อง</center>
			</th>
			<th width="20%">
				<center>Action</center>
			</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 

		foreach($rs as $key => $val){ 
			$q = $this->db->where('d_id',$val->d_id)
						  ->where('c_id',$val->c_id)
						  ->where('re_status','1')
						  ->get('tbl_register_dorm');
			$row_reg = $q->num_rows();

		?>



		<tr align="center">
			<td>
				<?php if($row_reg != 0){ ?>
					<i class="fa fa-ban fa-2x"></i>
				<?php }else{ ?>
					<input class="chb" name="selected[]" type="checkbox" value="<?=$val->c_code?>">
				<?php } ?>
				<input name="d_id" type="hidden" value="<?=$val->d_id?>">

			</td>
			<td><?=$val->c_code?></td>
			<td>
				<?php if($row_reg != 0){ ?>

					<span style="color">
						<i class="fa fa-ban"></i> มีนิสิตพักอยู่ ไม่สามารถลบได้
					</span>

				<?php }else{ ?>
					<a href="#" onclick="return delete_byId('<?=$val->d_id?>','<?=$val->c_code?>')" class="btn btn-danger">
						<i class="fa fa-trash"></i> Delete
					</a>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		<tr align="center">
			<td colspan="3">
				<button onclick="return deleteAll()" class="btn btn-danger">
					<i class="fa fa-trash"></i> ลบรายการที่เลือก
				</button>
			</td>
		</tr>
	</tbody>
</table>
</form>

<script type="text/javascript">
	$(function(){
        $("#checkAll").click(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
    });

    function delete_byId(d_id,c_code){
    	if(confirm('ยืนันการลบรายการที่เลือก?')){
    		$.ajax({
	    		url: 'index.php/admin_dorm/delete_byId',
	    		data: {d_id:d_id,c_code:c_code},
	    		type: 'POST',
	    		success: function(data){
	    			window.location.reload();
	    		}
	    	}); return false;
    	}
    }

    function deleteAll(){
    	if(confirm('ยืนันการลบรายการที่เลือก?')){
	    	$.ajax({
	    		url: 'index.php/admin_dorm/deleteAll',
	    		data: $("#frm_class").serialize(),
	    		type: 'POST',
	    		success: function(data){
	    			window.location.reload();
	    		}
	    	}); return false;
    	}return false;
    }
</script>