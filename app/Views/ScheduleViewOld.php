<form action="/schedule/create" method="post">
    <label for="movieID">Select Movie:</label>
    <select name="movieID" id="movieID" required>
        <?php foreach ($movies as $movie): ?>
            <option value="<?= $movie['movieID'] ?>"><?= esc($movie['title']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="studioID">Select Studio:</label>
    <select name="studioID" id="studioID" required>
        <?php foreach ($studios as $studio): ?>
            <option value="<?= $studio['studioID'] ?>"><?= esc($studio['studioName']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="showtime">Showtime:</label>
    <input type="datetime-local" id="showtime" name="showtime" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>

    <button type="submit">Add Relation</button>
</form>
<?php if (! empty($schedules) && is_array($schedules)): ?>
    <table>
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
        <td><?= esc($schedule['movieTitle']) ?></td>
        <td><?= esc($schedule['studioName']) ?></td>
        <td><?= esc($schedule['showtime']) ?></td>
        <td><?= esc($schedule['price']) ?></td>
        <td><?= esc($schedule['capacity']) ?></td>
        <td>
            <form action="/schedule/delete/<?= $schedule['scheduleID'] ?>" method="post">
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
