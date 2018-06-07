<script>
        function editRecord(e) {
    // First we need the clean ID of the product
        
        var id = e.id
            console.log(id);// We split with '-' as separator and take the second element of the resulting array
        $.ajax({
            url: "../../editProfit.php",
            type: "POST", // or GET whatever but POST is usually better
            data: { id : id },
            success: function (data){
                $('#records').html(data);
            }
        });
    }
        

</script>


<?php include ("../../../init.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
   
    <link rel="stylesheet" type="text/css" href="../../../other/css/wallet2.css">
    
   <script
   src="http://code.jquery.com/jquery-2.2.4.min.js"
   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
   crossorigin="anonymous"></script>

   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>



    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <?php $SW->head(); ?>

</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container">
<!--             Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Smart Wallet</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active" id="ervererr"><a href="#"><i class="fas fa-plus-circle"></i> Add <i class="fas fa-minus-circle"></i></a></li>
                    <li><a href="#">Summary</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <?php echo 'Logged as ' . $_SESSION['user_id'];?>
                        </a>
                    </li>
                    <li>
                        <?php $SW->logout_link(); ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-users">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="buttons">
                    
                    <?php $SW->addProfit_link(); ?>
                    
                    <?php $SW->addExpense_link(); ?>

                </div>
                <div id="records" class="records">
                    
                </div>

            </div>


        </div>


    </div>
    
<!--    Delete form-->
   
   
    
    

    <script src="../../../other/javascript/loadrecords.js"></script>
</body>

</html>
