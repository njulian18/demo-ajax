<?php
if ($_REQUEST['pa']=='Argentina')
{
  $superficie=2700000;
  $capital="Buenos Aires";
  $idioma="Castellano";
  $poblacion=38000000;
}
if ($_REQUEST['pa']=='Brasil')
{
  $superficie=8500000;
  $capital="Brasilia";
  $idioma="Portugues";
  $poblacion=163000000;
}
if ($_REQUEST['pa']=='Chile')
{
  $superficie=750000;
  $capital="Santiago";
  $idioma="Castellano";
  $poblacion=15000000;
}

$xml="<?xml version=\"1.0\"?>\n";
$xml.="<pais>\n";
$xml.="<superficie>$superficie</superficie>\n";
$xml.="<capital>$capital</capital>\n";
$xml.="<idioma>$idioma</idioma>\n";
$xml.="<poblacion>$poblacion</poblacion>\n";
$xml.="</pais>\n";
header('Content-Type: text/xml');
echo $xml;

?>