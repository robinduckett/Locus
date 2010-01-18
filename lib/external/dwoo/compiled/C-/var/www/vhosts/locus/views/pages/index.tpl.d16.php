<?php
ob_start(); /* template body */ ;
echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'body',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["page"], false);?><br />
<?php echo $this->scope["death"];?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>