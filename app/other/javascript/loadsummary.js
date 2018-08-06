$(function(){
   
    $.ajax({
        url:'../../../loadMonthProfits.php',
        success: function(data){
            $('#month-profits').html(data);
            console.log('agergeavberbe');
        }
    });
});