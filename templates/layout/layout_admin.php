<?php
$cakeDescription = 'Agshov Pharmaceuticals - Admin Panel';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Agshov Pharmaceuticals - Admin Panel
  </title>
  <link rel="icon" href="/img/favicon.png">

  <?= $this->fetch('meta') ?>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Core CSS -->
  <?= $this->Html->css([
    '/admin_template/app-assets/fonts/feather/style.min',
    '/admin_template/app-assets/fonts/simple-line-icons/style',
    '/admin_template/app-assets/vendors/css/perfect-scrollbar.min',
    '/admin_template/app-assets/css/app',
    '/admin_template/assets/vendors/typicons/typicons.css',
    '/admin_template/assets/vendors/css/vendor.bundle.base.css',
    '/admin_template/assets/css/style.css',
    '/admin_template/assets/vendors/select2/select2.min.css'
  ]); ?>

  <style>
    body, html {
      font-family: 'Plus Jakarta Sans', sans-serif !important;
      background-color: #f4f7fc !important;
    }
    
    /* Top Navbar Base */
    .navbar {
      background: #ffffff !important;
      box-shadow: 0 1px 15px rgba(0, 0, 0, 0.05) !important;
      border-bottom: 1px solid #e2e8f0 !important;
      height: 65px !important;
      transition: all 0.25s ease !important;
    }

    /* Expanded State (Default) */
    body:not(.sidebar-icon-only) .navbar .navbar-brand-wrapper {
      width: 270px !important;
      height: 65px !important;
      background: #0f172a !important;
      padding: 0 16px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      transition: width 0.25s ease !important;
    }
    body:not(.sidebar-icon-only) .navbar .navbar-menu-wrapper {
      width: calc(100% - 270px) !important;
      height: 65px !important;
      background: #ffffff !important;
      padding-left: 20px !important;
      padding-right: 20px !important;
      transition: width 0.25s ease !important;
    }
    body:not(.sidebar-icon-only) .sidebar {
      width: 270px !important;
      background: #0f172a !important;
      min-height: calc(100vh - 65px) !important;
      padding-top: 15px !important;
      transition: width 0.25s ease !important;
    }
    body:not(.sidebar-icon-only) .main-panel {
      width: calc(100% - 270px) !important;
      min-height: calc(100vh - 65px) !important;
      background: #f4f7fc !important;
      transition: width 0.25s ease !important;
    }

    /* Collapsed / Icon-Only State (Toggled via 3-dash button) */
    body.sidebar-icon-only .navbar .navbar-brand-wrapper {
      width: 70px !important;
      height: 65px !important;
      background: #0f172a !important;
      padding: 0 10px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      transition: width 0.25s ease !important;
    }
    body.sidebar-icon-only .navbar .navbar-brand-wrapper .brand-logo-text {
      display: none !important;
    }
    body.sidebar-icon-only .navbar .navbar-menu-wrapper {
      width: calc(100% - 70px) !important;
      height: 65px !important;
      background: #ffffff !important;
      transition: width 0.25s ease !important;
    }
    body.sidebar-icon-only .sidebar {
      width: 70px !important;
      background: #0f172a !important;
      transition: width 0.25s ease !important;
    }
    body.sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-title,
    body.sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-arrow {
      display: none !important;
    }
    body.sidebar-icon-only .sidebar .nav .nav-item .nav-link {
      justify-content: center !important;
      padding: 14px 0 !important;
    }
    body.sidebar-icon-only .sidebar .nav .nav-item .nav-link i {
      margin-right: 0 !important;
      font-size: 18px !important;
    }
    body.sidebar-icon-only .main-panel {
      width: calc(100% - 70px) !important;
      transition: width 0.25s ease !important;
    }

    /* Common Brand & Toggler Styles */
    .navbar .navbar-brand-wrapper .navbar-toggler {
      position: static !important;
      margin: 0 !important;
      padding: 6px 10px !important;
      color: #ffffff !important;
      background: transparent !important;
      border: none !important;
      outline: none !important;
      font-size: 20px !important;
      cursor: pointer !important;
    }

    /* Sidebar Navigation Links */
    .sidebar .nav {
      padding: 0 12px !important;
    }
    .sidebar .nav .nav-item {
      margin-bottom: 4px !important;
    }
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link {
      color: #cbd5e1 !important;
      font-size: 14px !important;
      font-weight: 500 !important;
      padding: 12px 16px !important;
      border-radius: 8px !important;
      display: flex !important;
      align-items: center !important;
      transition: all 0.2s ease !important;
      background: transparent !important;
    }
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link i {
      color: #94a3b8 !important;
      font-size: 16px !important;
      margin-right: 12px !important;
      width: 20px !important;
      text-align: center !important;
      transition: color 0.2s ease !important;
    }
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link span,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link .menu-title {
      color: #cbd5e1 !important;
      font-size: 14px !important;
    }
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link .menu-arrow {
      color: #94a3b8 !important;
    }
    
    /* Active & Hover States for Top Level Items */
    .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link:hover {
      background: #2563eb !important;
      color: #ffffff !important;
    }
    .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link i,
    .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link span,
    .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link .menu-title,
    .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link .menu-arrow,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link:hover i,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link:hover span,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link:hover .menu-title,
    .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link:hover .menu-arrow {
      color: #ffffff !important;
    }

    /* Submenu Styling */
    .sidebar .nav .sub-menu {
      background: #090d16 !important;
      border-radius: 8px !important;
      margin-top: 4px !important;
      padding: 8px 12px !important;
      list-style: none !important;
    }
    .sidebar .nav .sub-menu .nav-item {
      margin-bottom: 2px !important;
    }
    .sidebar .nav .sub-menu .nav-item .nav-link {
      color: #94a3b8 !important;
      font-size: 13px !important;
      font-weight: 500 !important;
      padding: 8px 14px !important;
      border-radius: 6px !important;
      background: transparent !important;
      display: flex !important;
      align-items: center !important;
    }
    .sidebar .nav .sub-menu .nav-item .nav-link span,
    .sidebar .nav .sub-menu .nav-item .nav-link .menu-title {
      color: #94a3b8 !important;
    }
    .sidebar .nav .sub-menu .nav-item .nav-link:hover,
    .sidebar .nav .sub-menu .nav-item .nav-link.active {
      background: rgba(255, 255, 255, 0.12) !important;
      color: #38bdf8 !important;
    }
    .sidebar .nav .sub-menu .nav-item .nav-link:hover span,
    .sidebar .nav .sub-menu .nav-item .nav-link:hover .menu-title,
    .sidebar .nav .sub-menu .nav-item .nav-link.active span,
    .sidebar .nav .sub-menu .nav-item .nav-link.active .menu-title {
      color: #38bdf8 !important;
    }

    /* Main Panel & Page Body Wrapper */
    .page-body-wrapper {
      padding-top: 65px !important;
    }

    /* Cards & Components */
    .admin-hero-banner {
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%) !important;
      color: #ffffff !important;
      border-radius: 16px !important;
      padding: 30px !important;
      margin-bottom: 25px !important;
      box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2) !important;
    }
    .stat-card-pro {
      background: #ffffff !important;
      border-radius: 14px !important;
      padding: 24px !important;
      border: 1px solid #e5e7eb !important;
      transition: all 0.25s ease !important;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03) !important;
    }
    .stat-card-pro:hover {
      transform: translateY(-4px) !important;
      box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08) !important;
    }
    .stat-icon-wrapper {
      width: 54px !important;
      height: 54px !important;
      border-radius: 12px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 24px !important;
    }
    .bg-icon-primary { background: #eff6ff !important; color: #2563eb !important; }
    .bg-icon-success { background: #f0fdf4 !important; color: #16a34a !important; }
    .bg-icon-warning { background: #fffbeb !important; color: #d97706 !important; }
    .bg-icon-danger { background: #fef2f2 !important; color: #dc2626 !important; }
    .bg-icon-purple { background: #faf5ff !important; color: #9333ea !important; }
    .card-modern {
      background: #ffffff !important;
      border-radius: 14px !important;
      border: 1px solid #e5e7eb !important;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03) !important;
    }
    .table-modern th {
      background: #f9fafb !important;
      font-weight: 600 !important;
      text-transform: uppercase !important;
      font-size: 11px !important;
      letter-spacing: 0.5px !important;
      color: #6b7280 !important;
      border-bottom: 1px solid #e5e7eb !important;
    }

    /* Mobile Responsive Offcanvas */
    @media (max-width: 991px) {
      .navbar .navbar-brand-wrapper {
        width: 100% !important;
      }
      .navbar .navbar-menu-wrapper {
        width: 100% !important;
      }
      .main-panel {
        width: 100% !important;
      }
      .sidebar-offcanvas {
        position: fixed !important;
        top: 65px !important;
        bottom: 0 !important;
        left: -270px !important;
        transition: left 0.25s ease !important;
        z-index: 9999 !important;
      }
      .sidebar-offcanvas.active {
        left: 0 !important;
      }
    }
  </style>

  <?= $this->fetch('scriptTop'); ?>
</head>

<body>
  <div class="container-scroller">
    <?= $this->element('header') ?>

    <div class="main-panel">
      <div class="content-wrapper p-4">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
      </div>
      <?= $this->element('footer') ?>
    </div>
  </div>
</body>

<script>
  var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';

  // Reliable Toggle Handlers for 3-dash button
  document.addEventListener('DOMContentLoaded', function () {
    var minBtns = document.querySelectorAll('[data-toggle="minimize"]');
    minBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        document.body.classList.toggle('sidebar-icon-only');
      });
    });

    var offBtns = document.querySelectorAll('[data-toggle="offcanvas"]');
    offBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var sidebar = document.querySelector('.sidebar-offcanvas');
        if (sidebar) sidebar.classList.toggle('active');
      });
    });
  });
</script>

<?= $this->Html->script([
  '/admin_template/assets/vendors/js/vendor.bundle.base.js',
  '/admin_template/assets/js/template.js',
  '/admin_template/assets/js/settings.js',
  '/admin_template/assets/js/todolist.js',
  '/admin_template/assets/js/dashboard.js',
  '/admin_template/assets/js/typeahead.bundle.min.js',
  '/admin_template/assets/js/file-upload.js',
  '/admin_template/assets/js/select2.js'
]); ?>

<?= $this->fetch('scriptBottom'); ?>

</html>