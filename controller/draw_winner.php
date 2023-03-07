<?php 


sleep(3);

require_once '../config/connection.php';

if(!isset($_POST['key'])) {
    header("HTTP/1.0 404 Not Found");
}else {

    $paidParticipant = $raffle->selectPaidParticipant();
    $eligible = array();
    
    $participantCounter = 0;
    
    while ($row_participant = $paidParticipant['result']->fetch(PDO::FETCH_ASSOC)) {
        $eligible[$participantCounter] = $row_participant['ticket_id'];
        $participantCounter++;
    }

    if(!empty($eligible)) {

        $eligibleNumber = $paidParticipant['count'];
    
        $random = rand(0, ($eligibleNumber - 1));

        $winner = $eligible[$random];

        $raffle->insertWinner($winner);
        $raffle->excludeFromRaffle($winner);
        $raffle->clearIndexStatus();

        echo '
        <div class="card border-light mb-3" style="max-width: 20rem;">
        <div class="card-header">Congratulations!</div>
            <div class="card-body">
                <h3 class="card-title text-center">'. $winner .'</h3>
            </div>
        </div>';
    }else {

        echo '
        <div class="card border-light mb-3" style="max-width: 20rem;">
        <div class="card-header">Notice!</div>
            <div class="card-body">
                <h4 class="card-title">There are no particicipant eligible in this raffle. </h4>
            </div>
        </div>';

    }
    
?>

<?php } ?>
