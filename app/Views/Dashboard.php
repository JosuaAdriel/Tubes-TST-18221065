
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class=" mb-2 text-gray-800">Dashboard</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Schedule Movie</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php if (! empty($schedules) && is_array($schedules)): ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Movie</th>
                    <th>Studio Name</th>
                    <th>Show Time</th>
                    <th>Price</th>
                    <th>Capacity</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= esc($schedule['title']) ?></td>
                    <td><?= esc($schedule['studioName']) ?></td>
                    <td><?= esc($schedule['showtime']) ?></td>
                    <td>Rp<?= esc($schedule['price']) ?></td>
                    <td><?= esc($schedule['capacity']) ?></td>
                    <td>
                        <form action="/schedule/delete/<?= $schedule['scheduleID'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
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
