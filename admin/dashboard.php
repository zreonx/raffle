<?php
    include_once '../includes/sidenav.php';
    require_once '../config/connection.php';
    include_once '../includes/auth_check.php';

?>

<h1 class="fs-2 mt-2 display-5">Dashboard</h1>
<div class="dashboard ">

    <div class="dashboard-board">
        <div class="tickets p-3">
            <h1 class="fs-5 display-5 text-primary">Tickets</h1>
            <div class="card card-item d-flex justify-content-center align-items-center">
                <div class="card-body ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h3 class="fs-6">All Tickets </h3>
                        <span class="fs-3 text-success">
                            <?php echo $dashboard->allTickets(); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card card-item d-flex justify-content-center align-items-center">
                <div class="card-body ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h3 class="fs-6">Available Tickets </h3>
                        <span class="fs-3 text-success">
                            <?php echo $dashboard->availableTickets(); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card card-item d-flex justify-content-center align-items-center">
                <div class="card-body ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h3 class="fs-6">Purchased Tickets </h3>
                        <span class="fs-3 text-success">
                            <?php echo $dashboard->purchasedTickets(); ?>
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
    <div class="tickets p-3">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="text-primary mb-2">Recent Winner</h5>
        </div>
        <?php
             $result = $dashboard->recentWinner();
             while($row_recent = $result->fetch(PDO::FETCH_ASSOC)):
        ?>

        <div class="d-flex ">
             - <h5><?php echo $row_recent['ticket_id'] ?></h5>
        </div>

        <?php endwhile; ?>

        <div class="card card-item d-flex justify-content-center align-items-center">
            <div class="card-body ">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h3 class="fs-6">Raffle Winners </h3>
                    <span class="fs-3 text-success">
                        <?php echo $dashboard->raffleWinners(); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="card card-item d-flex justify-content-center align-items-center">
            <div class="card-body ">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h3 class="fs-6">Eligible Participants </h3>
                    <span class="fs-3 text-success">
                        <?php echo $dashboard->eligibleParticipants(); ?>
                    </span>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php include_once '../includes/sidenav-footer.php'; ?>


