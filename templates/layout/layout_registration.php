<!DOCTYPE HTML>
<html>
<head>
<title> Admin Panel | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
 <!-- Bootstrap Core CSS -->
 <?=$this->Html->css(['/admin_template/app-assets/fonts/feather/style.min','/admin_template/app-assets/fonts/simple-line-icons/style','/admin_template/app-assets/fonts/font-awesome/css/font-awesome.min','/admin_template/app-assets/vendors/css/perfect-scrollbar.min','/admin_template/app-assets/vendors/css/prism.min','/admin_template/app-assets/css/app']);?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->

<!-- lined-icons -->

<!-- //lined-icons -->

<!--clock init-->
</head> 
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
		  <?= $this->Flash->render() ?>
		  <?= $this->fetch('content') ?>
		  <!--Login Page Starts-->
          </div>
        </div>
      </div>
    </div>
								
<!--js -->
<?=$this->Html->script(['/admin_template/app-assets/vendors/js/core/jquery-3.2.1.min','/admin_template/app-assets/vendors/js/core/popper.min','/admin_template/app-assets/vendors/js/core/bootstrap.min','/admin_template/app-assets/vendors/js/perfect-scrollbar.jquery.min','/admin_template/app-assets/vendors/js/prism.min','/admin_template/app-assets/vendors/js/jquery.matchHeight-min','/admin_template/app-assets/vendors/js/screenfull.min','/admin_template/app-assets/vendors/js/pace/pace.min','/admin_template/app-assets/js/app-sidebar','/admin_template/app-assets/js/notification-sidebar','/admin_template/app-assets/js/customizer'],['block' => 'scriptBottom']);?>
<?=$this->fetch('scriptBottom');?>
</body>
</html>