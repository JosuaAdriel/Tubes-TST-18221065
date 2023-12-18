<h2>Manage Film</h2>
<h3>Add Film</h3>
<form action="/movieAPI" method="post" enctype="multipart/form-data">
    <input type="text" id="title" name="title" placeholder="Film Title" required>
    <input type="text" id="synopsis" name="synopsis" placeholder="Film Synopsis" required>
    <input type="text" id="genre" name="genre" placeholder="Film Genre" required>
    <input type="text" id="durationInMins" name="durationInMins" placeholder="Film Duration (mins)" required>
    <input type="text" id="director" name="director" placeholder="Film Director" required>
    <input type="text" id="cast" name="cast" placeholder="Film Cast" required>
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="posterImg" name="posterImg">
    </div>   
    <button type="submit">Add Film</button>
</form>
<h3>Edit Film</h3>
<form action="/movieAPI/update/" method="post" id="updateForm" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="text" id="movieID" placeholder="Enter Movie ID">
    <input type="text" id="title" name="title" placeholder="Film Title">
    <input type="text" id="synopsis" name="synopsis" placeholder="Film Synopsis">
    <input type="text" id="genre" name="genre" placeholder="Film Genre">
    <input type="text" id="durationInMins" name="durationInMins" placeholder="Film Duration (mins)">
    <input type="text" id="director" name="director" placeholder="Film Director">
    <input type="text" id="cast" name="cast" placeholder="Film Cast">   
    <button type="submit" onclick="updateMovie()">Edit Film</button>
</form>
<?php if (! empty($movie) && is_array($movie)): ?>
    <table>
    <tr>
        <th>Poster</th>
        <th>Title</th>
        <th>Synopsis</th>
        <th>Genre</th>
        <th>Duration</th>
        <th>Director</th>
        <th>Cast</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($movie as $movie_item): ?>
    <tr>
        <td><img src="<?= base_url('posterImg/' . esc($movie_item['posterImg'])) ?>" alt="Image"></td>
        <td><?= esc($movie_item['title']) ?></td>
        <td><?= esc($movie_item['synopsis']) ?></td>
        <td><?= esc($movie_item['genre']) ?></td>
        <td><?= esc($movie_item['durationInMins']) ?></td>
        <td><?= esc($movie_item['director']) ?></td>
        <td><?= esc($movie_item['cast']) ?></td>
        <td>
            <!-- Delete button -->
            <form action="/movieAPI/<?= $movie_item['movieID'] ?>" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<?php else: ?>
<h3>No Data</h3>
<p>Unable to find any data for you.</p>
<?php endif ?>

<script>
    function updateMovie() {
        var movieID = document.getElementById('movieID').value;
        document.getElementById('updateForm').action = '/movieAPI/update/' + movieID;
        document.getElementById('updateForm').submit(); 
    };
</script>

 <style>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
</style>