$(function(){
    
    $('#contact-message').submit(function(e){
        e.preventDefault();
        
        var dataString = $(this).serializeArray();
        console.log(dataString);
                
         $.ajax({
             type:'POST',
             url:'../../../contact.php',
             data: dataString,
             success: function(data){
                 $('#contact-alert').html(data);
                 
             }
             
                
                                      
        });
    });
 
});