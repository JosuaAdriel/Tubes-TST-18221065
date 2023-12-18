<?php if (!empty($paymentInfo) && is_array($paymentInfo)) : ?>
    <table>
        <tr>
            <th>Payment ID</th>
            <th>Payment Date</th>
            <th>Buyer's Email</th>
            <th>Payment Total</th>
            <th>Payment Method</th>
            <th>Movie Title</th>
            <th>Show Time</th>
            <th>Seats</th>
        </tr>
        <?php foreach ($paymentInfo as $paymentInfo_Item) : ?>
            <tr>
                <td><?= esc($paymentInfo_Item['paymentId']) ?></td>
                <td><?= esc($paymentInfo_Item['paymentDate']) ?></td>
                <td><?= esc($paymentInfo_Item['email']) ?></td>
                <td><?= esc($paymentInfo_Item['totalPrice']) ?></td>
                <td><?= esc($paymentInfo_Item['paymentMethod']) ?></td>
                <td><?= esc($paymentInfo_Item['movieName']) ?></td>
                <td><?= esc($paymentInfo_Item['showtime']) ?></td>
                <td><?= esc($paymentInfo_Item['seats']) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php else : ?>
    <h3>No Data</h3>
    <p>Unable to find any data for you.</p>
<?php endif ?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
</style>

<!-- Display Total Payment for All Time -->
<h2>Total Payment for All Time: <?php echo number_format($totalPaymentForAllTime, 2); ?></h2>
<!-- 
 Form to input date 
<form method="post" action="">
    <label for="inputDate">Enter Date (YYYY-MM-DD):</label>
    <input type="text" id="inputDate" name="inputDate">
    <button type="submit">Get Total Payment</button>
</form>

Display Total Payment by Date 
<?php if ($totalPaymentByDate > 0) : ?>
    <h3>Total Payment for <?php echo $inputDate; ?>: <?php echo number_format($totalPaymentByDate, 2); ?></h3>
<?php else : ?>
    <p>No payments found for the selected date.</p>
<?php endif ?>
 -->
