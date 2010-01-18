<?php
ob_start(); /* template body */ ?><html>
  <head>
    <title><?php echo $this->scope["title"];?></title>
    <style type="text/css">
      body {
        font-family: "Calibri", "Trebuchet MS", sans-serif;
        font-size: 10pt;
        margin: 0;
        padding: 15px;
        background: #d5e5ff;
        line-height: 1.6em;
      }
    </style>
  </head>
  <body>
    <?php echo $this->scope["content"];?>

  </body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>