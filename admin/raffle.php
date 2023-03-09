<?php
    include_once '../includes/sidenav.php';
    require_once '../config/connection.php';
    include_once '../includes/auth_check.php';
?>

<h1 class="fs-2 mt-2 display-5">Raffle Slot Machine</h1>
<div class="raffle-page">
    <div class="card raffle-card">
        <div class="card-body">
            <div class="ps-2" id="rafflecontent">
            </div>
            <div class="ps-2">
                <button type="button" id="submit" class="btn btn-primary">Draw Slot</button>
            </div>
        </div>
    </div>
    
    <div class="card index-card">
        <div class="content-holder p-3 card-body">
            <div class="card-title">Index Controller</div>
            <div class="slot-raffle">
                <div id="index" class="d-flex container h-100">
                    <h1 class="index-number" id="first">0</h1>
                    <h1 class="index-number" id="second">0</h1>
                    <h1 class="index-number" id="third">0</h1>
                    <h1 class="index-number" id="fourth">0</h1>
                    <h1 class="index-number" id="fifth">0</h1>
                </div>
                <div class="d-flex gap-1 button-group">
                    <button class="btn btn-primary" id='start'>Start Live Raffle</button>
                    <button class="btn btn-primary" id='clear'>stop</button>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
<script>
    var main;
    $(document).ready(function() {
       $('#submit').click(function() {
            var spinner = '<div class="spinner"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> <span>Please wait</span></div>';
            $('#submit').html(spinner);
            $.ajax({
                type: 'POST',
                url: '../controller/draw_winner.php',
                data: {key: 'raffle'},
                success: function(response){
                    $('#submit').html('Draw Slot');
                    $('#rafflecontent').html(response);
                    clearInterval(main);
                },
            });
            $(this).prop("disabled", true);

            setTimeout(function() {
            $("#submit").prop("disabled", false);
            }, 5000);

       });
    });
</script>

<script>
    $(document).ready(function() {  
        var elementIds = ['first', 'second', 'third', 'fourth', 'fifth'];
        var indexStatus = [];
        var resetCounter = 0;
        function runRaffle() {
            let to = 10;
            var intervalIds = [];
            currentIndex = 0;
            intervalIds = [];
            
            let winnerArray = [];
            var winnerIndex = [];
            var indexStatus = [];
           
            
            $.ajax({
                url: '../controller/winner_index.php',
                method: "POST",
                data: {key:"raffle"},
                success: function(result) {
    
                    intervalIds.push(setInterval(function() {
                        let random = Math.floor(Math.random() * to);
                        $('#first').html(random);
    
                    }, 80));
                    intervalIds.push(setInterval(function() {
                        let random = Math.floor(Math.random() * to);
                            $('#second').html(random);
    
                    }, 80));
                    intervalIds.push(setInterval(function() {
                        let random = Math.floor(Math.random() * to);
                        $('#third').html(random);
    
    
                    }, 80));
                    intervalIds.push(setInterval(function() {
                        let random = Math.floor(Math.random() * to);
                        $('#fourth').html(random);
    
                    }, 80));
                    intervalIds.push(setInterval(function() {
                        let random = Math.floor(Math.random() * to);
                        $('#fifth').html(random);
    
                    }, 80));

                    resetCounter++;
                    console.log(resetCounter);
                    if(resetCounter == 10) {
                        for(var x = 0; x < intervalIds.length; x++) {
                            clearInterval(intervalIds[x]);
                        }  
                        resetCounter = 0;
                    } 

                    $('#clear').prop("disabled", true);

                    try {
                        winnerArray = JSON.parse(result);
                        winnerIndex = winnerArray[1].split("");
                        
                        var checkCounter = 0;
                        indexStatus = [];
                        for(var s = 2; s < winnerArray.length - 1; s++) {
                            if(winnerArray[s] == '1') {
                                    clearInterval(intervalIds[checkCounter]);
                                    $('#'+elementIds[checkCounter]).html(winnerIndex[checkCounter]);
                                    $('#'+elementIds[checkCounter]).addClass('text-orange');
    
                                    indexStatus.push('filled');
                                   
                                    checkCounter++;
                                    
                            }else {
                                    $('#clear').prop("disabled", false);
                                    continue;
                                    
                            }
 
                        }

                        s = 0;
                        checkCounter = 0;
                    }catch(e) {
                        for(let b = 0; b < intervalIds.length; b++) {
                            clearInterval(intervalIds[b]);
                            $('#'+elementIds[b]).html("0");
                            $('#'+elementIds[b]).removeClass('text-orange');

                            $('#clear').prop("disabled", true);
                        }
                    }
                },
              
            });
            
            // Clear intervals after 5 seconds
            setTimeout(function() {
                for(var x = 0; x < intervalIds.length; x++) {
                    clearInterval(intervalIds[x]);
                }
                
            }, 1000);
        }
        $('#clear').prop('disabled', true);
        $('#start').click(function() {
            clearInterval(main);
            main = setInterval(runRaffle, 1000);
            var spinner = '<div class="spinner"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> <span>Please wait</span></div>';
            $('#start').html(spinner);
            

            $.ajax({
                url: '../controller/winner_data.php',
                method: "POST",
                data: {key:"raffle"},
                success: function(result) {

                    winnerArray = JSON.parse(result);
                    winnerIndex = winnerArray[1].split("");
                    $('#start').html('Start Live Raffle');
                    $('#clear').prop('disabled', false);
                    
                }
            });
        });

        $('#clear').click(function(){

            $.ajax({
                url: '../controller/winner_index.php',
                method: 'POST',
                data: {key: "raffle"},
                success: function(result){
                    try{
                        let marker = 0;
                        winnerInfo = JSON.parse(result);
                        for(let info = 2; info < winnerInfo.length - 1; info++){
                            if(winnerInfo[info] == "1") {
                                marker++;
                                
                            }else {
                                $.ajax({
                                    url: '../controller/raffle_index.php',
                                    method: 'POST',
                                    data: {index: marker},
                                    success: function(result){
                                        if(marker == 4) {
                                            $('#clear').prop("disabled", true);
                                        }
                                       
                                    },
                                });
                            }
                            
                        }
    
                    }
                    catch(e){}
                    
                },
            });
        });
    });
</script>

<?php include_once '../includes/sidenav-footer.php'; ?>


