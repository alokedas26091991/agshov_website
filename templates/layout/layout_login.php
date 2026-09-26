<!DOCTYPE HTML>
<html>
<head>
<title> Admin Panel | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <?=$this->Html->css(['/admin_template/css/bootstrap.min','/admin_template/css/style','/admin_template/css/font-awesome','/admin_template/css/icon-font.min']);?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->

<!-- //lined-icons -->

<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									
									<?= $this->Flash->render() ?>
								
									<?= $this->fetch('content') ?>
									
									   
						
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
												<div class="error-btn">
															<a class="read fourth" href="index.html">Return to Home</a>
															</div>
										   <p>&copy 2023 ARGSA . All Rights Reserved </p>
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<?=$this->Html->script(['/admin_template/js/jquery-1.10.2.min','/admin_template/js/jquery.nicescroll.js','/admin/js/scripts','/admin_template/js/bootstrap.min.js'],['block' => 'scriptBottom']);?>
<?=$this->fetch('scriptBottom');?>
</body>
</html>