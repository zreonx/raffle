<?php require_once 'includes/header.php'; ?>

<div class="banner mx-auto">
    <img src="images/banner.png"  class="img-fluid mt-3" style="height: 200px" alt="">
</div>

<div id="raffle">

</div>


<script>
    $(document).ready(function(){
        $('#raffle').load("raffle_script.php", {myRaffle: 'myRafelle'},);
    }); 

    var start = () => {
        setTimeout(function() {
            confetti.start()
        }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
    };

    //start();

    function animation(){
        $.ajax({
        url: 'controller/winner_index.php',
        method: 'POST',
        data: {key: "raffle"},
        success: function(result){
            let marker = 0;
            
            try{
                winnerInfo = JSON.parse(result);
                for(let info = 2; info < winnerInfo.length - 1; info++){
                    if(winnerInfo[info] == "1") {
                        marker++;     
                    }
                }
                
                if(marker == 5){
                    animate = setInterval(function(){
                        confetti.start();
                    },1000);

                }else {
                    clearInterval(animate);
                    confetti.remove();
                    
                }

                console.log(marker);
            }
            catch(e){
               
                }
            },
        });
    }

    confetti.start();

    //var sec = setInterval(animation, 1000);

</script>




<?php require_once 'includes/footer.php'; ?>