<!-- Display all studios -->
<h2>Manage Studio</h2>
<h3>Add Studio</h3>
<form action="/studioAPI" method="post">
    <input type="text" id="studioName" name="studioName" placeholder="Studio Name" required>
    <input type="text" id="status" name="status" placeholder="Status" required>
    <input type="text" id="capacity" name="capacity" placeholder="capacity (Max 100)" required>
    <button type="submit">Add Studio</button>
</form>

<h3>Update Studio</h3>
<!-- Update form for studio -->
<form action="/studioAPI/update/" method="post" id="updateForm">
<input type="hidden" name="_method" value="PUT">
    <!-- Dropdown for studio selection -->
    <select name="studioID" id="studioID"> 
        <?php foreach ($studios as $studio): ?>
            <option value="<?= $studio['studioID'] ?>"><?= esc($studio['studioName']) ?></option>
        <?php endforeach ?>
    </select>

    <!-- Input for capacity (with the option to leave it empty) -->
    <label for="capacity">New Capacity:</label>
    <input type="number" id="capacity" name="capacity">

    <!-- Input for availability (with the option to leave it empty) -->
    <label for="availability">New Availability:</label>
    <select id="availability" name="availability">
        <option value="1">Available</option>
        <option value="0">Not Available</option>
    </select>

    <!-- Submit button -->
    <button type="button" onclick="updateStudio()">Update Studio</button>
</form>

<?php if (! empty($studios) && is_array($studios)): ?>
    <table>
    <tr>
        <th>ID</th>
        <th>Studio Name</th>
        <th>Availability</th>
        <th>Capacity</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($studios as $studio): ?>
    <tr>
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
            <form action="/studioAPI/<?= $studio['studioID'] ?>" method="post">
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
    function updateStudio() {
        var studioID = document.getElementById('studioID').value;
        document.getElementById('updateForm').action = '/studioAPI/update/' + studioID;
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