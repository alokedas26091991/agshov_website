<?php


$cakeDescription = 'Pentagonshopee Admin Panel';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Pentagonshopee Admin Panel
  </title>
  <link rel="icon" href="/admin_template/assets/images/favicon.ico">

  <?= $this->fetch('meta') ?>

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Bootstrap Core CSS -->
  <?= $this->Html->css(['/admin_template/app-assets/fonts/feather/style.min', '/admin_template/app-assets/fonts/simple-line-icons/style', '/admin_template/app-assets/fonts/font-awesome/css/font-awesome.min', '/admin_template/app-assets/vendors/css/perfect-scrollbar.min', '/admin_template/app-assets/vendors/css/prism.min', '/admin_template/app-assets/css/app', '/admin_template/app-assets/css/select-dropdown.css', '/admin_template/app-assets/css/app.css', '/admin_template/assets/vendors/typicons/typicons.css', '/admin_template/assets/vendors/css/vendor.bundle.base.css', '/admin_template/assets/css/style.css', '/admin_template/assets/css/style.css', '/admin_template/assets/vendors/select2/select2.min.css','/admin_template/assets/vendors/font-awesome/css/font-awesome.min.css']); ?>

  <?= $this->fetch('scriptTop'); ?>
</head>

<body>
  <div class="container-scroller">
    <?= $this->element('header') ?>

    <div class="main-panel">

      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
      <?= $this->element('footer') ?>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- END PAGE LEVEL JS-->
</body>
<script>
  var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';
</script>

<?= $this->Html->script(['/admin_template/assets/vendors/js/vendor.bundle.base.js', '/admin_template/assets/vendors/chart.js/chart.umd.js', '/admin_template/assets/js/jquery.cookie.js', '/admin_template/assets/js/off-canvas.js', '/admin_template/assets/js/hoverable-collapse.js', '/admin_template/assets/js/template.js', '/admin_template/assets/js/settings.js', '/admin_template/assets/js/todolist.js', '/admin_template/assets/js/dashboard.js', '/admin_template/assets/js/typeahead.bundle.min.js', '/admin_template/assets/vendors/select2/select2.min.js', '/admin_template/assets/js/file-upload.js', '/admin_template/assets/js/select2.js']); ?>

<?= $this->fetch('scriptBottom'); ?>

</html>