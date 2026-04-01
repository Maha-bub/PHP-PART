<!-- File write using fwrite function -->
<?php
$open = fopen("file.txt", "w") or die("Unable to open file!");
$txt = "Hello world! This is a text file.
Hi, I'm Mahabubul Alam.
I'm a runnig trainee of IsDB BISEW IT Scholourship Programm.
I'm happy to announch that i am learning new programming related topics everyday.\n";
fwrite($open, $txt);
fclose($open);
?>