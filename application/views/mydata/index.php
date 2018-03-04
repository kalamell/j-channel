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
			<section class="col-md-4">
				<div class="list-group">
				  <a href="#" class="list-group-item">
				    หน้าหลักแคมเปญ
				  </a>
				  <?php foreach($movie as $m):?>
				  <a href="<?php echo site_url('mydata/mv/'.$m->movie_id);?>" class="list-group-item"><?php echo $m->movie_name;?></a>
				<?php endforeach;?>
				</div>
				
			</section>

			<section class="col-md-8">
				
			</section>
		</div>
	</div>

</body>
</html>