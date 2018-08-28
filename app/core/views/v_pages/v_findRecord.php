<script>
 var record_id;
    
       function editRecord(e) {  
        record_id = e.id
        console.log(record_id);
    };
    
//    function deleteRecord() {
//        console.log(id);
//    }
//    
    
    
   

</script>


<?php include ("../../../init.php");

$user_id = $_SESSION['user_id'];?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Find</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
   
    <link rel="stylesheet" type="text/css" href="../../../other/css/wallet2.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
   
    
   <script
   src="http://code.jquery.com/jquery-2.2.4.min.js"
   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
   crossorigin="anonymous"></script>

   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    
    <script type=’text/javascript’ src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js”></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <?php $SW->head(); ?>

</head>

<body>
  
  <script>
      $(function(){
      
        $('#findRecord').submit(function(e){
             e.preventDefault();

             var dataString = $(this).serializeArray();
             console.log(dataString);

             $.ajax({
                 type:'POST',
                 url:'../../../findRecord.php',
                 data: dataString,
                 success: function(data){
                     $('#find-result').html(data);
                 }

             });
         });
      });
    
    </script>
   
   
    
    

    <nav class="navbar navbar-inverse">
        <div class="container">
<!--             Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
               
                <a class="navbar-brand" href="#">Smart Wallet</a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="v_users.php"><i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i></a></li>
                    <li><a href="v_summary.php">Summary</a></li>
                    <li class = "active"><a href="#">Find</a></li>
                    <li><a href="v_myProfile.php">My Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <b><?php echo 'Logged as ' . $_SESSION['username'];?></b>
                        </a>
                    </li>
                    <li>
                        <?php $SW->logout_link(); ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-find">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
              
              <div class="balance-header">
                <h3>Your account balance:</h3>
              </div>
              
               <h2><div id="balance-amount" class="balance-amount" >
              </div></h2>
              
              
              
              
              
              
                <form action="" method="post" id="findRecord">
                    
                    <div class="form-group select-findrecord">
                        
                        <select class="form-control" id="select-profit-expense" name="select-profit-expense" value="">
                           <option selected hidden name="choose_category">Choose profit/expense...</option>
                            <option value = "profit">Profit</option>
                            <option value = "expense">Expense</option>
                        </select>
                    </div>
                    
                    
                       
                    <div class="form-group select-findrecord">

                        <select class="form-control select-category" id="select-profit-category" name="select-profit-category" value="">
                           <option selected hidden name="choose_category">Choose profit category...</option>
                            <option>Salary</option>
                            <option>Odd Jobs</option>
                            <option>Winnings</option>
                            <option>Pension</option>
                            <option>Investments</option>
                            <option>Savings</option>
                            <option>Rent</option>
                            <option>Gifts</option>
                            <option>Sale</option>
                            <option>Others</option>
                        </select>
                        
                        <select class="form-control select-category" id="select-expense-category" name="select-expense-category" value="">
                           <option selected hidden name="choose_category">Choose expense category...</option>
                            <option>Bills</option>
                            <option>Car</option>
                            <option>Shopping</option>
                            <option>Clothes</option>
                            <option>Medicines</option>
                            <option>Parties</option>
                            <option>Transport</option>
                            <option>Rent</option>
                            <option>Restaurant</option>
                            <option>Others</option>
                        </select>
                    </div>
                      
                    <div id="datepicker">  
                        <div class="form-group"> 
                            <label class="control-label datepicker-label" for="date">Date</label>
                            <input class="form-control datepicker" id="date" name="date" placeholder="yyyy-mm-dd" type="text" value=""/>
                        </div>
                    </div>
                    
                    <div id="submit-find">
                    
                          <div class="form-group"> <!-- Submit button -->
                            <button class="btn btn-primary btn-lg submit-find-form " name="submit" type="submit">Submit</button>
                          </div>
                    </div>
                            
                    
                </form>
                
                <div id="find-result"></div>
              
              
            </div>
        </div>
        
        


    </div>
    
<!--    Delete form-->
   
     
        <div class="modal" id="deleteModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Are you sure to delete this record?
                  </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-left delete" name="delete" type="submit" data-dismiss="modal"> Delete</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      
    
    

    <script src="../../../other/javascript/loadrecords.js"></script>
    <script src="../../../other/javascript/findRecord.js"></script>
</body>

</html>
