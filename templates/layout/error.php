<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7KV3VRYCC6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7KV3VRYCC6');
</script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

  <?php
  echo $this->element('site_meta');
  ?>
  <link rel="icon" href="/admin_template/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
  <?= $this->Html->css([ '/assets/lib/animate/animate.min.css','/assets/lib/owlcarousel/assets/owl.carousel.min.css', 'assets/css/bootstrap.min.css', '/assets/css/style.css',], ['pathPrefix' => '']); ?>
  
  
  <?php echo $this->fetch('cssTop') ?>


</head>

<body>

 
  <div class="menu-overlay"></div>

  <?= $this->Flash->render() ?>





  <?= $this->element('site/header'); ?>



  <?= $this->fetch('content') ?>
  <?php echo $this->element('site/footer'); ?>

  

  <script>
    var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <?= $this->Html->script(['/assets/lib/wow/wow.min.js','/assets/lib/easing/easing.min.js','/assets/lib/waypoints/waypoints.min.js','/assets/lib/owlcarousel/owl.carousel.min.js','/assets/js/main.js',]); ?>

  
  





  <?= $this->fetch('scriptBottom') ?>

</body>

</html>