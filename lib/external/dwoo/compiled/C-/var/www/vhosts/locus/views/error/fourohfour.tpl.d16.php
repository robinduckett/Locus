<?php
ob_start(); /* template body */ ?>Error!

<?php echo $this->scope["error"];?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>