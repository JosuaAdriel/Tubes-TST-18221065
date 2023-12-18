
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class=" mb-2 text-gray-800">Scheduling</h1>

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
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary text-start">Assign The Movie To The Studio</h6>
        </div>
        <div class="card-body">
        <form action="/schedule/create" method="post">
                    <div class="mb-3">
                        <label for="movieName" class="form-label">Select Movie:</label>
                        <select name="movieID" id="movieID" class="form-control" required>
                            <?php foreach ($movies as $movie): ?>
                                <option value="<?= $movie['movieID'] ?>"><?= esc($movie['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="studioID" class="form-label">Select Available Studio:</label>
                        <select name="studioID" id="studioID" class="form-control"> 
                                <?php foreach ($studios as $studio): ?>
                                    <option value="<?= $studio['studioID'] ?>"><?= esc($studio['studioName']) ?></option>
                                <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Show Time</label>
                        <input type="datetime-local" class="form-control" id="showtime" name="showtime"  required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control"  id="price" name="price" step="1" required>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->