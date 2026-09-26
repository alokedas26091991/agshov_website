<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Book Now</li>
            </ol>
        </div>
    </nav>
    <section class="">
        <div class="page-content pb-0 mb-3 ">
            <div class="container">
                <h2 class="title mb-2 text-center">Book Now</h2>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <?= $this->Form->create($booking, [
                            'url' => ['controller' => 'Pages', 'action' => 'bookappointment']
                        ]); ?>
                        <div class="form-group col-md-12">
                            <label for="name">Full Name:</label>
                            <input class="form-control" type="text" id="patient_name" name="patient_name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="date">Age:</label>
                            <input class="form-control" type="tel" id="age" name="age" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="service">Select Gender:</label>
                            <select class="form-control" id="sex" name="sex" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" id="patient_email" name="patient_email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="phone">Phone Number:</label>
                            <input class="form-control" type="tel" id="patient_mobile" name="patient_mobile" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="date">Booking Date:</label>
                            <input class="form-control" type="date" id="created_at" name="created_at" required>
                        </div>
                        <!-- <div class="form-group col-md-12">
        <label for="time">Booking Time:</label>
        <input class="form-control" type="time" id="time" name="time" required>
    </div> -->
    <div class="form-group col-md-12">
    <label for="service">Select Service:</label>
    <select class="form-control" id="package_id" name="package_id" required>
        <option value="">Choose a service</option>
        <?php foreach ($packages as $package): ?>
            <option value="<?= h($package->id) ?>" data-price="<?= h($package->price) ?>">
                <?= h($package->name) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group col-md-12">
    <label for="phone">Service Price:</label>
    <input class="form-control" type="text" id="package_price" name="package_price" required readonly>
</div>

                        <button class="btn btn-success" type="submit">Book Now</button>
                        <?= $this->Form->end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#package_id').change(function () {
            // Get selected package's price
            var price = $(this).find(':selected').data('price');
            // Set price field value
            $('#package_price').val(price);
        });
    });
</script>