<?php
//ex10-a
//echo date("l d F Y, H\h i\m s\s");
//ex10-b
//setlocale(LC_TIME, "fr_FR.utf8",'fra');
//echo utf8_encode(strftime('%A %d %B %Y, %Hh %Mm %Ss'));
//echo strftime('%A %d %B %Y, %Hh %Mm %Ss');
//echo '<br>';
//echo date('Y-m-d H:i:s', (time()+((26*24)*60*60)+(16*60*60)));



//echo strtotime('1990-09-20 00:30');

//Exercice 10-d Crer une variable contenant cette date precise texteulle '2004-04-16 12:00:00" Le but est d'ajouter 435 jours à cette date puis de l'ajouetr sous le format suivant ' samedi 25 juin 2005, 12h 00m 00s".


$dateToTransfrom = '2004-04-16 12:00:00';
$codeTime = strtotime($dateToTransfrom);
$codeTransform = $codeTime + 435*24*60*60;


setlocale(LC_TIME, "fr_FR.utf8",'fra');
echo strftime('%A %d %B %Y, %Hh %Mm %Ss', $codeTransform);
echo ('<br>');
echo strtotime('1990-11-07 17:00:00')

?>