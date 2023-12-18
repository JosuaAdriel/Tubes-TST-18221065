
        <!-- Add Film Modal -->
        <div class="modal fade" id="addFilm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addFilmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="addFilmLabel">Add New Film</h2>
            </div>
            <form action="/movie" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Film Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Film Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Film Synopsis</label>
                        <input type="text" class="form-control" id="synopsis" name="synopsis" placeholder="Film Synopsis" required>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Film Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" placeholder="Film Genre" required>
                    </div>
                    <div class="mb-3">
                        <label for="durationInMins" class="form-label">Film Duration (mins)</label>
                        <input type="number" class="form-control" id="durationInMins" name="durationInMins" placeholder="Film Duration (mins)" required>
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Film Director</label>
                        <input type="text" class="form-control" id="director" name="director" placeholder="Film Director" required>
                    </div>
                    <div class="mb-3">
                        <label for="cast" class="form-label">Film Cast</label>
                        <input type="text" class="form-control" id="cast" name="cast" placeholder="Film Cast" required>
                    </div>
                    <div class="mb-3">
                        <label for="posterImg" class="form-label">Upload Film Poster</label>
                        <input class="form-control" type="file" id="posterImg" name="posterImg">
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

        <!-- Edit Film Modal -->
        <div class="modal fade" id="editFilm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFilmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="editFilmLabel">Edit Film</h2>
            </div>
            <form action="/movie/update/" method="post" id="updateForm">
            <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="movieID" class="form-label">Current Film Title</label>
                        <select name="movieID" id="movieID" class="form-control"> 
                                <?php foreach ($movie as $movie_item): ?>
                                    <option value="<?= $movie_item['movieID'] ?>"><?= esc($movie_item['title']) ?></option>
                                <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">New Film Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Film Title">
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">New Film Synopsis</label>
                        <input type="text" class="form-control" id="synopsis" name="synopsis" placeholder="Film Synopsis">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">New Film Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" placeholder="Film Genre" >
                    </div>
                    <div class="mb-3">
                        <label for="durationInMins" class="form-label">New Film Duration (mins)</label>
                        <input type="number" class="form-control" id="durationInMins" name="durationInMins" placeholder="Film Duration (mins)">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">New Film Director</label>
                        <input type="text" class="form-control" id="director" name="director" placeholder="Film Director">
                    </div>
                    <div class="mb-3">
                        <label for="cast" class="form-label">New Film Cast</label>
                        <input type="text" class="form-control" id="cast" name="cast" placeholder="Film Cast">
                    </div>
                        <hp>*Untuk pengubahan poster film, silakan hapus film dan masukkan data dari awal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateMovie()">Edit</button>
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
                <h1 class=" mb-2 text-gray-800">Movie Management</h1>

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
            <h6 class="m-0 font-weight-bold text-primary text-start">Movie List</h6>
            <div class="d-flex" style="margin-left: 10px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editFilm">Edit Film</button>
                <div style="width: 10px;"></div>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addFilm">Add Film</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <?php if (! empty($movie) && is_array($movie)): ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr style="text-align: center;">
                            <th>Title</th>
                            <th>Synopsis</th>
                            <th>Genre</th>
                            <th>Duration</th>
                            <th>Director</th>
                            <th>Cast</th>
                            <th>Delete</th>
                        </tr>
                        <?php foreach ($movie as $movie_item): ?>
                        <tr style="text-align: center;">
                            <td><?= esc($movie_item['title']) ?></td>
                            <td><?= esc($movie_item['synopsis']) ?></td>
                            <td><?= esc($movie_item['genre']) ?></td>
                            <td><?= esc($movie_item['durationInMins']) ?></td>
                            <td><?= esc($movie_item['director']) ?></td>
                            <td><?= esc($movie_item['cast']) ?></td>
                            <td>
                                <!-- Delete button -->
                                <form action="/movie/<?= $movie_item['movieID'] ?>" method="post">
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