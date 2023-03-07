<?php
    require_once '../config/connection.php';
    include_once '../includes/sidenav.php';
    include_once '../includes/auth_check.php';

    $result = $ticket->getPrefix();
?>

<h1 class="fs-2 mt-2 display-5">Ticket Generator</h1>
<div class="card ticket-generator-card">
    <form method="POST" id="form-generate">
        <div class="card-body">
            <div class="mb-2">
                <label class="form-label">Number of tickets</label>
                <input type="number" name="number" placeholder="prefix-9999" class="form-control numbers" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Prefix</label>
                <select class="form-select" name="prefix">

                    <option value="0">Select</option>
                    <?php while($prefix = $result->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?php echo $prefix['prefix'] ?>">'<?php echo $prefix['prefix'] ?>' - <?php echo $prefix['description'] ?> </option>
                    <?php endwhile; ?>

                </select>
                </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Generate Ticket</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#form-generate').submit(function() {
            event.preventDefault();
            var spinner = '<div class="spinner"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> <span>Please wait</span></div>';
            $('#submit').html(spinner);
            $.ajax({
                type: 'POST',
                url: '../controller/ticket_generate.php',
                data: $(this).serialize(),
                success: function(response){
                    $('#submit').html('Generate');
                    var error;
                    try{
                        error = JSON.parse(response);
                        console.log(error);
                        
                        $('#error').remove();
                        if (error.negative_number) {
                            $("h1").after(error.negative_number);
                        } else if(error.prefix_notfound){
                            $("h1").after(error.prefix_notfound);
                        } else {
                            $('#error').remove();
                        }

                    }catch(e){
                        $('#error').remove();
                        var message = "<div class='alert alert-dismissible alert-success' id='error'><button type='button' class='btn-close' data-bs-dismiss='alert'></button> Tickets has been added successfully. </div>";
                        $("h1").after(message);
                    }
                },
            });
        });
    });
</script>

<?php include_once '../includes/sidenav-footer.php'; ?>


