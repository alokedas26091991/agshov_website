<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-section">
                    <div class="name-heading">
                        <div class="userblock">
                            <div class="usericon"><img src="/img/profile-user.png" alt="" class="img-fluid"></div>
                            <div class="username">
                                <small>Hello</small><br>
                                <b><?= $user1->name ?></b><br>

                            </div>
                        </div>
                    </div>
                    <ul class="accountlist">
                        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "myaccount"]); ?>">
                                <img src="/img/end-user.png" alt=""> Account Information </a></li>
                        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "changepassword"]); ?>"> <img src="/img/reset-password.png" alt=""> Change Password</a></li>
                        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>"> <img src="/img/address-book.png" alt=""> Address Book</a></li>
                        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "myorders"]); ?>"> <img src="/img/delivery-man.png" alt=""> My Orders</a></li>

                        <li class="active"><a href="<?php echo $this->Url->build(["controller" => "Home", "action" => "booking_list"]); ?>"> <img src="/img/wishlist.png" alt=""> My Bookings</a></li>
                        <li><a href="<?php echo $this->Url->build("/Login/logout"); ?>" ONCLICK="javascript: return confirm( ' Are you sure you want to Logout?');" class="logout"> <img src="/img/check-out.png" alt=""> Logout</a>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="account-section">
                    <h1 class="name-heading mt-0">Booking Details</h1>

                    <div class="block-content">

                        <div>
                        </div>
                        <div class="clr"></div>
                        <div class="tables" style="overflow:auto;">
                            <table class="table table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Date</th>
                                        <!--<th scope="col">Booking Type</th>-->
                                        <th scope="col">Expected Appointment Date & Time</th>
                                        <th scope="col">Appointment Details</th>
                                        <th scope="col">Appointment Type</th>
                                        <th scope="col">Payment Mode</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Given Appointment Date & Time</th>
                                        <th scope="col">Video Link</th>
                                        <th scope="col">Status</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 0;
                                    foreach ($book as $b) {
                                        $k++;
                                        if ($b->payment_mode == 0) {
                                                    $d = "OFFLINE";
                                                } elseif ($b->payment_mode == 1) {
                                                    $d = "ONLINE";
                                                }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $k ?></th>
                                            <td><?= date("d-m-Y", strtotime($b->created_at)) ?></td>

                                            <!--<td><?= $b->booking_type == 0 ? "New" : "Old" ?></td>-->
                                             <td>
                                                        <?php
                                                        if ($b->expected_appointment_date) {
                                                            echo date("d-m-Y", strtotime($b->expected_appointment_date)) . " | " . date("H:i:s A", strtotime($b->expected_appointment_time));
                                                        }
                                                        ?>
                                                    </td>
                                            <td><?= $b->appointment_details ?></td>
                                            <td><?= $b->appointment_type == 0 ? "Video" : "At Clinic" ?></td>
                                            <td><?= $d ?></td>
                                            <td><?= $b->package_amount ?></td>
                                            <td>
                                                        <?php
                                                        if ($b->appointment_date) {
                                                            echo date("d-m-Y", strtotime($b->appointment_date)) . " | " . date("H:i:s A", strtotime($b->appointment_time));
                                                        }
                                                        ?>
                                                    </td>
                                            <td>
                                                <?php
                                                if ($b->video_link) {
                                                ?>
                                                    <a href="<?= $b->video_link ?>" target="_blank">Open</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($b->status == 0) {
                                                    echo "Pending";
                                                } else if ($b->status == 2) {
                                                    echo "Confirmed";
                                                } else if ($b->status == 3) {
                                                    echo "Cancelled";
                                                } else {
                                                    echo "Completed";
                                                }
                                                ?>
                                            </td>



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
    </div>
</section>
<?= $this->Html->script(['/admin_template/js/grab.js'], ['block' => 'scriptBottom']); ?>