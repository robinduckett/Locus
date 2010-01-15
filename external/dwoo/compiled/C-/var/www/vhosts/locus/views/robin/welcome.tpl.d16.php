<?php
ob_start(); /* template body */ ?>This is a manually rendered page $test: <?php echo $this->scope["test"];?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>