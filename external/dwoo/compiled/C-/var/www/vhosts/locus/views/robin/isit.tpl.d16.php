<?php
ob_start(); /* template body */ ?>Test
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>