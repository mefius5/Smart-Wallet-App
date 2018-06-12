$(function(){

     $.ajax({
        url:'../../../loadBalance.php',
        data: {id: record_id}, 
        success: function (data){
            $('#balance-amount').html(data);
            console.log(data);
        }
    }); 
    
    
    $.ajax({
        url:'../../../loadrecords.php',
        success: function (data){
            $('#records').html(data);
        }
    }); 
    
    $('.delete').on('click', function(e){
        
        console.log(record_id);
        var el = document.getElementById(record_id);
        
        
        $.ajax({
            url:'../../../deleteRecord.php',
            type: "POST",
            data: {id: record_id},
            success: function(data){
                  if(data == 'error'){
                        $('#alertContent').text("There was an issue delete the note from the database!");
                        $("#alert").fadeIn();
                    }else{
                        //remove containing div
                        el.remove();
                        location.reload();
                        
                    }
                },
                
        });
        
    });

});         
    
