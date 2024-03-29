<?php
require 'session_check.php';
require 'cookie_check.php';
require 'db.php';
	$select = "SELECT * FROM users";
	$select_result = mysqli_query($db, $select);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>All User Info</title>
		<link rel="stylesheet" href="./asset/datatable/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/datatable/plugin/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="asset/datatable/plugin/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" href="./asset/datatable/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="./asset/css/font-awesome.min.css">
		<link rel="stylesheet" href="./asset/datatable/css/style.css">
		<link rel="stylesheet" href="./asset/css/style.css">
	</head>
	<body>
		
		<div class="container-fluid mt-5">
			<div class="row">
				<div class="col-lg-12">
					<div class="card bg-light mb-2">
						<div class="card-header"><h3>All User Info</h3></div>
						<div class="card-body">
							<table id="myDataTable" class="order-column tabledesign table-striped table table-bordered" style="width:100%; border-collapse: collapse!important;" cellpadding="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>NAME</th>
										<th>USER</th>
										<th>EMAIL</th>
										<th>PHONE</th>
										<th>BIRTH</th>
										<th>GENDER</th>
										<th>SKILL</th>
										<th>POSITION</th>
										<th>ABOUT</th>
										<th>ROLE</th>
										<th>DATE</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($select_result as $value) { ?>
									
									<tr>
										<td><?php echo $value['id']  ?></td>
										<td><?php $full_name = $value['fname'].' '.$value['lname']; echo $full_name  ?></td>
										<td><?php echo $value['uname']  ?></td>
										<td><?php echo $value['email']  ?></td>
										<td><?php echo $value['phone']  ?></td>
										<td><?php echo $value['dob']  ?></td>
										<td><?php echo $value['gender']  ?></td>
										<td><?php echo $value['skill']  ?></td>
										<td><?php echo $value['position']  ?></td>
										<td><?php echo $value['about']  ?></td>
										<td>
											<?php
												if ($value['role']==1) {
													echo 'Admin';
												}elseif ($value['role']==2) {
													echo 'Moderator';
												}else{
													echo 'Editor';
												}
											?>
											
										</td>
										<td><?php echo $value['register_date']  ?></td>
										<td>
											<a href="single_user.php?id=<?php echo $value['id'] ?>" class="eye"><i class="fa fa-eye"></i></a>
											<a href="edit_user.php?id=<?php echo $value['id'] ?>" class="pencil"><i class="fa fa-pencil"></i></a>
											<a data-toggle="modal" data-target="#shmaim<?php echo $value['id'] ?>"  class="trash cursor-pointer"><i class="fa fa-trash"></i></a>
											<!-- Modal -->
											<div class="modal fade" id="shmaim<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<h5 class="modal-title" id="exampleModalLabel">This Row Will Be Remove</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															Are You Sure?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-info text-white" data-dismiss="modal">No</button>

															<button type="button" class="btn btn-danger text-white"><a href="delete_user.php?id=<?php echo $value['id'] ?>">Yes</a></button>
														</div>
													</div>
												</div>
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
		<script src="asset/datatable/js/jquery-2.2.4.min.js"></script>
		<script src="asset/datatable/js/bootstrap.min.js"></script>
		<script src="asset/datatable/plugin/js/jquery.dataTables.min.js"></script>
		<script src="asset/datatable/plugin/js/dataTables.bootstrap4.min.js"></script>
		<script src="asset/datatable/plugin/js/dataTables.buttons.min.js"></script>
		<script src="asset/datatable/plugin/js/buttons.colVis.min.js"></script>
		<script src="asset/datatable/plugin/js/buttons.bootstrap4.min.js"></script>
		<script src="asset/datatable/plugin/js/jszip.min.js"></script>
		<script src="asset/datatable/plugin/js/pdfmake.min.js"></script>
		<script src="asset/datatable/plugin/js/vfs_fonts.js"></script>
		<script src="asset/datatable/plugin/js/buttons.html5.min.js"></script>
		<script src="asset/datatable/plugin/js/buttons.print.min.js"></script>
		<script src="asset/datatable/js/custom.js"></script>

	</body>
</html>