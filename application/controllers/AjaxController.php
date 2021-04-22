<script src="https://code.jquery.com/jquery-latest.js"></script>
<base href="http://localhost/Nam/todolist/">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

	$(document).ready(function()
	{

		//them
        $("#newTaskbtnPublic").click(function()
        {
            var jobName = document.getElementById("newTasktxtPublic").value;
            var jobType = 1;
            if(jobName != "")
            {
            	$.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/insert",
                    method:"POST",
                    data: {"jobName" : jobName, "jobType": jobType},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
            }
        });
  
        //xoa
        $(".deleteBtnPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            $.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/delete",
                    method:"POST",
                    data: {"jobId" : jobId},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
        });

        //checkbox
        $(".cbTaskPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            var status = 0;
            if($(this).prop("checked"))//da check ==> status la da xong
            {
            	status = 1;
            } else //bo check ==> status chinh lai la chua xong
            {
            	status = 0;
            }
            $.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/updateStatus",
                    method:"POST",
                    data: {"jobId" : jobId, "status" : status},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
        });

        //modal
        $(".editBtnPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/loadModalEdit",
                    method:"POST",
                    data: {"jobId" : jobId},
                    dataType: 'json',
                    success: function(data)
                    {
                            $('.editModalPublic').modal('show');
                            $('#nameTxt').val(data.job_name);
                            $('#startdateTxt').val(data.job_startdate);
                            $('#enddateTxt').val(data.job_enddate);
                            $('#contentTxt').val(data.job_content);
                            $('#nameTxt').attr("anlong", jobId);

                            //comment 
                            $('.commentArea').html(data.commentArea);

                            //partner
                            $('.partnerArea').html(data.partnerArea);

                            //file
                            $('.fileArea').html(data.fileArea);
                    }
                });
        });
        //them Private
        $("#newTaskbtnPrivate").click(function()
        {
            var jobName = document.getElementById("newTasktxtPrivate").value;
            var jobType = 0;
            if(jobName != "")
            {
                $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/insert",
                    method:"POST",
                    data: {"jobName" : jobName, "jobType": jobType},
                    success: function(data)
                    {
                            location.reload();
                    }
                });
            }
        });
  
        //xoa Private
        $(".deleteBtnPrivate").click(function()
        {
            var jobId = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/delete",
                    method:"POST",
                    data: {"jobId" : jobId},
                    success: function(data)
                    {
                            location.reload();
                    }
                });
        });

        //checkbox Private
        $(".cbTaskPrivate").click(function()
        {
            var jobId = $(this).attr("anlong");
            var status = 0;
            if($(this).prop("checked"))//da check ==> status la da xong
            {
                status = 1;
            } else //bo check ==> status chinh lai la chua xong
            {
                status = 0;
            }
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updateStatus",
                    method:"POST",
                    data: {"jobId" : jobId, "status" : status},
                    success: function(data)
                    {
                            location.reload();
                    }
                });
        });

        //modal Private
        $(".editBtnPrivate").click(function()
        {
            var jobId = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/loadModalEdit",
                    method:"POST",
                    data: {"jobId" : jobId},
                    dataType: 'json',
                    success: function(data)
                    {
                            $('.editModalPublic').modal('show');
                            $('#nameTxt').val(data.job_name);
                            $('#startdateTxt').val(data.job_startdate);
                            $('#enddateTxt').val(data.job_enddate);
                            $('#contentTxt').val(data.job_content);
                            $('#nameTxt').attr("anlong", jobId);

                            //comment 
                            $('.commentArea').html(data.commentArea);

                            //partner
                            $('.partnerArea').html(data.partnerArea);

                            //file
                            $('.fileArea').html("hello");
                    }
                });
        });
        //sua ten 
        $("#nameTxt").change(function()
        {
            var stringVal = $(this).val();
            var string = "job_name";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/update",
                    method:"POST",
                    data: {"jobId" : jobId, "stringVal" : stringVal, "string" : string},
                    dataType: 'json',
                    success: function(data)
                    {
                        
                    }
                });
        });

        //sua mo ta
        $("#contentTxt").change(function()
        {
            var stringVal = $(this).val();
            var string = "job_content";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/update",
                    method:"POST",
                    data: {"jobId" : jobId, "stringVal" : stringVal, "string" : string},
                    dataType: 'json',
                    success: function(data)
                    {
                        
                    }
                });
        });

        //them comment
        $("#commentBtn").click(function()
        {
            var content = $('#commentTxt').val();
            var jobId = $('#nameTxt').attr("anlong");
                $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/insertComment",
                    method:"POST",
                    data: {"content" : content, "jobId" : jobId},
                    success: function(data)
                    {
                        $('.commentArea').html(data);
                        $('#commentTxt').val("");
                    }
                });
        });

        //edit comment
        $(document).on("click", ".editCommentBtn", function()
        {            
            var cmId = $(this).attr("anlong");
            var cmtContentId = ".cmt" + cmId;
            var cmtContent = $(cmtContentId).val();

            $('#contentEditModal').val(cmtContent);
            $('.saveEditCmtModal').attr("anlong", cmId)

            $('.editCmtModal').modal({
            backdrop: 'static'
            });
        });
        $(document).on("click", ".closeEditCmtModal", function()
        {            
            $('.editCmtModal').modal('hide');
        });
        $(document).on("click", ".saveEditCmtModal", function()
        {            
            var content = $('#contentEditModal').val();
            var cmId = $(this).attr("anlong");
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updateCmt",
                    method:"POST",
                    data: {"cmId" : cmId, "content" : content, "jobId" : jobId},
                    success: function(data)
                    {
                        $('.commentArea').html(data);
                        $('.editCmtModal').modal('hide');
                    }
                });
            //$('.editCmtModal').modal('hide');
        });

        //delete comment
        $(document).on("click", ".deleteCommentBtn", function()
        {
            var cmId = $(this).attr("anlong");
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/deleteComment",
                    method:"POST",
                    data: {"cmId" : cmId, "jobId" : jobId},
                    success: function(data)
                    {
                        $('.commentArea').html(data);
                    }
                });
        });

        //thanhvien modal
        $("#thanhvienBtn").click(function()
        {
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/loadModalNhanvien",
                    method:"POST",
                    data: {"jobId" : jobId},
                    success: function(data)
                    {
                        $('.partnerModal').modal({
                            backdrop: 'static'
                        });
                            $('.partnerModalBody').html(data);
                    }
                });
        });
        $(document).on("click", ".closePartnerModal", function()
        {            
            $('.partnerModal').modal('hide');
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/loadreadPartner",
                    method:"POST",
                    data: {"jobId" : jobId},
                    success: function(data)
                    {
                        $('.partnerArea').html(data);
                    }
                });
        });
        //them nhan vien chua co vao job
        $(document).on("click", ".addNvModalBtn", function()
        {            
            var jobId = $('#nameTxt').attr("anlong");
            var nvId = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updatePartner",
                    method:"POST",
                    data: {"jobId" : jobId, "nvId" : nvId},
                    success: function(data)
                    {
                        $('.partnerModalBody').html(data);
                    }
                });
        });

        //xoa nhan vien khoi job
        $(document).on("click", ".removePartnerBtn", function()
        {         
            var jobId = $('#nameTxt').attr("anlong");   
            var nvId = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/removePartner",
                    method:"POST",
                    data: {"jobId" : jobId, "nvId" : nvId},
                    success: function(data)
                    {
                        $('.partnerArea').html(data);
                    }
                });
        });

        //event when hire modal
        $(".editModalPublic").on("hidden.bs.modal", function () 
        {
            location.reload();
        });

        //update start date
        $("#startdateTxt").change(function()
        {
            var startDate = $(this).val();
            var endDate = $("#enddateTxt").val();
            var string = "job_startdate";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updateDate",
                    method:"POST",
                    data: {"jobId" : jobId, "startDate" : startDate, "string" : string, "endDate" : endDate},
                    success: function(data)
                    {
                        $("#dateError").val(data);
                    }
                });
        });
        $("#resetStartdate").click(function()
        {
            var stringVal = "0000-00-00";
            $("#startdateTxt").val(stringVal);
            var string = "job_startdate";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/update",
                    method:"POST",
                    data: {"jobId" : jobId, "stringVal" : stringVal, "string" : string},
                    success: function(data)
                    {
                        
                    }
                });
        });

        //update enddate
        $("#enddateTxt").change(function()
        {
            var endDate = $(this).val();
            var startDate = $("#startdateTxt").val();
            var string = "job_enddate";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updateDate",
                    method:"POST",
                    data: {"jobId" : jobId, "startDate" : startDate, "string" : string, "endDate" : endDate},
                    success: function(data)
                    {
                        $("#dateError").val(data);
                    }
                });
        });
        $("#resetEnddate").click(function()
        {
            var stringVal = "0000-00-00";
            $("#enddateTxt").val(stringVal);
            var string = "job_enddate";
            var jobId = $('#nameTxt').attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/update",
                    method:"POST",
                    data: {"jobId" : jobId, "stringVal" : stringVal, "string" : string},
                    success: function(data)
                    {
                        
                    }
                });
        });

        //xoa file khoi job
        $(document).on("click", ".removeFileBtn", function()
        {         
            var jobId = $('#nameTxt').attr("anlong");   
            var fileTxt = $(this).attr("anlong");
            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/removeFile",
                    method:"POST",
                    data: {"jobId" : jobId, "fileTxt" : fileTxt},
                    success: function(data)
                    {
                        $('.fileArea').html(data);
                    }
                });
        });

        //choose file
        $(document).on("click", "#chooseFileBtn", function()
        {         
            $("#fileInput").click();
        });

        //save file
        $(document).on("click", "#saveFileBtn", function()
        {         
            var jobId = $('#nameTxt').attr("anlong");   
            var fullFile = $("#fileInput")[0].files[0];
            var fileName = "";
            var fd = new FormData();
            if(!jQuery.isEmptyObject(fullFile))
            {
                fileName = fullFile.name;
            }
            fd.append('jobId', jobId);
            fd.append('fullFile', fullFile);
            fd.append('fileName', fileName);

            $.ajax(
                {
                    url:"<?= base_url()?>index.php/JobController/updateFile",
                    method:"POST",
                    data: fd,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data)
                    {
                        $('.fileArea').html(data.fileArea);
                        $('#fileErr').html(data.fileErr);
                    }
                });
        });

        //download file
        

    });
</script>