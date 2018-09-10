
<script>
 $(document).ready(function(){
        
        $('#signup').submit(function(e){
            
            e.preventDefault();
            
            var dataString = $(this).serializeArray();
            
            $.ajax({
                type: "POST",
                url: "<?php echo SITE_PATH; ?>/app/signup.php",
                data: dataString,
                cache: false,
                success: function(html){
                    $('#cboxLoadedContent').html(html);
                }
            });
        
        });
        
        $('.cancel').on('click', function(e){
            
            e.preventDefault();
            $.colorbox.close();
            
            var page = window.location.href;
            page = page.substring(0, page.lastIndexOf('?'));
            window.location = page;
        });
    });
</script>



<div class="well">


    <form action="" method="post" id="signup">

        <div>
            <a href="#" id="sw_cancel" class="cancel"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        <div style="clear: both"></div>

        <?php
            $alerts = $this->getAlerts();
                if($alerts != '') {
                    echo '<div class="alerts">' . $alerts . '</div>';
                }
        
        ?>


            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $this->getData('input_user');?>" placeholder="Username">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $this->getData('input_email');?>"  placeholder="Email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $this->getData('input_pass');?>" placeholder="Password">
            </div>
            
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                <input type="password" name="password2" id="password2" class="form-control" value="<?php echo $this->getData('input_pass2');?>" placeholder="Confirm Password">
            </div>

            <button type="submit" name="submit" class="btn btn-success submit" value="Zarejestruj">Signup</button>
            
            <button type="submit" class="btn btn-primary pull-right cancel" >Cancel</button>

    </form>
</div>