<?php
function emot($text){ 
$text = str_replace(array(":-D",":-d",	":d", ":D",	":->",":>"),"<img src=smileys/msn_laugh.gif>",$text);
$text = str_replace(array(":-)",":)"),"<img src=smileys/msn_smiley.gif>",$text);
$text = str_replace(array(":-(",":(",":-<"),"<img src=smileys/msn_sad.gif>",$text);
$text = str_replace(array(":-P",":P",":-p",":p"),"<img src=smileys/msn_tongue.gif>",$text);
$text = str_replace(array(";)",";-)"),"<img src=smileys/msn_wink.gif>",$text);
return $text;
}

# $text = str_replace(array(),"<img src=smileys/msn_.gif>",$text);
?>

