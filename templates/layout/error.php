<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $this->fetch('title', 'Page Not Found - Agshov Pharmaceuticals') ?></title>
    <meta name="description" content="Agshov Pharmaceuticals Pvt Ltd">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php echo $this->element('site_meta'); ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- plugins css -->
    <link rel="stylesheet" href="/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">

    <?php echo $this->fetch('cssTop') ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <?= $this->Flash->render() ?>

        <!-- HEADER AREA START -->
        <?= $this->element('site/header'); ?>
        <!-- HEADER AREA END -->

        <!-- MAIN CONTENT START -->
        <?= $this->fetch('content') ?>
        <!-- MAIN CONTENT END -->

        <!-- FOOTER AREA START -->
        <?= $this->element('site/footer'); ?>
        <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="/js/main.js"></script>

    <?= $this->fetch('scriptBottom') ?>

</body>

</html>