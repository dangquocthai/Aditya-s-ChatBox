<?php
function emot($text){ 
$text = str_replace(array(":-D",":-d",	":d", ":D",	":->",":>"),"<img src=smileys/msn_laugh.gif>",$text);
$text = str_replace(array(":-)",":)"),"<img src=smileys/msn_smiley.gif>",$text);
$text = str_replace(array(":-(",":(",":-<"),"<img src=smileys/msn_sad.gif>",$text);
$text = str_replace(array(":-P",":P",":-p",":p"),"<img src=smileys/msn_tongue.gif>",$text);
$text = str_replace(array(";)",";-)"),"<img src=smileys/msn_wink.gif>",$text);
$text = str_replace(":'(","<img src=smileys/msn_cry.gif>",$text);
$text = str_replace(array("(H)","(h)"),"<img src=smileys/msn_hot.gif>",$text);
$text = str_replace(":-o","<img src=smileys/msn_ooooh.gif>",$text);
$text = str_replace(array(":-@",":@"),"<img src=smileys/msn_angry.gif>",$text);
$text = str_replace("8-|","<img src=smileys/msn_nerd.gif>",$text);
$text = str_replace(array(":-|",":|"),"<img src=smileys/msn_neutral.gif>",$text);
$text = str_replace(":^)","<img src=smileys/msn_dontknow.gif>",$text);
$text = str_replace(":-#","<img src=smileys/msn_donttell.gif>",$text);
$text = str_replace("8-)","<img src=smileys/msn_eyeroll.gif>",$text);
$text = str_replace(array(":-S",":-s",":s",":S"),"<img src=smileys/msn_wierd.gif>",$text);
$text = str_replace("8o|","<img src=smileys/msn_teeth.gif>",$text);
$text = str_replace(array(),"<img src=smileys/msn_.gif>",$text);
return $text;
}

# To add emoticons, use:
# $text = str_replace(array(),"<img src=smileys/msn_.gif>",$text);
?>

