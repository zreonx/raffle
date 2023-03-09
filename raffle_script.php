<?php 

    if(!isset($_POST['myRaffle'])): 

?>
<?php header('location: index.php');?>

<?php else: ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container" id="contentarea"></div>

<div class="ruffle mx-auto mt-3">
    <div id="cont" class="d-flex">
        <!-- <h1 class="index" id="first">0</h1>
        <h1 class="index" id="second">0</h1>
        <h1 class="index" id="third">0</h1>
        <h1 class="index" id="fourth">0</h1>
        <h1 class="index" id="fifth">0</h1> -->



        <!-- <div class="index"></div>
        <div class="index"></div>
        <div class="index"></div>
        <div class="index"></div>
        <div class="index"></div> -->
        
        <div class="index"><h1 class="" id="first">0</h1></div>
        <div class="index"><h1 class="" id="second">0</h1></div>
        <div class="index"><h1 class="" id="third">0</h1></div>
        <div class="index"><h1 class="" id="fourth">0</h1></div>
        <div class="index"><h1 class="" id="fifth">0</h1></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var elementIds = ['first', 'second', 'third', 'fourth', 'fifth'];
        var resetCounter = 0;
        var greetings = false;
    function runRaffle() {
        var intervalIds = [];

        let to = 10;
        
        currentIndex = 0;
        intervalIds = [];
        

        var winnerArray = [];
        var winnerIndex = [];
        var indexStatus = [];
        
        $.ajax({
            url: 'controller/winner_index.php',
            method: "POST",
            data: {key:"raffle"},
            success: function(result) {

                intervalIds.push(setInterval(function() {
                    let random = Math.floor(Math.random() * to);

                    $('#first').html(random);

                }, 80));
                intervalIds.push(setInterval(function() {
                    let random = Math.floor(Math.random() * to);
                    let indexLen = indexStatus.length;
                        $('#second').html(random);

                }, 80));
                intervalIds.push(setInterval(function() {
                    let random = Math.floor(Math.random() * to);
                    let indexLen = indexStatus.length;

                    $('#third').html(random);


                }, 80));
                intervalIds.push(setInterval(function() {
                    let random = Math.floor(Math.random() * to);
                    let indexLen = indexStatus.length;

                    $('#fourth').html(random);

                }, 80));
                intervalIds.push(setInterval(function() {
                    let random = Math.floor(Math.random() * to);

                    $('#fifth').html(random);

                }, 80));

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
                                continue;
                        }

                        if(checkCounter == 5) {
                            if (!greetings) {
                                var scriptElement = document.createElement("script");
                                scriptElement.src = "js/confetti.js";
                                // Append the script element to the head or body element
                                $("head").append(scriptElement);
                                $(".banner").after("<h1 class='display-1 fs-1 text-center mt-3'>Congratulations!</h1>");
                                greetings = true;
                                confetti.start();
                            }
                        }
                    }
     
                    s = 0;
                    checkCounter = 0;
                }catch(e) {
                    for(let b = 0; b < intervalIds.length; b++) {
                        clearInterval(intervalIds[b]);
                        $('#'+elementIds[b]).html("0");
                        $('#'+elementIds[b]).removeClass('text-orange');
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

        
        resetCounter++;
        console.log(resetCounter);
        if(resetCounter == 10) {
            for(var x = 0; x < intervalIds.length; x++) {
                clearInterval(intervalIds[x]);
             }  
             resetCounter = 0;
        } 
       
    }

    var main = setInterval(runRaffle, 1000);
});
</script>


<?php 
    endif; 
?>
