<!DOCTYPE html>
<html>
<head>
	<title>Welcome to test series</title>
	<?php include('layouts/meta.php'); ?>
</head>
<body>
<div class="row">
<div class="col-sm-12">
	

	<div class="col-sm-12">
	<h1 class="jumbotron text-center">Welcome Screen</h1>
	<br/>
		<div  class="">
			<?php if($this->session->flashdata('error')){ ?> 
			<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
			<?php } ?>
		</div>

		<?php
	if($mapping_id){ ?> 
		<div class="well">
			<div class="row">
			<div class="col-md-4 col-xs-12"></div>
			<div class="col-md-4 col-xs-12 test-center">
				<form method="POST" >
					<div class="col-sm-12 form-group">
						<label>Enter Your Roll Number & Mobile</label>
						<input type="hidden" name="mapping_id" value="<?= $mapping_id; ?>">
						<input type="hidden" name="batch_id" value="<?= $batch_id; ?>">
						<input type="text" class="form-control" name="rollNumber" placeholder="Roll Number & Mobile">
					</div>
					<div class="col-sm-12 form-group text text-right">
					<input type="submit" class="btn btn-info" name="start" value="Start">
					</div>
				</form>
			</div>
			<div class="col-md-4 col-xs-12"></div>
			</div>
		</div>
	<?php  }else{ ?>
		<div class="alert alert-danger text text-center">Invalid Test Series</div>
	<?php } ?>
	</div>
	
</div>
</div>
<?php include('layouts/footer.php'); ?>
</body>

</html>
<?php include('layouts/script.php'); ?>