<!DOCTYPE html>
<html>
<head>
	<title>How to insert data in codeigniter using Ajax, Jquery </title>
	<!-- Now Add cdn of bootstrap and jquery -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>

			<div class="col-sm-8">
				<div class="text-center" style="font-size: 31px;">CRUD operation in Codeigniter using Ajax, jQuery and MySql</div>
				<div id="success"></div>
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label>Mobile:</label>
					<input type="text" name="mobile" id="mobile" class="form-control">
				</div>

				<div class="form-group">
					<label>Email:</label>
					<input type="text" name="email" id="email" class="form-control">
					<input type="hidden" name="single" id="single">
				</div>

				<button type="button" class="form-control btn btn-success" id="submit" name="submit" value="submit">Submit</button>
			</div>
			<div class="col-sm-2"></div>
		</div><br/>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<p><input type="search" name="search" id="search" placeholder="Search data by name" style="margin-left: 74%;"></p>
				<div id="searchData">
					
				</div>
				<div id="showData">
				
			</div>
			<div class="col-sm-2"></div>
			</div>
			
		</div>
		
	
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#search').keyup(function(){

				$('#showData').hide();
					var searchData = $('#search').val();
				$.ajax({
					url:"<?php echo base_url(); ?>Test/searchData",
					method:"post",
					data:{searchData:searchData},
					success:function(datadd){
						var conVartData = JSON.parse(datadd);
						var html = '';
						var i = '';
						html +='<table class="table table-striped"><tr><th>Name</th><th>Mobile</th><th>Email</th><th>Action</th></tr>';
						for(i=0; i<conVartData.length; i++)
						{
							html +='<tr><td>'+conVartData[i].name+'</td><td>'+conVartData[i].mobile+'</td><td>'+conVartData[i].email+'</td><td><p class="delete" id='+conVartData[i].id+'><i class="fa fa-trash" style="font-size:24px;color:red;"></i></p>&nbsp;<button type="button" class="btn btn-success edit" id='+conVartData[i].id+'>Edit</button></td></tr>';
													
						}
						$('#searchData').html(html);


					}
				});
				
				
			});



			$('#submit').click(function(){
				var submit = $(this).val();
				var singleID = $('#single').val();
				var name = $('#name').val();
				var mobile = $('#mobile').val();
				var email = $('#email').val();
				$.ajax({
					url: "<?php echo base_url() ?>Test/insertData",
					method: "post",
					data: {submit: submit, singleID: singleID, name: name, mobile:mobile, email: email},
					success: function(data){
						$('#name').val("");
						$('#mobile').val("");
						$('#email').val("");
						$('#success').addClass("alert alert-success");
						if($('#submit').val() == "submit")
						{
							$('#success').text("Data inserted successfully");
						}
						else
						{
							$('#success').text("Data updated successfully");
						}
						$('#submit').addClass("btn btn-success");
						$('#submit').text("Submit");
						$('#submit').val("submit");
						if($('#showData').hide())
						{
							$('#showData').show();
						}
						
						getData();

					}
				});
			});

			getData();
			function getData(){
				$.ajax({
					url:"<?php echo base_url(); ?>test/getData",
					method:"post",
					dataType: "json",
					success:function(data){
						var html='';
						var i;
						var count= 1;
						html+='<table class="table table-striped"><tr><th>Name</th><th>Mobile</th><th>Email</th><th>Action</th><th></th></tr>';
						for(i in data){

							html+='<tr><td>'+data[i].name+'</td><td>'+data[i].mobile+'</td><td>'+data[i].email+'</td><td><p class="delete" id='+data[i].id+'><i class="fa fa-trash"style="font-size:24px;color:red;"></i></p></td><td><p class="edit" id='+data[i].id+'><i class="fa fa-edit" style="font-size:24px;"></i></p></td></tr>';
						}
						html+='</table>';
						$('#showData').html(html);
					}
				});
			}
			// In this tutorial you will learn how to delete data from the database in codeigniter using Ajax, jQuery . Now Start////
			$(document).on('click','.delete', function(){
				var delId = $(this).attr("id");
				if(confirm("Are you sure delete this record! If yes then click'ok'"))
				{
					$.ajax({
					url:"<?php echo base_url(); ?>test/deleteUserData",
					method:"post",
					data:{delId: delId},
					success:function(data){
						$('#success').addClass("alert alert-success");
						$('#success').text("Data deleted successfully");
						$('#success').fadeOut(3000);
						getData();
					}
				});
				}
				else
				{
					return false;
				}
				
			});
			// update data in codeigniter using Ajax, jQuery 
			$(document).on('click', '.edit', function(){
				var eID = $(this).attr("id");
				$.ajax({
					url:"<?php echo base_url(); ?>test/fetchSingleData",
					method:"post",
					data:{eID: eID},
					dataType:"json",
					success:function(data){
						var i;
						for(i in data)
						{
							$('#name').val(data[i].name);
							$('#mobile').val(data[i].mobile);
							$('#email').val(data[i].email);
						}
						$('#single').val(eID);
						$('#submit').text("Update");
						$('#submit').val("update");
						$('#showData').hide();

					}
				});
			});
		});
	</script> 

</body>
</html>
