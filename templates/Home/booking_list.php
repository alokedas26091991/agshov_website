<style>
.account-section .block-content, .checkout-section .block-content {
    width: 100%;
    display: block;
    padding: 15px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,.4);
    margin-bottom: 20px;
}
</style>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">MY BOOKING</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="">
        <div class="row bg-custom">
            <div class="col-lg-3">
                <div class="left-side-dashboard-login">
                    <div class="account-section">
                        <div class="name-heading">
                            <div class="userblock">
                                <div class="usericon"><img src="/img/user-icon.png" alt="" class="img-fluid"></div>
                                <div class="username">
                                    <small>Hello</small><br>
                                    <b><?= $user1->name ?></b><br>
                                </div>
                            </div>
                        </div>
                        <ul class="accountlist">
                            <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "myaccount"]); ?>">
                                    <img src="/img/user-icon.png" alt="" class="mx-3"> Account Information </a></li>
                            <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "changepassword"]); ?>"> <img src="/img/icons8-password-128.png" alt="" class="mx-3"> Change Password</a></li>
                            <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>"> <img src="/img/icons8-home-address-100.png" alt="" class="mx-3"> Address Book</a></li>
                            <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "myorders"]); ?>"> <img src="/img/icons8-logistics-32.png" alt="" class="mx-3"> My Orders</a></li>
                            <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "booking_list"]); ?>"> <img src="/img/icons8-logistics-32.png" alt="" class="mx-3"> My Bookings</a></li>
                            <li class=""><a href="<?php echo $this->Url->build(["controller" => "ViewCarts", "action" => "wishlist1"]); ?>"> <img src="/img/icons8-wishlist-50.png" alt="" class="mx-3"> My Wishlist</a></li>
                            <li><a href="<?php echo $this->Url->build("/Login/logout"); ?>" ONCLICK="javascript: return confirm( ' Are you sure you want to Logout?');" class="logout"> <img src="/img/icons8-logout-25.png" alt="" class="mx-3"> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="account-section mt-4">
                    <h1 class="name-heading mt-0">My Booking</h1>
                    <div class="block-content">
                        <div>
                        </div>
                        <div class="clr"></div>
                        <table class="my-orders">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>User Name</th>
                                    <th>Patient Name</th>
                                    <th>Patient Mobile</th>
                                    <th>Patient Email</th>
                                    <th>Patient Age</th>
                                    <th>Patient Gender</th>
                                    <th>Service Name</th>
                                    <th>Service Amount</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $k = 0;
                                foreach ($book as $b) {
                                    $k++;
                                ?>
                                    <tr>
                                        <td><?= date("d-m-Y", strtotime($b->created_at)) ?> </td>
                                        <td><?= $b->user->name ?></td>
                                        <td><?= $b->patient_name ?></td>
                                        <td><?= $b->patient_mobile ?></td>
                                        <td><?= $b->patient_email ?></td>
                                        <td><?= $b->age ?></td>
                                        <td><?= $b->sex ?></td>
                                        <td><?= $b->package->name ?></td>
                                        <td><?= $b->package->price ?></td>
                                        <td><?= $b->status == 1 ? "Open" : "Closed" ?></td>
                                        <!-- <td>
                                                <a target="_blank" class="btn btn-primary" href="<?php echo $this->Url->build(["controller" => "Home", "action" => "booking_details", $b->id]); ?>">Details</a>
                                            </td> -->
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->