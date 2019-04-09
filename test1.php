<?php

session_start();
// session_destroy();

// var_dump($_SESSION['otvetUser']);    
// if(isset($_SESSION['increment'])){
//     var_dump($_SESSION['increment']);
//     var_dump($_SESSION['otvetUser']);
//     if($_SESSION['increment'] == $_SESSION['leghtQuestions']){
//             echo 'Вы набрали '. $_SESSION['ball'] . 'баллов';    
//             echo '<a href ="/process.php?restart=1">Пройти заново</a>';
            
//             var_dump($_SESSION['ball']);
//             echo '<a href ="/process.php?restart=1">Пройти заново</a>'; 
//         }

//     }    
    
        
    

// if(isset($_SESSION['start'])){
//     var_dump($_SESSION['start']);
// }





?>


<style>
.hiden{
    display:none;
}
.block{
    display:block;
}

</style>


<div id="startTest">
    <h2>Для того чтобы начать тест нажмите на кнопку</h2>
    <button id = "going">Кнопка</button>
</div>




<div id = "formTest" class = "hiden">
    
    <div id = "variables"></div>
    <br>
    <button id = "send">Send</button>
</div>

<button id = "restart" class = "hiden">Пройти тест сначала</button>

    
<script src="/jquery-3.3.1.min.js"></script>

<script>
    $(function(){
        
        
        $('#going').click(function(){
            $.post('/process2.php', {startTest : 'start'});
            
            $('#startTest').addClass('hiden');
            $('#formTest').removeClass('hiden').addClass('block');
            $.ajax('/process2.php',{
            dataType: 'json'
        }).then(function(response){
             console.log(response);   
                $('#variables').html(response);
            });

        $('#send').click(function(){    
            var answer = $("#bad").val();
            $.post('/process2.php', {data : answer});
            $.ajax('/process2.php',{
            dataType: 'json'
        }).then(function(response){
             console.log(response);   
            $('#variables').html(response);
            $('#bad').val('');
            
                });
            });

            
         

        });
    });

    $('#restart').click(function(){
        $('#restart').removeClass('block').addClass('hiden');
        $.get('/process2.php',{restart: "restart"});
    })




    
        // $.post('process.php', { test: $('#bad').val()});
   





</script>


