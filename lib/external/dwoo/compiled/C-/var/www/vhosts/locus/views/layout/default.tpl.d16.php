<?php
ob_start(); /* template body */ ?><html>
  <head>
    <title><?php echo $this->scope["title"];?></title>
    <link rel="stylesheet" type="text/css" href="/css/master.css" />
  </head>
  <body>
    <?php echo $this->scope["content"];?>

  </body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>