<?php require_once 'includes/header.php'; ?>
<script src="js/confetti.js"></script>

<div id="raffle">

</div>


<script>
    $(document).ready(function(){
        $('#raffle').load("raffle_script.php", {myRaffle: 'myRafelle'},);
    }); 

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

    

    //var sec = setInterval(animation, 1000);

</script>




<?php require_once 'includes/footer.php'; ?>