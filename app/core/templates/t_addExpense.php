<link rel="stylesheet" href="<?php echo APP_OTHER; ?>css/colorbox.css">
<script type = "text/javascript" src = "<?php echo APP_OTHER; ?>javascript/jquery-3.3.1.min.js"></script>
<script type = "text/javascript" src = "<?php echo APP_OTHER; ?>javascript/jquery.colorbox-min.js"></script>


<script>
 
    $(document).ready(function(){
        $.colorbox({
            href: '<?php echo SITE_PATH;?>/app/addExpense.php',
            overlayClose: false,   
            escKey: false,
            speed: 200,
            width: "400px",
            closeButton: false
            
        });
    });

</script>