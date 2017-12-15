<?php
include('../UI/SchoolHandler.php');
if(!isset($_GET['id'])){
	echo "<script>window.location='School_ManageAddressBook.php'</script>";
}
else{
	$handler = new SchoolHandler();
	$con = new Connect();
	$connect = $con->connectDB();
	$id = mysqli_real_escape_string($connect,stripcslashes(trim($_GET['id'])));
	$resultContactPerson = $handler->getContactPersonBySchoolId($id);
	$resultSchool = $handler->getSchoolById($id);
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage School Directory</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

		<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
	<!-- /theme JS files -->
</head>
<style type="text/css">
    div.container {
        width: 80%;
    }
    #addContactPerson{
	 display: none
	}
</style>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					</li>

					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<span>Username</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<!-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
							<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main"></i></li>
								<li><a href="#"><i class="icon-newspaper"></i> <span>Home</span></a></li>
								<li class="navigation-header"><span>Address Book</span> <i class="icon-menu" title="Address Book"></i></li>
								

								<li>
									<a href="#"><i class="icon-office"></i> <span>School Directory</span></a>
									<ul>
										<li><a href="School_AddSchool.php"><i class="icon-plus-circle2"></i> <span>Add School</span></a></li>
										<li class="active"><a href="School_ManageAddressBook.php"><i class="icon-book3"></i> <span>Manage Schools</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Student Directory</span></a>
									<ul>
										<li><a href="Student_ManageStudent.php"><i class="icon-book3"></i> <span>Manage Students</span></a></li>
									</ul>
								</li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper" >
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Address Book</span> - Manage School Directory</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content" >
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-flat" name="viewSchool" id="viewSchool">
								<div class="panel-heading">
									<h5 class="panel-title">School Details</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">
									<div class="col-lg-12">
										<fieldset class="content-group">
											<?php foreach($resultSchool as $school){?>
											<div class="row">
												<div class="col-lg-12">
													<div class="col-lg-3">

														<input class="form-control" value="<?php echo $school['schoolName'];?>" disabled="true"/>
													</div>
													<div class="col-lg-3">
														<a class="btn btn-primary" style="margin-left: -15px;" data-toggle="modal" data-target="#modalChangeSchoolName"><i style="margin-right: 5px;" class="icon-pencil"></i>EDIT</a>
													</div>
												</div>
											</div>
										</br>
											<div class="row"> 
												<div class="col-lg-12">
													<div class="col-lg-3">
														<input class="form-control" value="<?php echo $school['cityName'].", ".$school['provinceName'];?>" disabled="true"/>
													</div>
													<div class="col-lg-3">
														<a href="" class="btn btn-primary" style="margin-left: -15px;"><i style="margin-right: 5px;" class="icon-pencil"></i>EDIT</a>
													</div>
												</div>
											</div>
											
										</br>
											<div class="row">
											<table class="table datatable-html" style='font-size: 13px;' name="tablePreview" id="tablePreview">

												<thead style="font-size: 13px;">
													<tr>
										                <th>Contact Person</th>
										                <th>Designation</th>
										                <th>Cellphone Number</th>
										                <th>Telephone Number</th>
										                <th>Fax Number</th>
										                <th>Email Address</th>
										                <th class="text-center">Actions</th>
										            </tr>
												</thead>
												<tbody style="font-size: 13px;">
													<?php foreach($resultContactPerson as $person){?>
													<tr>
														<td><?php echo $person['contactName'];?></td>
														<td><?php echo $person['designation'];?></td>
														<td><?php echo $person['cellphoneNumber'];?></td>
														<td><?php echo $person['telephoneNumber'];?></td>
														<td><?php echo $person['faxNumber'];?></td>
														<td><?php echo $person['emailAddress'];?></td>
														<td><a href='#' name='sample' id='sample' style='color: #d35400'><i class='icon-trash'></i>Edit</a>
														<a href="#" name="sample" id="sample" style="color: #d35400;" onclick="promptDelete(<?php echo $school['idSchool'];?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a>
													</td>
													</tr>
													<?php }}?>
												</tbody>
											</table>
										</fieldset>
									</div>
								</div>
									
								</div>
						</div>
					</div>
				</div>
				<!-- Content area -->
				<!-- Content area 2 -->
				<div id="addContactPerson">
					
				</div>
				<!--Content area 2-->
			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
	 <!-- Small modal -->
	<div id="modalChangeSchoolName" class="modal fade">
		<div class="modal-dialog modal-md">
			<form action="#" class="form-validate-jquery">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Update School Name</h5>
					</div>

					<div class="modal-body">
						<div class="col-lg-6" style="margin-left: 50px;">
							<input type="text" class="form-control" id="newSchoolName" name="newSchoolName">
						</div>
						
					</div>
					<div class="modal-footer" >
						<button type="button" class="btn btn" data-dismiss="modal" >Close</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateSchoolName(<?php echo $id;?>,newSchoolName.value)">Save</button>
					</div>
			</div>
			</form>
		</div>
	</div>
	<!-- /small modal -->
	<script type="text/javascript">
		    // Warning alert
		    $('#tablePreview').dataTable( {
			  "columnDefs": [ {
				"targets": 6,
				"orderable": true
				} ]
			} );
		    function promptDelete(val){
		    	swal({
			            title: "Are you sure?",
			            text: "You will not be able to recover this information!",
			            type: "warning",
			            showCancelButton: true,
			            confirmButtonColor: "#FF7043",
			            confirmButtonText: "Delete",
			            closeOnConfirm: true,
			            closeOnCancel: true
		        	},
		        	function(isConfirm){
		        		if(isConfirm){
		        			deleteSchool(val);
		        		}
		        });
		    }
		    function deleteSchool(val){
		    	$.ajax({
				type: "POST",
				url: "getSchool.php",
				data: 'idSchool=' + val,
					success: function(data){
						window.location ='School_ManageAddressBook.php';
					}
				});
		    }
		    function updateSchoolName(id,val){
		    	alert(id+" "+ val);
		    	$.ajax({
				type: "POST",
				url: "updateSchoolFunction.php",
				data: { id: id, name : val }
				success: function(data){
					window.location ='School_ManageAddressBook.php';
				}
				});
		    }
		    function showDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('addContactPerson');
		    	x.style.display = "none";
		    	y.style.display = "block";
		    }
		    function hideDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('addContactPerson');
		    	x.style.display = "block";
		    	y.style.display = "none";
		    }
	</script>
</body>
</html>