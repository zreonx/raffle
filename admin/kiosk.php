<?php
    include_once '../includes/sidenav.php';
    require_once '../config/connection.php';
    include_once '../includes/auth_check.php';

?>

<h1 class="fs-2 mt-2 display-5">Ticket Hub</h1>

<div class="ticket-hub">
    <div class="kiosk" id="kiosk">
        
    </div>
    <div class="ticket-record card">
        <div id="table" class="card-body p-0">

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
        $('#table').html(skeleton());
        setTimeout(function(){
            setInterval(function() {$('#table').load('ticket_records.php'), {
            };},1000),3000
        });
       
        function skeleton() {

            var output = '';
            
                output += '<div class="ph-item">';
                output += '<div class="ph-row">';
                output += '<div class="php-col-12 big mb-2"></div>';
                output += '<div class="php-col-12 mb-2"></div>';
                for(var i = 0; i <= 16; i++) {
                    output += '<div class="php-col-12 mb-2"></div>';
                }
                output += '</div>';
                output += '</div>';

            return output;
        }
        $('#kiosk').html(kioskSkeleton());
        setTimeout(function() {
            $('#kiosk').load('sell_ticket.php');
        }, 1000);
        

        function kioskSkeleton() {

        var output = '';

            output += '<div class="ph-item">';
            output += '<div class="ph-row">';
            output += '<div class="php-col-12 big mb-2"></div>';
            output += '<div class="php-col-12 mb-3"></div>';
            output += '<div class="php-col-12 big mb-2"></div>';
            output += '<div class="php-col-12 mb-2"></div>';
            output += '</div>';
            output += '</div>';
            

        return output;
        }
    });


</script>

<?php include_once '../includes/sidenav-footer.php'; ?>


