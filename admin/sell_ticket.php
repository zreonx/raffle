<div class="card px-3 p-2">
    <div class="card-body" id="err">
        <form method="POST" id="form-sell">

            <div class="form-group mb-2">
                <label class="form-lable">Ticket Number</label>
                <input type="text" id="ticketNumber" name="ticketNumber" class="form-control p-2" placeholder="Enter ticket Number" required>
            </div>
            <div class="list-group" id="suggestion-box">
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit" id="submit" >Sell Ticket</button>
            </div>

        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        var divcount = 0;
        $('#ticketNumber').keyup(function() {
            var ticketId = $(this).val();
            if($(this).val() == '') {
                $('#suggestion-box').hide();
            }
            else {
                $('#suggestion-box').show();
                $.post("ticket_suggestion.php", {
                    suggestion: ticketId
                }, function(data, status){
                    $('#suggestion-box').html(data);

                    $(".list-group-item").click(function(){
                        var ticketnumber = $(this).text();
                        $('#ticketNumber').val(ticketnumber);
                        $('#suggestion-box').hide();
                    });
                });  
            }   
        });  
        

        $('#form-sell').submit(function() {
            event.preventDefault();
            var spinner = '<div class="spinner"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> <span>Please wait</span></div>';
            $('#submit').html(spinner);
            $.ajax({
                type: 'POST',
                url: '../controller/ticket_sell.php',
                data: $(this).serialize(),
                success: function(response){
                    $('#submit').html('Sell Ticket');
                    try {
                        var responseJson = JSON.parse(response);
                        if (responseJson.ticket_exist) {
                            $('#error').remove();
                            $("h1").after(responseJson.ticket_exist);
                        }else if(responseJson.ticket_purchased){
                            $('#error').remove();
                            $("h1").after(responseJson.ticket_purchased);
                        } else {
                            $('#error').remove();
                        }
                    }catch(e) {
                        $('#error').remove();
                    }

                },
            });
        });
    });
</script>