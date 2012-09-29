<?php
//		This file is part of Aditya's ChatBox
// 	Aditya's ChatBox is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.

//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
#$text = str_replace(array(),"<img src=smileys/msn_.gif>",$text);
$text = str_replace("[B]","<b>",$text);
$text = str_replace("[/B]","</b>",$text);
$text = str_replace("[U]","<u>",$text);
$text = str_replace("[/U]","</u>",$text);
$text = str_replace("[I]","<i>",$text);
$text = str_replace("[/I]","</i>",$text);
return $text;
}

# To add emoticons, use:
# $text = str_replace(array(),"<img src=smileys/msn_.gif>",$text);
?>

