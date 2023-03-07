<?php 
    require_once '../config/connection.php';
    include_once '../includes/auth_check.php';
    $allTickets = $ticket->getAllTickets();
?>
<table class="table text-center table-hover " id="table">
            
            
<tr class="table-primary ">
    <td>#</td>
    <td>Ticket Number</td>
    <td>Date Purchased</td>
    <td>Status</td>
</tr>
<?php $countRecords = 1; while($ticket_data = $allTickets->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?php echo $countRecords; ?></td>
        <td><?php echo $ticket_data['ticket_id']; ?></td>
        <td><?php echo $ticket_data['date_purchased']; ?></td>
        <td><?php echo ($ticket_data['payment_status'] == "1")? "Purchased" : ""; ?></td>
    </tr>
<?php $countRecords++; endwhile;?>

</table>