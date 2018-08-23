$(function(){
    $('#select-profit-category').hide();
    $('#select-profit-expense').change(function(){
       if($('#select-profit-expense option:selected').val()=="profit"){
           console.log('profit');
           $('#select-profit-category').show();
       }else{
           console.log('expense');
       }
    });
  
  });