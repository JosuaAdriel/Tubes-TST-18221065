
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class=" mb-2 text-gray-800">Payment</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sang Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Tabel -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Cinemax Payment</h6>
                    <h6 class="m-0 font-weight-bold text-primary text-end" >Total Payment: Rp<?php echo number_format($totalPaymentForAllTime, 2); ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php if (!empty($paymentInfo) && is_array($paymentInfo)) : ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr >
                    <th>Payment ID</th>
                    <th>Payment Date</th>
                    <th>Buyer's Email</th>
                    <th>Payment Amount</th>
                    <th>Payment Method</th>
                    <th>Movie Title</th>
                    <th>Show Time</th>
                    <th>Seats</th>
                </tr>
                <?php foreach ($paymentInfo as $paymentInfo_Item) : ?>
            <tr>
                <td style="text-align: center;"><?= esc($paymentInfo_Item['paymentId']) ?></td>
                <td><?= esc($paymentInfo_Item['paymentDate']) ?></td>
                <td><?= esc($paymentInfo_Item['email']) ?></td>
                <td>Rp<?= esc($paymentInfo_Item['totalPrice']) ?></td>
                <td><?= esc($paymentInfo_Item['paymentMethod']) ?></td>
                <td><?= esc($paymentInfo_Item['movieName']) ?></td>
                <td><?= esc($paymentInfo_Item['showtime']) ?></td>
                <td><?= esc($paymentInfo_Item['seats']) ?></td>
            </tr>
        <?php endforeach ?>
            </table>
            <?php else: ?>
            <h3>No Data</h3>
            <p>Unable to find any data for you.</p>
            <?php endif ?>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->