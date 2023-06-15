<div class="modal inmodal" id="modal-upload" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-upload modal-icon"></i>
                <h4 class="modal-title">
                    Upload File
                </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="save_upload" enctype="multipart/form-data" accept-charset="utf-8">
                    <label>
                        เลือกไฟล์ JPG,PNG,GIF,PDF,DOC,PPT,CSV.RAR.ZIP (เลือกไฟล์ได้มากกว่า 1 ไฟล์)
                    </label>
                    <input name="file[]" multiple type="file" class="form-control" required>
                    <center>
                    <button class="btn btn-primary" style="margin-top: 10px;">
                        <i class="fa fa-check"></i>
                        บันทึก
                    </button>
                    </center>
                </form> 
            </div>

            <div class="modal-footer">
                <span style="color:red">
                    ชื่อไฟล์ต้องเป็น EN หรือ 0-9 เท่านั้น
                </span>
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>