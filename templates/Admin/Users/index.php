<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_exporttable_to_xls');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        return dl ? XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) : XLSX.writeFile(wb, fn || ('UserList.' + (type || 'xlsx')));
    }
</script>

<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Users & Customers</h3>
        <p class="text-muted small mb-0">Manage system administrators, staff accounts, and registered customer details.</p>
    </div>
    <div class="col-auto d-flex gap-2">
        <button onclick="ExportToExcel('xlsx')" class="btn btn-outline-success rounded-pill px-3 me-2">
            <i class="fa-solid fa-file-excel me-1"></i> Export to Excel
        </button>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add User
        </a>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <div class="mb-4">
            <?= $this->element('search'); ?>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0" id="tbl_exporttable_to_xls">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Joining Date</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users) && count($users) > 0): ?>
                        <?php $k = 1; foreach ($users as $user):
                            if ($user->is_vendor == 1) {
                                $roleBadge = '<span class="badge badge-info bg-info bg-opacity-10 text-info font-weight-bold px-3 py-1">Sub Admin</span>';
                            } else if ($user->is_customer == 1) {
                                $roleBadge = '<span class="badge badge-warning bg-warning bg-opacity-10 text-dark font-weight-bold px-3 py-1">Customer</span>';
                            } else {
                                $roleBadge = '<span class="badge badge-primary bg-primary bg-opacity-10 text-primary font-weight-bold px-3 py-1">Admin</span>';
                            }
                        ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $k++ ?></td>
                                <td>
                                    <span class="text-muted small">
                                        <?= $user->date_of_registration ? date("d M Y", strtotime($user->date_of_registration)) : '-' ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($user->name) ?></strong>
                                </td>
                                <td>
                                    <span class="text-dark"><?= h($user->email) ?></span>
                                </td>
                                <td>
                                    <span class="text-muted small"><?= h($user->mobile ?? '-') ?></span>
                                </td>
                                <td><?= $roleBadge ?></td>
                                <td>
                                    <?php if ($user->is_active == 1): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger bg-danger text-white px-3 py-1 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?php if ($this->request->getSession()->read('Auth.User.id') == 1): ?>
                                        <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-circle me-1', 'title' => __('Edit User')]) ?>
                                        <?= $this->Html->link('<i class="fa-solid fa-shield-halved"></i>', ['action' => 'role', $user->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-info rounded-circle me-1', 'title' => __('Module Permissions')]) ?>
                                    <?php endif; ?>
                                    <?= $this->Html->link('<i class="fa-solid fa-key"></i>', ['action' => 'changepassword', $user->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-warning rounded-circle', 'title' => __('Change Password')]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
            <div class="small text-muted mb-2 mb-md-0">
                <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <?= $this->Paginator->prev('« Previous', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                    <?= $this->Paginator->numbers(['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                    <?= $this->Paginator->next('Next »', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?= $this->Html->script(['/admin_template/js/grab.js'], ['block' => 'scriptBottom']); ?>