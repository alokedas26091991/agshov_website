<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order Details</h4><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Photo</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($invoice1 as $inv): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= h($inv->product->name) ?></td>
                                <td>
                                    <a href="/upload/product/<?= h($inv->product->photo) ?>" target="_blank">
                                        <img src="/upload/product/<?= h($inv->product->photo) ?>" height="150" width="150" alt="Product Image">
                                    </a>
                                </td>
                                <td><?= $this->Number->format($inv->product->offer_price) ?></td>
                                <td><?= h($inv->quantity) ?></td>
                            </tr>
                        <?php endforeach; ?>
