$("#updateusernameform").submit(function(e){
    e.preventDefault();
    
    var dataString = $(this).serializeArray();
    console.log(dataString);
    
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