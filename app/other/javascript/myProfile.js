$("#updateusernameform").submit(function(e){
    e.preventDefault();
    
    var dataString = $(this).serializeArray();
    
    $.ajax({
        url: "../../../updateUsername.php",
        type: "POST",
        data: dataString,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }else{
                location.reload();
            }
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");  
        } 
    });
});


$("#updatepasswordform").submit(function(e){
    e.preventDefault();
    
    var dataString = $(this).serializeArray();
    
    $.ajax({
        url: "../../../updatePassword.php",
        type: "POST",
        data: dataString,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");   
        }  
    });
});

$("#updateemailform").submit(function(event){ 
    
    event.preventDefault();
    var datatopost = $(this).serializeArray();

    $.ajax({
        url: "../../../updateEmail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }else{
                location.reload();
            }
        },
        error: function(){
            $("#updateemailmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");   
        }
    });
});