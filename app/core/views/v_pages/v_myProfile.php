<script src="../../../other/javascript/getRecordId.js"></script>


<?php include ("../../../init.php");

    $user_id = $_SESSION['user_id'];

    include ("../../../loadAccountSettings.php");  
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
                    <li><a href="v_users.php"><i class="fas fa-plus-circle fa-lg"></i> <i class="fas fa-minus-circle fa-lg"></i></a></li>
                    <li><a href="v_summary.php"><i class="fas fa-chart-pie fa-lg"></i></a></li>
                    <li><a href="v_findRecord.php"><i class="fas fa-search fa-lg"></i></a></li>
                    <li class="active"><a href="#"><i class="fas fa-cogs fa-lg"></i></a></li>
                    <li><a href="v_contact.php"><i class="fas fa-envelope fa-lg"></i></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            Logged as <b><?php echo $username;?></b>
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
                       <tbody>
                            <tr data-target="#updateUsername" data-toggle="modal" data-backdrop='static' data-keyboard='false'>
                                <td>Username</td>
                                <td>
                                    <?php echo $username;?>
                                </td>
                            </tr>
                            <tr data-target="#updateemail" data-toggle="modal" data-backdrop='static' data-keyboard='false'>
                                <td>Email</td>
                                <td>
                                    <?php echo $email;?>
                                </td>
                            </tr>
                            <tr data-target="#updatepassword" data-toggle="modal" data-backdrop='static' data-keyboard='false'>
                                <td>Password</td>
                                <td>hidden</td>
                            </tr>
                        </tbody>
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
    
    <!--Update password-->    
      <form method="post" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Enter Current and New password:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Update password message from PHP file-->
                  <div id="updatepasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="currentpassword" class="sr-only" >Your Current Password:</label>
                      <input class="form-control" type="password" name="currentpassword" id="currentpassword" maxlength="30" placeholder="Your Current Password">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only" >Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a password">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only" >Confirm password:</label>
                      <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm password">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn btn-success pull-left" name="updatepassword" type="submit" value="Submit">
                  
                 <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel
                 </button>
              </div>
          </div>
      </div>
      </div>
      </form>
      
      <!--Update email-->    
      <form method="post" id="updateemailform">
        <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Enter new email: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Update email message from PHP file-->
                  <div id="updateemailmessage"></div>
                  

                  <div class="form-group">
                      <label for="email" >Email:</label>
                      <input class="form-control" type="email" name="email" id="email" maxlength="50" value="<?php echo $email ?>">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn btn-success pull-left" name="updateemail" type="submit" value="Submit">
                  
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

