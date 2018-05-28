<script>
    $(document).ready(function(){
        
        $('#login').submit(function(e){
            
            e.preventDefault();
            

            
            var dataString = $(this).serializeArray();
            console.log(dataString);
            
            $.ajax({
                type: "POST",
                url: "<?php echo SITE_PATH; ?>/app/addExpense.php",
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




<div class = "well">


    <form action="" method="post" id="login">
        
      <div>
       <a href="#" id="sw_cancel" class="cancel"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        <div style = "clear: both"></div>

        <?php
            $alerts = $this->getAlerts();
                if($alerts != '') {
                    echo '<div class="alerts">' . $alerts . '</div>';
                }
            
        
        ?>

            <div class="form-group">
                <label for="exampleSelect1">Category</label>
                <select class="form-control" id="exampleSelect1" name="expenseCategory" value="<?php echo $this->getData('expenseCategory');?>">
                   <option selected hidden name="choose_category">Choose category...</option>
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

            <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input type="text" class="form-control" name = "amount" id = "amount" value ="<?php echo $this->getData('Amount');?>" placeholder="Amount">
            </div>
            

            <button type="submit" name="submit" class="btn btn-danger submit" value="Add">Add</button>
            
            <button type="submit" class="btn btn-primary pull-right cancel" >Cancel</button>

    </form>
</div>