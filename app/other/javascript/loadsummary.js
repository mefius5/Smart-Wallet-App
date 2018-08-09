$(function(){
   
    $.ajax({
        
        url:'../../../loadMonthProfits.php',
        type:"POST",
        success: function(data){
            $('#month-profits').html(data);
            
        }
    });
});