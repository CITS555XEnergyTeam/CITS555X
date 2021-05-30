<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Device Configuration</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="../login/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../login/js/cufon-yui.js"></script>
		<script type="text/javascript" src="../login/js/arial.js"></script>
		<script type="text/javascript" src="../login/js/cuf_run.js"></script>
		<script type="text/javascript" src="../login/js/serialize_array_php.js"></script>
		<script type="text/javascript" src="j../login/s/jquery.js"></script>
		<link href="../login/jqModal.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="main">
			<?php require('header.php');?>
			<?php  include('php_code_device_operation.php'); ?>
			<?php 
				if (isset($_GET['edit'])) {
					$id = $_GET['edit'];
					$update = true;
					
					$sql = "SELECT * FROM ems_device_table WHERE device_id=$id;"; 
					$record = $db->query($sql);

					if (count($record) == 1 ) {
						$n = $record->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
						$deviceName = $n['device_name'];
						$systemName = $n['pvsystem'];
					}
				}
			?>			
			<?php if (isset($_SESSION['message'])): ?>
			<div class="msg">
				<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
			</div>
			<?php endif ?>
			<div class="content">
				<div class="content_resize">
					<div class="article" style="padding:16px 0 0 0;">
						<div id="datatable" style="text-align: center; width:900px; margin-left:auto; margin-right:auto;">
							<?php 
										$sql = "SELECT * FROM ems_device_table;"; 
											$result = $db->query($sql);
										?>
							<table>
								<thead>
									<tr>
										<th>Device Name</th>
										<th>System Name</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>

								<?php while ($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
								<tr>
									<td><?php echo $row['device_name']; ?></td>
									<td><?php echo $row['pvsystem']; ?></td>
									<td>
										<a href="device_operation_index.php?edit=<?php echo $row['device_id']; ?>" class="edit_btn" >Edit</a>
									</td>
									<td>
										<a href="php_code_device_operation.php?del=<?php echo $row['device_id']; ?>" class="del_btn">Delete</a>
									</td>
								</tr>
								<?php } ?>
							<tr>
							<td>
							</td>
							</tr>
							
							<tr>
								<form method="post" action="php_code_device_operation.php" >
								<div class="input-group">
									<td>
									<label>Device Name:</label>
									</td>
									<td>
									<input type="text" name="deviceName" value="<?php echo $deviceName; ?>">
									</td>
									</div>
							</tr>
							<tr>
									<div class="input-group">
										<td>
										<label>System Name:</label>
										</td>
										<td>
										<input type="text" name="systemName" value="<?php echo $systemName; ?>">
										</td>
							</tr>
							<tr>
							<td>
											<input type="hidden" name="id" value="<?php echo $id; ?>">
											</div>
												<div class="input-group">
												<?php if ($update == true): ?>
												<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
												<?php else: ?>
												<button class="btn" type="submit" name="save" >Save</button>
												<?php endif ?>
											</div>		
										</form>								
							</td>
							</tr>
							</table>
																
									</div>
								</div>
							</div>
						</div>
					</div>
				</body>
			</html>