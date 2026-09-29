<style>
  body {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .admin-login-card {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    margin-top: 80px;
  }
  .brand-logo-wrap {
    background: #111827;
    border-radius: 12px;
    padding: 14px 24px;
    display: inline-flex;
    align-items: center;
    gap: 12px;
  }
</style>
<body>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0 min-vh-100" style="background: transparent;">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 col-md-6 mx-auto">
          <div class="admin-login-card text-center py-5 px-4 px-sm-5">
            <div class="brand-logo-wrap mb-4">
              <img src="/img/logo.png" style="height: 48px; width: auto; object-fit: contain;" alt="Agshov Logo">
              <span class="fw-bold fs-4 text-white">Agshov Admin</span>
            </div>
            <h4 class="fw-bold text-dark mb-1">Agshov Pharmaceuticals</h4>
            <p class="text-muted small mb-4">Sign in with your administrative credentials to continue.</p>

            <?= $this->Flash->render() ?>

            <?= $this->Form->create([], ['class' => 'text-start', 'validate']) ?>
            <div class="form-group mb-3">
              <label for="exampleInputEmail1" class="form-label small fw-semibold text-muted">Email Address</label>
              <input type="email" class="form-control form-control-lg rounded-3" name="email" id="exampleInputEmail1" placeholder="admin@example.com" required>
            </div>
            <div class="form-group mb-4">
              <label for="exampleInputPassword1" class="form-label small fw-semibold text-muted">Password</label>
              <input type="password" class="form-control form-control-lg rounded-3" name="password" id="exampleInputPassword1" placeholder="••••••••" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg rounded-3 font-weight-bold py-3">Sign In to Dashboard</button>
            </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>