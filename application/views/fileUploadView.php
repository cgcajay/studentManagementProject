<?php
$count = 1;
$coutn = 6;
for($i=1; $i<6; $i++){	
	echo $count++;
	for($j=1; $j<5; $j++){
		
	}
	echo "<br>";
}
?>
<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
 </head>  
 <body>  
      <div class="container">  
           <br /><br /><br />  
           <h3 align="center"><?php echo $title; ?></h3>  
           <form method="post" id="upload_form" align="center" enctype="multipart/form-data"> 
           		<input type="text" name="name" id="name" placeholder="Enter name">
           		<input type="text" name="mobile" id="mobile" placeholder="Enter mobile">
           		<input type="email" name="email" id="email" placeholder="Enter email address"> 
                <input type="file" name="image_file" id="image_file" />  
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>  
           <br />  
           <br />  
           <div id="uploaded_image">  
           </div><br><br>
           <div id="success"></div> 
           <div id="userData">
           	
           </div> 
      </div>  
 </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>FileUpload/ajax_upload",     
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                     	userData();
                     	$('#upload_form')[0].reset();
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });
      userData();
      function userData(){

      	$.ajax({
      		url:"<?php echo base_url(); ?>FileUpload/userData",
      		method:"post",
      		dataType:"json",
      		success:function(data){
      			var html = '';
      			var i;
      			html +='<table><tr><th>Image</th><th>Name</th><th>Mobile</th><th>Email</th><th>Action</th></tr>';
      			for(i=0; i<data.length; i++){
      				html +='<tr><td><img src="<?php echo base_url(); ?>upload/'+data[i].file_name+'" width="300" height="225" class="img-thumbnail"></td><td>'+data[i].name+'</td><td>'+data[i].mobile+'</td><td>'+data[i].email+'</td><td><button type="button" class="btn btn-success delete" value='+data[i].id+'>Delete</button></td></tr>';
      			}
      			html +='</table>';
      			$('#userData').html(html);

      		}
      	});
      } 

      $(document).on('click','.delete', function(){
      	var del = $(this).val();
      	if(confirm("Are you sure delete this record"))
      	{
      		$.ajax({
      		url:"<?php echo base_url(); ?>FileUpload/userDeleteId",
      		method:"post",
      		data:{del:del},
      		success:function(data){
      			$('#success').addClass("alert alert-success");
      			$('#success').html(data);
      			userData();
      		}
      	});
      	}
      	else
      	{
      		return false;
      	}
      	
      }) 
 });  
 </script>  