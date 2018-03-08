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
				    สมาชิก
				  </a>

				  <a href="<?php echo site_url('mydata/movie');?>" class="list-group-item active">
				    ข้อมูลหนัง
				  </a>


				  
				</div>
				
			</section>

			<section class="col-md-8">
				
				<h2 class="page-header">ข้อมูลสมาชิก</h2>

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							
							<th>ชื่อหนัง</th>
							<th>จำนวนโหวต</th>
							<th>ผู้โหวต</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($movie as $m):?>
							<tr>
								<td><?php echo $m->movie_name;?></td>
								
								<td><?php echo $m->c;?></td>
								<td style="text-align: center;"><a href="<?php echo site_url('mydata/mv/'.$m->movie_id);?>" class="btn btn-sm btn-default">แสดงข้อมูล</a></td>
							</tr>

						<?php endforeach;?>
					</tbody>
					
				</table>

			</section>
		</div>
	</div>

</body>
</html>