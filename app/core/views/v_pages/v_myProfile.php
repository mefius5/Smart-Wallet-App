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

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = $SW->Database->query($sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $username = $row['username'];
    $email = $row['email']; 
}else{
    echo "There was an error retrieving the username and email from the database";   
}
            
        

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Account</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="../../../other/css/wallet2.css">

    <script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>



    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <?php $SW->head(); ?>

</head>

<body>



    <nav class="navbar navbar-inverse">
        <div class="container">
            <!--             Brand and toggle get grouped for better mobile display -->


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
                    <li><a href="v_users.php"><i class="fas fa-plus-circle"></i> Add <i class="fas fa-minus-circle"></i></a></li>
                    <li><a href="#">Summary</a></li>
                    <li class="active"><a href="#">My Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <?php echo 'Logged as ' . $username;?>
                        </a>
                    </li>
                    <li>
                        <?php $SW->logout_link(); ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-myprofile">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2>Account Settings:</h2>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr data-target="#updateUsername" data-toggle="modal" data-backdrop='static' data-keyboard='false'>
                            <td>Username</td>
                            <td>
                                <?php echo $username;?>
                            </td>
                        </tr>
                        <tr data-target="#updateEmail">
                            <td>Email</td>
                            <td></td>
                        </tr>
                        <tr sdata-target="#updatePassword">
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>

    </div>


    <!--Update username-->
    <form method="post" id="updateusernameform">
        <div class="modal" id="updateUsername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                        <h4 id="myModalLabel">
                            Edit Username:
                        </h4>
                    </div>
                    <div class="modal-body">

                        <!--update username message from PHP file-->
                        <div id="updateusernamemessage"></div>


                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username;?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success pull-left" name="updateusername" type="submit" value="Submit">
                        
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="../../../other/javascript/myProfile.js"></script>
</body>

</html>