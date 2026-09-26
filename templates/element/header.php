<?php
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');
$active = $this->request->getAttribute('params');
?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-between align-items-center px-3">
    <a href="/admin/users/dashboard" class="navbar-brand brand-logo d-flex align-items-center gap-2 text-white text-decoration-none">
      <img src="/assets/img/logo-white.png" alt="Dauji Logo" style="height: 36px; width: auto; object-fit: contain;">
      <span class="fw-bold fs-5 text-white brand-logo-text" style="letter-spacing: 0.3px; white-space: nowrap;">Dauji Admin</span>
    </a>
    <button class="navbar-toggler align-self-center text-white" type="button" data-toggle="minimize">
      <i class="fa-solid fa-bars"></i>
    </button>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between px-3">
    <div class="d-flex align-items-center gap-3">
      <a href="/" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 d-flex align-items-center gap-2">
        <i class="fa-solid fa-globe"></i>
        <span>View Live Site</span>
      </a>
    </div>

    <ul class="navbar-nav me-lg-2">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-weight: 700;">
            <i class="fa-solid fa-user-shield"></i>
          </div>
          <span class="nav-profile-name fw-semibold text-dark"><?= h($this->request->getSession()->read('Auth.User.name') ?: 'Administrator') ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown shadow-lg rounded-3 border-0 mt-2" aria-labelledby="profileDropdown">
          <?php $adminUserId = $this->request->getSession()->read('Auth.User.id') ?: 1; ?>
          <a href="/admin/users/edit/<?= $adminUserId ?>" class="dropdown-item py-2">
            <i class="fa-solid fa-user me-2 text-primary"></i><span>My Profile</span>
          </a>
          <a href="/admin/users/changepassword/<?= $adminUserId ?>" class="dropdown-item py-2">
            <i class="fa-solid fa-key me-2 text-warning"></i><span>Change Password</span>
          </a>
          <div class="dropdown-divider my-1"></div>
          <a href="/admin/users/logout" class="dropdown-item py-2 text-danger">
            <i class="fa-solid fa-right-from-bracket me-2 text-danger"></i><span>Logout</span>
          </a>
        </div>
      </li>
    </ul>
    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <i class="fa-solid fa-bars"></i>
    </button>
  </div>
</nav>

<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item <?= ($active['action'] == 'dashboard') ? 'active' : '' ?>">
        <a href="/admin/users/dashboard" class="nav-link d-flex align-items-center">
          <i class="fa-solid fa-gauge me-2"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <?php
      if (!empty($menu_array) && is_array($menu_array)) {
        foreach ($menu_array as $controllerName => $value) {
          $controller_class_active = '';
          $collapse_show = '';
          if (is_array($value)) {
            if ($controllerName == $active['controller']) {
              $controller_class_active = 'active';
              $collapse_show = 'show';
            }
        ?>
            <li class="nav-item <?= $controller_class_active ?>">
              <a class="nav-link" data-bs-toggle="collapse" href="#<?= $controllerName ?>" aria-expanded="<?= $controller_class_active ? 'true' : 'false' ?>" aria-controls="<?= strtolower($controllerName) ?>">
                <i class="fa-solid fa-folder me-2"></i>
                <span class="menu-title"><?= h($value['caption']) ?></span>
                <i class="fa-solid fa-chevron-down menu-arrow ms-auto"></i>
              </a>
              <div class="collapse <?= $collapse_show ?>" id="<?= $controllerName ?>">
                <ul class="nav flex-column sub-menu ps-3">
                  <?php foreach ($value['links'] as $l => $cap) {
                    $method_class_active = '';
                    if ($l == $active['action'] && $controllerName == $active['controller']) {
                      $method_class_active = 'active';
                    }
                  ?>
                    <li class="nav-item">
                      <?= $this->Html->link('<span class="menu-title">' . h($cap) . '</span>', ['controller' => \Cake\Utility\Inflector::dasherize($controllerName), 'action' => \Cake\Utility\Inflector::dasherize($l), 'prefix' => 'Admin', '_full' => true], ['class' => 'nav-link ' . $method_class_active, 'escape' => false]) ?>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
        <?php
          }
        }
      }
      ?>

    </ul>
  </nav>