<!DOCTYPE html>
<html>
<head>
	<title>Test Result</title>
	<?php include('layouts/meta.php'); ?>
</head>
<body>
<div class="row">
<div class="col-sm-12">
	

	<div class="col-sm-12">
	<h1 class="">Result</h1>
	<br/>
		<table>
			<thead>
				<tr>
					<th>Total Question</th>
					<th><?= $total_question ?></th>
				</tr>
				<tr>
					<th>Attempt Question</th>
					<th><?= $total; ?></th>
				</tr>
				<tr>
					<th>Correct</th>
					<th><?= $correct; ?></th>
				</tr>
				<tr>
					<th>Incorrect</th>
					<th><?= $incorrect; ?></th>
				</tr>
			</thead>
		</table>
			
	</div>
	
	<div class="col-sm-12 form-group">
		<a href="<?= base_url().'test/logout'; ?>" class="btn btn-warning">Submit</a>
	</div>
</div>
</div>
<?php include('layouts/footer.php'); ?>
</body>

</html>
<?php include('layouts/script.php'); ?>