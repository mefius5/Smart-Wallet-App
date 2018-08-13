$(function(){
    
    var profit="profit";
    var expense="expense";
    
   
    $.ajax({
        
        type: "POST",
        url:'../../../loadMonthSummary.php',
        data:{profit_expense: profit},
        success: function(data){
            $('#month-profits').html(data);
            
        }
    });
    
    $.ajax({
        
        type:"POST",
        url:'../../../loadMonthSummary.php',
        data:{profit_expense: expense},
        success: function(data){
            $('#month-expenses').html(data);
        }
    });
    
    $.ajax({
        
        type:"POST",
        url:'../../../loadMonthBalance.php',
        data:{profit_expense: profit},
        success: function(data){
            $('#month-summary-profit').html(data);
        }
    });
    $.ajax({
        type:"POST",
        url:'../../../loadMonthBalance.php',
        data:{profit_expense: expense},
        success: function(data){
            $('#month-summary-expense').html(data);
        }
    });
});