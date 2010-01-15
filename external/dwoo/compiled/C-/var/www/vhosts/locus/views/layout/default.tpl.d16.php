<?php
ob_start(); /* template body */ ?>This is the default layout<br />
The title is <?php echo $this->scope["title"];?><br />
<?php echo $this->scope["content"];?> goes here<br />
And here is stuff under the content.
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>