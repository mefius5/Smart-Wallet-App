$(function(){
    $('#select-profit-category').hide();
    $('#select-expense-category').hide();
    $('#select-date').hide();
   
    
    
    $('#select-profit-expense').change(function(){
       if($('#select-profit-expense option:selected').val()=="profit"){
           $('#select-expense-category').hide();
           $('#select-profit-category').show();
       }else{
           $('#select-profit-category').hide();
           $('#select-expense-category').show();
       }
    });
    
    $('.select-category').change(function(){ 
        if($('.select-category option:selected').val()){
            $('#select-date').show();
        }
    });
  
  });