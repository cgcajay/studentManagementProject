<!DOCTYPE html>
<html>
<head>
	<title>Submit form data with image in codeigniter using Ajax, jQuery</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body style="background-color: bisque;">
	<div class="container">
		<div class="row" style="margin-top: 65px;background-color: burlywood;padding-bottom: 25px;">
			<div id="UpdateData" style="margin-left: 45%;"></div>
			<!-- <div id="logoutMessage"></div> -->
			<?php
			if($this->session->userdata('username'))
			{
				$data = $this->session->userdata('username');
				if(is_array($data))
				{
					foreach($data as $result)
				{
					?>
					<div class="center" style="font-size: 54px; font-style: oblique;
                        font-family: serif; margin-left: 259px;">Welcome to dashboard</div>
					<div class="col-sm-4">

						
                        <?php echo '<img src="'.base_url().'upload/'.$result->file_name.'" width="300" height="225" style="width:191px;" class="img-thumbnail">'; ?>
                        <h3 style="font-size: 15px;"><?php
						 echo $result->name.'<br>';
						 echo "Student Id:&nbsp;";
						 echo $result->id;
						  ?></h3>
						
						<!-- DropDown list  -->
						<div><a href="#dashboard"  id="dashboard" style="text-decoration: none;">Dashboard</a></div>
						<div><a href="#Personal" id="personoalInformation" style="text-decoration: none;">Personal Information</a></div>
						<div><a href="#student" id="srecord" style="text-decoration: none;">Student Record</a></div>
						<div><a href="#attendence" id="sattendence" style="text-decoration: none;">Attendence</a></div>
						<div><a href="#feeStructure" id="sfeeStructure" style="text-decoration: none;">Student Fee Structure</a></div>
						<div><a href="#Reset" id="resetpassword" style="text-decoration: none;">Reset Passwprd</a></div>
						<div><a href="<?php echo base_url(); ?>FileUploadController/logoutUser" id="logout" style="text-decoration: none;">Logout</a></div>
						<!-- End DropDown list -->
						
					</div>
					<div class="col-sm-8">


						<!-- dashboard content -->
							<div id="dashboardContent">
								<div class="col-sm-4">
								<table style="margin-top: 75px;">
									<tr>
										<th style="font-size: 21px;color: blue;">Latest News</th>
									</tr>
									<tr>
										<td><p style="text-align: justify;">An abstract class is a class that contains at least one abstract method, which is a method without any actual code in it, just the name and the parameters, and that has been marked as "abstract".</p></td>
									</tr>
								</table>
								<div>
									<h3 style="color: blue;">Thoughts</h3>
								</div>
								</div>
								<div class="col-sm-4" style="margin-top: 78px; margin-left: 179px; font-size: 21px; color: blue;">
									<div>
										<h3>Calender</h3>
									</div>
									<div>
										<h3>Birthday wishes</h3>
									</div>

								</div>
							</div>


						<!-- End dashboard content -->
						<!-- Personal Information -->
						<div id="spInformation">
							<table style="margin-top: 95px; background-color: blanchedalmond;" class="table table-bordered">
								<tr>
									<th>Name</th>
									<th>Mobile</th>
									<th>Email</th>
								</tr>
								<tr>
									<td><?php echo $result->name; ?></td>
									<td><?php echo $result->mobile; ?></td>
									<td><?php echo $result->email; ?></td>
								</tr>
							</table>
						</div>

						<!-- End Personal Information -->

						<!-- Student Semester Record -->
						<div id="studentSemesterRecord">
							<div class="col-sm-6" style="margin-top: 89px;">
							<table class="table table-bordered" style="background-color: blanchedalmond;">
								<tr>
									<th>Semester</th>
									<th>Obtained Marks</th>
								</tr>
								<tr>
									<th>Sem-1</th>
									<td><a href="#sgpa" style="text-decoration: none;" id="sem1">65.1&nbsp;sgpa</a></td>
								</tr>
								<tr>
									<th>Sem-2</th>
									<td><a href="#sgpa" style="text-decoration: none;" id="sem2">65.1&nbsp;sgpa</a></td>
								</tr>
								<tr>
									<th>Sem-3</th>
									<td><a href="#sgpa" style="text-decoration: none;" id="sem3">65.1&nbsp;sgpa</a></td>
								</tr>
								<tr>
									<th>Sem-4</th>
									<td><a href="#sgpa" style="text-decoration: none;" id="sem4">65.1&nbsp;sgpa</a></td>
								</tr>
								<tr>
									<th>Sem-5</th>
									<td><a href="#sgpa" style="text-decoration: none;" id="sem5">65.1&nbsp;sgpa</a></td>
								</tr>
								
							</table>
							<button type="button" id="hideResultData" style="margin-left: 250px;" class="btn btn-success">Hide Result</button>
							</div>
							<div class="col-sm-6">
								<div id="showSemester1">
								<h3 style="padding-left: 121px;margin-top: 42px;font-style: italic; color: cornflowerblue;">Semester result</h3>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Program Name</th>
										<th>Total Marks</th>
										<th>Ontained Marks</th>
										<th>Grade</th>
									</tr>
									<tr>
										<td>1</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>2</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>3</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>4</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>5</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
								</table>
								</div>

								<div id="showSemester2">
								<h3 style="padding-left: 121px;margin-top: 42px;font-style: italic; color: cornflowerblue;">Semester result</h3>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Program Name</th>
										<th>Total Marks</th>
										<th>Ontained Marks</th>
										<th>Grade</th>
									</tr>
									<tr>
										<td>1</td>
										<td>OOPS</td>
										<td>100</td>
										<td>85</td>
										<td>A</td>
									</tr>
									<tr>
										<td>2</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>3</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>4</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>5</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
								</table>
								</div>


								<div id="showSemester3">
								<h3 style="padding-left: 121px;margin-top: 42px;font-style: italic; color: cornflowerblue;">Semester result</h3>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Program Name</th>
										<th>Total Marks</th>
										<th>Ontained Marks</th>
										<th>Grade</th>
									</tr>
									<tr>
										<td>1</td>
										<td>PHP</td>
										<td>100</td>
										<td>85</td>
										<td>A</td>
									</tr>
									<tr>
										<td>2</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>3</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>4</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>5</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
								</table>
								</div>


								<div id="showSemester4">
								<h3 style="padding-left: 121px;margin-top: 42px;font-style: italic; color: cornflowerblue;">Semester result</h3>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Program Name</th>
										<th>Total Marks</th>
										<th>Ontained Marks</th>
										<th>Grade</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Java</td>
										<td>100</td>
										<td>75</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>2</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>3</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>4</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>5</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
								</table>
								</div>

								<div id="showSemester5">
								<h3 style="padding-left: 121px;margin-top: 42px;font-style: italic; color: cornflowerblue;">Semester result</h3>
								<table class="table">
									<tr>
										<th>S.No</th>
										<th>Program Name</th>
										<th>Total Marks</th>
										<th>Ontained Marks</th>
										<th>Grade</th>
									</tr>
									<tr>
										<td>1</td>
										<td>ASP.NET</td>
										<td>100</td>
										<td>78</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>2</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>3</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>4</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
									<tr>
										<td>5</td>
										<td>C++</td>
										<td>100</td>
										<td>65</td>
										<td>B+</td>
									</tr>
								</table>
								</div>
							</div>
						</div>
						<!-- End Student Semester Record -->


						<!-- Attendence -->
							<div id="attendence">
								<div class="col-sm-6" style="margin-top: 89px;">
								<table class="table table-bordered" style="background-color: blanchedalmond;">
									<tr>
										<th>April,2019</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
									<tr>
										<td>Monday</td>
										<td>Tuesday</td>
										<td>Wednesday</td>
										<td>Thrusday</td>
										<td>Friday</td>
										<td>Saturday</td>
										<td>Sunday</td>
									</tr>
								</table>
								</div>
							</div>
						<!-- End attendence -->

						<!-- Student Fee Structure -->
							<div id="feeStructure">
								<div class="row">
								<div class="col-sm-6" style="margin-top: 89px;">
									<table class="table table-bordered" style="background-color: blanchedalmond;">
										<tr>
											<th>Semester</th>
											<th>Fees</th>
										</tr>
										<tr>
											<td>1</td>
											<td>75000</td>
										</tr>
										<tr>
											<td>2</td>
											<td>75000</td>
										</tr>
										<tr>
											<td>3</td>
											<td>75000</td>
										</tr>
										<tr>
											<td>4</td>
											<td>75000</td>
										</tr>
										<tr>
											<td>5</td>
											<td><span id="submitStudentFeeeeee"></span><a href="#submitfee" id="submitStudentFee">Submit</a>
																			
											</td>
										</tr>
									</table>
									
								</div>
								<div class="col-sm-6" style="margin-top: 89px;">
									<div id="ShowFeeSubmitForm" style="background-color: blanchedalmond;">
										
											<div class="form-group">
												<label style="font-style: italic;">Enter Student Id</label>
												<input type="text" name="sId" id="sId" value="<?php echo $result->id; ?>" class="form-control" readonly>
											</div>
											<div class="form-group">
												<label style="font-style: italic;">Enter Semester</label>
												<input type="text" name="sem" id="sem" class="form-control" value="5" readonly="">
											</div>
											<div class="form-group">
												<label style="font-style: italic;">Enter Student Mobile No</label>
												<input type="text" name="mob" id="mob" class="form-control">
											</div>
											<div class="form-group">
												<label style="font-style: italic;">Amount(85000.00/-)</label>
												<input type="text" name="amout" id="amount" class="form-control">
											</div>
											<button type="button" id="subFee">Submit</button>
											<button type="button" id="cancel">Later</button>
							
									</div>
								</div>
								</div>
								<div class="row">
								<div id="feeMessage" class="col-sm-6">
									
								</div>
								</div>
							</div>
							
						<!-- End Student Fee Structure -->

						<!-- Reset password -->
							<div id="resetpasswordForm">
								<div class="col-sm-4" style="margin-top: 89px;background-color: blanchedalmond;">
									<label id="successMessageReset" style="font-size: 10px;"></label>
									<label style="font-style: oblique;">Enter Old password</label>
									<input type="password" name="oldpass" id="oldpass" class="form-control">
									<label style="font-style: oblique;">Enter New Password</label>
									<input type="password" name="newpass" id="newpass" class="form-control">
									<label style="font-style: oblique;">Re-enter new Password</label>
									<input type="password" name="confnewpass" id="confnewpass" class="form-control">
									<button type="button" id="resetPassButton" style="margin-top: 18px;" class="btn btn-success">Reset</button>
								</div>
							</div>


						<!-- End reset password -->
					</div>
					
						
						
					<?php
				}
				}
					// admin page
					else
					{
						?>
							<div id="adminpage">								
								<div class="col-sm-4">
									<h3>Welcome&nbsp;<?php echo $this->session->userdata("username"); ?></h3>
									<a href="<?php echo base_url(); ?>FileUploadController/logoutUser" id="logout" style="text-decoration: none;">Logout</a>
									<div class="sidebar" style="margin-top: 101px;">
										<a href="#dashboard" id="dashboard" style="text-decoration: none; font-size: 17px;">Dashboard</a><br>
										<a href="#addstudent" id="addstudent" style="text-decoration: none; font-size: 17px;">Add Student</a><br>
										<a href="#showAllStudent" id="allstudent" style="text-decoration: none; font-size: 17px;">Show All Student</a><br>
										<a href="#fee" id="fee" style="text-decoration: none; font-size: 17px;">Student Fee</a><br>
										<a href="#studentattendence" id="studentattendence" style="text-decoration: none; font-size: 17px;">Student Attendence</a><br>
										<a href="#studentquery" id="studentquery" style="text-decoration: none; font-size: 17px;">Student Query</a><br>
										<a href="#addstudent" id="addstudent" style="text-decoration: none; font-size: 17px;">Add Student</a><br>
										<a href="#addstudent" id="addstudent" style="text-decoration: none; font-size: 17px;">Add Student</a><br>
									</div>
								</div>
								<div class="col-sm-8">

									<!-- dashboard content -->

							<div id="dashboardContent">
								<div class="col-sm-4">
								<table style="margin-top: 75px;">
									<tr>
										<th style="font-size: 21px;color: blue;">Latest News</th>
									</tr>
									<tr>
										<td><p style="text-align: justify;">An abstract class is a class that contains at least one abstract method, which is a method without any actual code in it, just the name and the parameters, and that has been marked as "abstract".</p></td>
									</tr>
								</table>
								<div>
									<h3 style="color: blue;">Thoughts</h3>
								</div>
								</div>
								<div class="col-sm-4" style="margin-top: 78px; margin-left: 179px; font-size: 21px; color: blue;">
									<div>
										<h3>Calender</h3>
									</div>
									<div>
										<h3>Birthday wishes</h3>
									</div>

								</div>
							</div>


						<!-- End dashboard content -->

									<!-- Add Student Details -->
									<div id="studentdetailsForm">
										<form method="post" id="submitstudentDetails" enctype="multipart/form-data">
									<div class="col-sm-4" style="margin-top: 66px;background-color: blanchedalmond;    padding-bottom: 90px;">
										<div id="studentAddError"></div>
										<div class="form-group">
											<label>Student name</label>						
											<input type="text" name="sname" id="sname" class="form-control">
											<label>Father's name</label>						
											<input type="text" name="fname" id="fname" class="form-control">
											<label>Class</label>
											<input type="text" name="sclass" id="sclass" class="form-control"><br>
											<label>Upload Student Image</label>
											<input type="file" name="simg" id="simg">
										</div>
									</div>
									<div class="col-sm-4" style="margin-top: 66px;background-color: blanchedalmond;">
											<label>Mother's name</label>			
											<input type="text" name="mname" id="mname" class="form-control">
											<label>Parent contact no</label>						
											<input type="text" name="pcontact" id="pcontact" class="form-control">
											<label>Student Contact no</label>						
											<input type="text" name="scontact" id="scontact" class="form-control"><br>
											<label>Address</label>
											<textarea cols="5" rows="3" class="form-control" name="address" id="address"></textarea><br>
											<button type="submit" class="btn btn-primary" style="margin-left: -52px;">Submti</button>
									</div>
									</form>
									</div>
								<!-- End student details -->
								<!-- Show All Student -->
								<!-- <div id="updateStudentDetails"> -->

												<form id="updateStudentDetails" method="post" style="    background-color: blanchedalmond;
    												padding-left: 18px;padding-right: 25px; padding-top: 12px;
    													padding-bottom: 20px;margin-top: 89px;margin-right: 319px">	
    												<label>Class:</label>
													<input type="text" name="usclass" id="usclass" class="form-control"><br>
													<label>Parent Mobile:</label>
													<input type="text" name="upmobile" id="upmobile" class="form-control"><br>
													<label>Student Mobile:</label>
													<input type="text" name="uscontact" id="uscontact" class="form-control">
													<br>
													<input type="hidden" name="updateuserId" id="updateuserId">
													<label>Address:</label>
													<textarea cols="5" rows="3" class="form-control" name="uadress" id="uadress"></textarea><br>
													<input type="submit" name="usubmit" id="usubmit" class="btn btn-success form-control" value="Update"><br>
												</form>
												
											<!-- </div> -->
										<div id="showAllStudent">
											<div id="UpdateData"></div>
											<div id="deleStudentMessage"></div>
										</div>

								<!-- End Show All Student -->
								</div>
								
							</div>

						<?php
					}
					// End admin page
				
			}
			else
			{

				?>
			<div class="col-sm-4">
				<h1 style="font-size: 32px;font-style: oblique;">Student registration form</h1>
				<div id="dataa"></div>
				<p><i class="fa fa-asterisk" style="color:red"></i>&nbsp; Required field</p>
				<form id="form_img" method="post" enctype="multipart/form-data">
					<label>Enter Student Id</label>
					<input type="text" name="studetnIdMatch" id="studetnIdMatch" class="form-control">
					<label><i class="fa fa-asterisk" style="color:red"></i>Name:</label>
					<input type="text" name="name" id="name" class="form-control">
					<label><i class="fa fa-asterisk" style="color:red"></i>Moble:</label>
					<input type="text" name="mobile" id="mobile" class="form-control">
					<label><i class="fa fa-asterisk" style="color:red"></i>Email:</label>
					<input type="text" name="email" id="email" class="form-control">
					<label><i class="fa fa-asterisk" style="color:red"></i>Upload File:</label>
					<input type="file" name="file_img" id="file_img" class="form-control">
					<input type="submit" name="upload" id="upload" value="submit" class="btn btn-primary" style="margin-top: 11px;">
				</form>
			</div>
			<div class="col-sm-4">
				<h1 style="font-size: 32px;font-style: oblique;">Student login</h1>
				<h3 id="error"></h3>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="mobileId" id="mobileId" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass" placeholder="Your mobile no" id="pass" class="form-control">
				</div>
				<button type="button" name="login" id="login" value="login" class="btn btn-primary">Login</button>
			</div>
			<div class="col-sm-4">
				<h1 style="font-size: 32px;font-style: oblique;">Admin login</h1>
				<h3 id="adminError" style="font-size: 15px;"></h3>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="adminusername" id="adminusername" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="adminpassword" id="adminpassword" class="form-control">
				</div>
				<button type="button" name="adminlogin" id="adminlogin" class="btn btn-primary">Login</button>
			</div>


				<?php
			}



			?>
			
		</div>
	</div>
	

	
<script type="text/javascript">
	$(document).ready(function(){
		$('#updateStudentDetails').hide();
		$('#showAllStudent').hide();
		$('#allstudent').click(function(){
			// $('#updateStudentDetails').hide();
			$('#updateStudentDetails').hide();
			$('#showAllStudent').show();
			$('#dashboardContent').hide();
			$('#studentdetailsForm').hide();

			showAllStudentDetailes();			
			
		});

		// $(document).on('load','#sduTab', function(){

		// 	loadPagination(0);
		// 	function loadPagination(pagno){
		// 	       $.ajax({
		// 	         url: "<?php //echo base_url(); ?>FileUploadController/loadRecord"+pagno,
		// 	         method: "get",
		// 	         dataType: "json",
		// 	         success: function(response){
		// 	            $('#pagination').html(response.pagination);
		// 	            //createTable(response.result,response.row);
		// 	         }
		// 	       });
  //    		}

		// });

		


		function showAllStudentDetailes(){
				$.ajax({
					url:"<?php echo base_url(); ?>FileUploadController/showAllRecords",
					method:"post",
					dataType:"json",
					success:function(data){
						var html='';
						var i;
						html +='<table id="sduTab" class="table" style="background-color:blanchedalmond;margin-left:-150px;margin-top:89PX;"><tr><th>Student&nbsp;Id</th><th>Image</th><th>Name</th><th>Class</th><th>Father&nbsp;name</th><th>Parent&nbsp;contact</th><th>Student&nbsp;contact</th><th>Address</th><th>delete</th><th>Edit</th></tr>';
						for(i=0; i<data.length; i++)
						{
							html +='<tr><td>'+data[i].sId+'</td><td><img src="<?php  echo base_url();?>upload/'+data[i].img+'" width="90" height="100"></td><td>'+data[i].sname+'</td><td>'+data[i].studentClass+'</td><td>'+data[i].fname+'</td><td>'+data[i].pcontact+'</td><td>'+data[i].scontact+'</td><td>'+data[i].address+'</td><td><a href="#" class="delete" id="'+data[i].sId+'"><i class="fa fa-trash-o" style="font-size:24px"></i></a></td><td><a href="#" class="update" id="'+data[i].sId+'"><i class="fa fa-edit" style="font-size:24px"></i></a></td></tr>';
						}

						html +='</table';
						$('#showAllStudent').html(html);
					}
				});
			}

			$(document).on('click','.update', function(){
				$('#updateStudentDetails').show();
				$('#showAllStudent').hide();

				var updateId = $(this).attr("id");
				$.ajax({
					url:"<?php echo base_url(); ?>FileUploadController/fetchSingleRecord",
					method:"post",
					data:{updateId:updateId},
					dataType:"json",
					success:function(data){
						for(var i in data)
						{
							$('#usclass').val(data[i].studentClass);
							$('#upmobile').val(data[i].pcontact);
							$('#uscontact').val(data[i].scontact);
							$('#uadress').val(data[i].address);
							
						}
						$('#updateuserId').val(updateId);

					}
				});

				$('#updateStudentDetails').on('submit',function(e){
					e.preventDefault();
					$.ajax({
						url:"<?php echo base_url();?>FileUploadController/updateRecord",
						method:"post",
						data:new FormData(this),
						contentType:false,
						cache:false,
						processData:false,
						success:function(data){
							showAllStudentDetailes();
							$('#updateStudentDetails').hide();
							$('#showAllStudent').show();
							$('#UpdateData').html(data);

						}
					});
				});
				

			});

		$(document).on('click','.delete',function(){
			var deletI=$(this).attr("id");
			if(confirm("Are you sure delete this record"))
			{
				$.ajax({
					url:"<?php echo base_url(); ?>FileUploadController/deleteStudent",
					method:"post",
					data:{deletI:deletI},
					success:function(data){
						$('#UpdateData').html(data);
						showAllStudentDetailes();
					}
				}); 
			}
			else
			{
				return false;
			}
				
		});

		// $("input").focus(function(){
  //   		$(this).css("background-color", "#cccccc");
  // 		});
  // 		$("input").blur(function(){
  //   		$(this).css("background-color", "#ffffff");
  // 		});

		$('#submitstudentDetails').on('submit',function(e){
			e.preventDefault();
			var sname=$('#sname').val();
			var fname=$('#fname').val();
			var mname=$('#mname').val();
			if(sname!=''&&fname!=''&&mname!='')
			{
				$.ajax({
					url:"<?php echo base_url(); ?>FileUploadController/uploadStudentInfo",
					method:"post",
					data:new FormData(this),
					contentType:false,
					cache:false,
					processData:false,
					success:function(data)
					{
						if($('#studentAddError').addClass("alert alert-warning"))
						{
							$('#studentAddError').removeClass("alert alert-warning")
							$('#studentAddError').addClass("alert alert-success");
						}
						else
						{
							$('#studentAddError').addClass("alert alert-success");
						}
						$('#studentAddError').text(data);
						$('#submitstudentDetails')[0].reset();
					}
				});
			}
			else
			{
				$('#studentAddError').fadeIn(100);
				$('#studentAddError').addClass("alert alert-warning");
				$('#studentAddError').text("All fields are required!");
				$('#studentAddError').fadeOut(8000);
				return false;
			}
		});

		$('#studentdetailsForm').hide();
		$('#addstudent').click(function(){
			$('#updateStudentDetails').hide();
			$('#showAllStudent').hide();
			$('#dashboardContent').hide();
			$('#studentdetailsForm').show();
		});
		$('#adminlogin').click(function(){
			var adminusername = $('#adminusername').val();
			var adminpassword = $('#adminpassword').val();
			$.ajax({
				url:"<?php echo base_url(); ?>FileUploadController/adminLogin",
				method:"post",
				data:{adminusername:adminusername, adminpassword:adminpassword},
				success:function(data){
					if(data == 3)
					{
						location.reload();
					}
					if(data == 1)
					{
						$('#adminError').addClass("alert alert-warning");
						$('#adminError').text("Please enter username and password");
						return false;
					}

					if(data ==2)
					{
						$('#adminError').addClass("alert alert-warning");
						$('#adminError').text("Please enter correct username and password");
						return false;
					}
				}
			});
		});

		$('#hideResultData').click(function(){
			$(this).hide();
			$('#hideResultData').hide();
			$('#showSemester2').hide();
			$('#showSemester3').hide();
			$('#showSemester4').hide();
			$('#showSemester5').hide();
			$('#showSemester1').hide();

		});

		$('#sem1').on('click',function(){
			$('#hideResultData').show();
			$('#showSemester2').hide();
			$('#showSemester3').hide();
			$('#showSemester4').hide();
			$('#showSemester5').hide();
			$('#showSemester1').show();
		});
		$('#sem2').on('click',function(){
			$('#hideResultData').show();
			$('#showSemester3').hide();
			$('#showSemester4').hide();
			$('#showSemester5').hide();
			$('#showSemester1').hide();
			$('#showSemester2').show();
		});
		$('#sem3').on('click',function(){
			$('#hideResultData').show();
			$('#showSemester2').hide();
			$('#showSemester4').hide();
			$('#showSemester5').hide();
			$('#showSemester1').hide();
			$('#showSemester3').show();
		});
		$('#sem4').on('click',function(){
			$('#hideResultData').show();
			$('#showSemester2').hide();
			$('#showSemester3').hide();
			$('#showSemester5').hide();
			$('#showSemester1').hide();
			$('#showSemester4').show();
		});
		$('#sem5').on('click',function(){
			$('#hideResultData').show();
			$('#showSemester2').hide();
			$('#showSemester3').hide();
			$('#showSemester4').hide();
			$('#showSemester1').hide();
			$('#showSemester5').show();
		});

		$('#resetPassButton').on('click',function(){
			var sid = $('#sId').val();
			var oldpass = $('#oldpass').val();
			var newpass = $('#newpass').val();
			var confnewpass = $('#confnewpass').val();
			if(oldpass !='')
			{
				$.ajax({
				url:"<?php echo base_url(); ?>FileUploadController/resetUserPass",
				method:"post",
				data:{sid:sid, oldpass:oldpass,newpass:newpass,confnewpass:confnewpass},
				success:function(data){
					$('#oldpass').val("");
					$('#newpass').val("");
					$('#confnewpass').val("");
					if(data == "Your password updated successfully")
					{
						$('#successMessageReset').removeClass('alert alert-warning');
						$('#successMessageReset').addClass('alert alert-success');
						$('#successMessageReset').text(data);
					}					
					if(data == "New password and confirm password not mached! try again")
					{
						$('#successMessageReset').removeClass('alert alert-success');
						$('#successMessageReset').addClass('alert alert-warning');
						$('#successMessageReset').text(data);
					}
					if(data == "Your old password not mached. Try again")
					{
						$('#successMessageReset').removeClass('alert alert-success');
						$('#successMessageReset').addClass('alert alert-warning');
						$('#successMessageReset').text(data);
					}
				}
			});
			}
			else
			{
				alert("Please enter old password");
				return false;
			}
			
		});

		$('#resetpassword').click(function(){
			$('#resetpasswordForm').show();
			$('#submitFee').hide();
			$('#feeStructure').hide();
			$('#attendence').hide();
			$('#spInformation').hide();
			$('#studentSemesterRecord').hide();
			$('#dashboardContent').hide();
		});
		feeStructureData();
		function feeStructureData(){
			var sid = $('#sId').val();
			$.ajax({
				url:"<?php echo base_url(); ?>FileUploadController/finalFeeData",
				method:"post",
				data:{sid:sid},
				dataType:"json",
				success:function(data){
					var i;
					var html ='';
					for(i=0; i<data.length; i++)
					{
						$('#submitStudentFeeeeee').text(data[i].amount);
						$('#submitStudentFee').hide();
					}


				}
			});
		}

		$('#cancel').on('click', function(){
			$("#ShowFeeSubmitForm").hide();
			$('#submitStudentFee').show();
		});

		$('#subFee').on('click',function(){
			var sId = $('#sId').val();
			var sem = $('#sem').val();
			var mob = $('#mob').val();
			var amount = $('#amount').val();
			if(mob !='' && amount == 85000)
			{
				$.ajax({
					url:"<?php echo base_url(); ?>FileUploadController/studentFeeSubmit",
					method:"post",
					data:{sId:sId,sem:sem,mob:mob,amount:amount},
					dataType:"json",
					beforeSend:function(){

						$('#subFee').text('submitting..Please wait!');
					},
					success:function(data){
						var feeResult = '';
						var i;
						feeResult +='<table class="table table-bordered"><tr><th>Name</th><th>Student&nbsp;Id</th><th>Semester</th><th>Amount</th><th>Mobile</th></tr>';
						for(i=0; i<data.length; i++)
						{
							feeResult +='<tr><td></td><td>'+data[i].sId+'</td><td>'+data[i].sem5+'</td><td>'+data[i].amount+'</td><td>'+data[i].mobile+'</td><tr>';
							$('#submitStudentFeeeeee').text(data[i].amount);
						}
						feeResult +='</table>';
						$('#subFee').hide();

						$('#feeMessage').html(feeResult);
					}
				});
			}
			else
			{
				alert("Mobile and Amount both fields are required!");
			    return false;
			}
		});
		$('#resetpasswordForm').hide();
		$('#submitFee').hide();
		$('#feeStructure').hide();
		$('#attendence').hide();
		$('#spInformation').hide();
		$('#studentSemesterRecord').hide();
		$('#dashboard').click(function(){
			location.reload();
		});

		$('#submitStudentFee').on('click', function(){
			$(this).hide();
			$('#ShowFeeSubmitForm').show();
		});

		$('#sfeeStructure').on('click', function(){
			$("#ShowFeeSubmitForm").hide();
			$('#dashboardContent').hide();
			$('#studentSemesterRecord').hide();
			$('#spInformation').hide();
			$('#attendence').hide();
			$('#feeStructure').show();
			$('#resetpasswordForm').hide();
		});

		$('#sattendence').on('click', function(){
			$('#feeStructure').hide();
			$('#studentSemesterRecord').hide();
			$('#dashboardContent').hide();
			$('#attendence').show();
			$('#resetpasswordForm').hide();
		});
		$('#personoalInformation').click(function(){
			$('#feeStructure').hide();
			$('#attendence').hide();
			$('#studentSemesterRecord').hide();
			$('#dashboardContent').hide();
			$('#resetpasswordForm').hide();
			if($('#spInformation').hide())
			{
				$('#spInformation').show();
			}
			
		});

		$('#srecord').on('click', function(){
			$('#hideResultData').hide();
			$('#resetpasswordForm').hide();
			$('#feeStructure').hide();
			$('#attendence').hide();
			$('#spInformation').hide()
			$('#dashboardContent').hide();
			$('#studentSemesterRecord').show();
			$('#showSemester1').hide();
			$('#showSemester2').hide();
			$('#showSemester3').hide();
			$('#showSemester4').hide();
			$('#showSemester5').hide();
		});
		$('#login').click(function(){
			var username = $('#mobileId').val();
			var password = $('#pass').val();
			if(username !='' && password !='')
			{
				$.ajax({
				url:"<?php echo base_url(); ?>FileUploadController/signUser",
				method:"post",
				data:{username:username, password:password},
				success:function(data){
					if(data == 1)
					{
						location.reload();

					}
					else 
					{
						$('#error').css("font-size","12px");
						$('#error').addClass("alert alert-warning");
						$('#error').html(data);
					}
				}
			});
			}
			else
			{
				alert("Please enter username and password");
				return false;
			}
			
		});
		$('')


		$('#logout').click(function(e){
			e.preventDefault();
			$.ajax({
				url:$(this).attr("href"),
				method:"post",
				success:function(data){
					location.reload();
					$('#logoutMessage').addClass("alert alert-success");
					$('#logoutMessage').text(data);
					
				}
			});
		});

		$('#form_img').on('submit', function(even){
			even.preventDefault();

			$.ajax({
			url:"<?php echo base_url(); ?>FileUploadController/uploadImage",
			method:"post",
			data: new FormData(this),
			contentType: false,
			cache:false,
			processData:false,
			success:function(data){
				$('#upload').addClass("btn btn-primary");
				if(data == "Your sutdent id all ready registered.")
				{
					$('#dataa').removeClass("alert alert-success");
					$('#dataa').addClass("alert alert-warning");
					$('#dataa').html(data);
				}

				if(data == "You registered successfully. Please login")
				{
					$('#form_img')[0].reset();
					$('#dataa').removeClass("alert alert-warning");
					$('#dataa').addClass("alert alert-success");
					$('#dataa').html(data);
				}
				if(data == "All fields are required!")
				{
					$('#dataa').addClass("alert alert-warning");
					$('#dataa').html(data);
				}

				$('#dataa').html(data);
				
			}
		});
		});
		
	});
</script>
</body>
</html>

