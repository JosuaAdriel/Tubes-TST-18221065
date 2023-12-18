
        <!-- Add Studio Modal -->
        <div class="modal fade" id="addStudio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="addStudioLabel">Add New Studio</h2>
            </div>
            <form action="/studio" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="studioName" class="form-label">Studio Name</label>
                        <input type="text" class="form-control" id="studioName" name="studioName" placeholder="Studio Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Availability Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status0" value="0" required>
                            <label class="form-check-label" for="status0">Not Available</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                            <label class="form-check-label" for="status1">Available</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity" placeholder="capacity (Max 100)" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Edit Studio Modal -->
        <div class="modal fade" id="editStudio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStudioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="editStudioLabel">Edit Studio</h2>
            </div>
            <form action="/studio/update" method="post" id="updateForm">
            <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Studio Name</label>
                            <select name="studioID" id="studioID" class="form-control" required> 
                                <?php foreach ($studios as $studio): ?>
                                    <option value="<?= $studio['studioID'] ?>"><?= esc($studio['studioName']) ?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="availability" class="form-label">Availability Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="availability" value="0">
                            <label class="form-check-label" for="availability0">Not Available</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="availability" value="1">
                            <label class="form-check-label" for="status1">Available</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Studio Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Studio Capacity" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateStudio()">Edit Studio</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class=" mb-2 text-gray-800">Studio Management</h1>

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
            <h6 class="m-0 font-weight-bold text-primary text-start">Studio List</h6>
            <div class="d-flex" style="margin-left: 10px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStudio">Edit Studio</button>
                <div style="width: 10px;"></div>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addStudio">Add Studio</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php if (! empty($studios) && is_array($studios)): ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Studio Name</th>
                    <th>Availability</th>
                    <th>Capacity</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($studios as $studio): ?>
                <tr style="text-align: center;">
                    <td><?= esc($studio['studioID']) ?></td>
                    <td><?= esc($studio['studioName']) ?></td>
                    <td>
                        <?php 
                            // Check status value and display appropriate text
                            echo ($studio['status'] == 1) ? 'Available' : 'Not Available';
                        ?>
                    </td>
                    <td><?= esc($studio['capacity']) ?></td>
                    <td>
                        <!-- Delete button -->
                        <form action="/studio/<?= $studio['studioID'] ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
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