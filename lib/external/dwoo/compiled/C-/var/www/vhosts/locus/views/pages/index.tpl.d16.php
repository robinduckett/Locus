<?php
ob_start(); /* template body */ ?><span class="success">Success! Locus <?php echo $this->scope["version"];?> is running.</span>
<?php if ((isset($this->scope["database"]) ? $this->scope["database"] : null)) {
?>
  <span class="success">Success! Locus can connect to the database.</span>
<?php 
}
else {
?>
  <span class="fail">Failure! Locus can <span class="bad">not</span> connect to the database.</span>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>