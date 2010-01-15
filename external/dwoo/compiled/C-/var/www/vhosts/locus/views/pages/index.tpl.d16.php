<?php
ob_start(); /* template body */ ?>This is index content and it
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>