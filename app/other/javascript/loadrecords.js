$(function(){

//    function editRecord(e) {
//    // First we need the clean ID of the product
//        e.preventDefault();
//        var id = $(this).attr('id'); // We split with '-' as separator and take the second element of the resulting array
//        $.ajax({
//            url: '../../../loadrecords.php',
//            type: "POST", // or GET whatever but POST is usually better
//            data: { id: id },
//            success: function(data) {
//               alert(data);
//            }
//        });
//    }
    
    $.ajax({
        url:'../../../loadrecords.php',
        success: function (data){
            $('#records').html(data);
        }
    }); 
    
    $('.delete').on('click', function(e){
        
        console.log(record_id);
        var el = document.getElementById( 'id' );
        
        
        $.ajax({
            url:'../../../deleteRecord.php',
            type: "POST",
            data: {id: record_id},
            success: function(data){
                 $(record_id).html(data);
                window.location.href = "http://localhost/SMART_WALLET_APP/app/deleteRecord.php"
            }
        })
        
    });
     
    
    
    
    
    
//    $('.active').on('click', function(e){
//            
//            e.preventDefault();
//            
//            var id = $(this).attr('id');
//            console.log(id);
//            
//            $.ajax({
//                type:'POST',
//                url:"../../../editProfit.php",
//                data: { id : id },
//                success:function(data) {
//                    alert(data);
//                }
//            });
//        
//            
//        });
    });         
    
