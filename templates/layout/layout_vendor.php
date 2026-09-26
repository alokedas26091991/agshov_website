<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Welcome to ARGSA';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->Url->image("/assets/images/favicon.jpg", ['pathPrefix' => 'vendor/']) ?>">
    <title>Seller Dashboard</title>
    <!-- Custom CSS -->
      
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
   
 <script src="/js/ckeditor/ckeditor.js" type="text/javascript"></script>
   

    <?= $this->fetch('meta') ?>
  
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- Bootstrap Core CSS -->
 <?=$this->Html->css(['/vendor/assets/extra-libs/c3/c3.min','/vendor/dist/css/style.min','/vendor/dist/css/custom']);?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->

   
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
		<?=$this->element('vendor/header')?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
		<?=$this->element('vendor/admin_menu')?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
			<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
			<?=$this->element('vendor/footer')?>
              <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
        
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  
</body>
<script>
            var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';
        </script>
<?=$this->Html->script(['/admin_template/app-assets/vendors/js/core/jquery-3.2.1.min','/vendor/assets/libs/popper.js/dist/umd/popper.min','/vendor/assets/libs/bootstrap/dist/js/bootstrap.min','/vendor/dist/js/app.min','/vendor/dist/js/app.init.mini-sidebar','/vendor/dist/js/app-style-switcher','/vendor/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min','/vendor/assets/extra-libs/sparkline/sparkline','/vendor/dist/js/waves','/vendor/dist/js/sidebarmenu','/vendor/dist/js/custom.min','/vendor/assets/extra-libs/c3/d3.min','/vendor/assets/extra-libs/c3/c3.min','/vendor/dist/js/pages/dashboards/dashboard5']);?>
<?=$this->fetch('scriptBottom');?>
</html>