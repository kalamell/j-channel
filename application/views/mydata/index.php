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
				<h2 class="page-header">ข้อมูลการโหวต</h2>
			</div>

			<section class="col-md-4">
				<div class="list-group">
				  <a href="<?php echo site_url();?>" class="list-group-item">
				    หน้าหลักแคมเปญ
				  </a>

				  <a href="<?php echo site_url('mydata');?>" class="list-group-item">
				    หน้าหลักแคมเปญ
				  </a>


				  <?php foreach($movie as $m):?>
				  <a href="<?php echo site_url('mydata/mv/'.$m->movie_id);?>" class="list-group-item">
				  	<span class="badge"><?php echo $m->c;?> โหวต</span>
				  	<?php echo $m->movie_name;?>
				  		
				  </a>
				<?php endforeach;?>
				</div>
				
			</section>

			<section class="col-md-8">
				
				<h2 class="page-header">ข้อมูลสมาชิก</h2>

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>IMG</th>
							<th>ข้อมูลสมาชิก</th>
							<th>URL PROFILE</th>
							<th>จำนวนโหวต</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($member as $m):?>
							<tr>
								<td><img src="<?php echo $m->picture_url;?>" class="img-responsive"></td>
								<td>
									Email : <?php echo $m->email;?><br>
									ชื่อ : <?php echo $m->firstname.' '.$m->lastname;?><br>
									เพศ​ : <?php echo $m->gender;?><br>
								</td>
								<td>
									<a href="<?php echo $m->profile_url;?>" target="_blank">Facebook</a>
								</td>
								<td><?php echo $m->c;?></td>
							</tr>

						<?php endforeach;?>
					</tbody>
					
				</table>

			</section>
		</div>
	</div>

</body>
</html>