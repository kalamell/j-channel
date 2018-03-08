<!DOCTYPE html>
<html>
<head>
	<title>Backend</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
		<div class='row'>
			<div class='col-md-12'>
				<h2 class="page-header">ข้อมูลสมาชิกที่โหวด <?php echo $mv->movie_name;?></h2>
			</div>

			
			<section class="col-md-12">
				

				<table class="table table-striped table-bordered" border="1">
					<thead>
						<tr>
							<th>Profile picture</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Email</th>
							<th>User ID</th>
							<th>Facbook account url</th>
							<th>วันที่โหวต</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($member as $m):?>
							<tr>
								<td><img src="<?php echo $m->picture_url;?>" class="img-responsive"></td>
								<td><?php echo $m->firstname.' '.$m->lastname;?></td>
								<td><?php echo $m->gender?></td>
								<td><?php echo $m->email;?></td>
								<td><?php echo $m->uid;?></td>
								<td>
									<?php echo $m->profile_url;?>
								</td>
								<td>
									<?php echo $m->vote_date;?>
								</td>
							</tr>

						<?php endforeach;?>
					</tbody>
					
				</table>

			</section>
		</div>
	</div>

</body>
</html>