$(function(){
    
    var date_input=$('input[name="date"]'); 
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: false,
        autoclose: true,
      };
    date_input.datepicker(options);
    
    $('#select-profit-category').hide();
    $('#select-expense-category').hide();
    $('#datepicker').hide();
    $('#submit-find').hide();
    
   
    
    
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
            $('#datepicker').show();
        }
    });
    
    $('.datepicker').datepicker().on('changeDate', function() {
       $('#date').change();
    });
    $('#date').change(function () {
//        console.log($('#date').val());
        $('#submit-find').show(); 
    });
    
  
  });