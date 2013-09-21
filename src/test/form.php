<html>
<head>
<!--

    SWADE is a lightweight WYSIWYG editor developed for SWAD platform.
    Copyright (C) 2013 - David Medina Godoy - asce88@gmail.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

-->

<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">

</head>
<body>
<h1> Test de Content Parser </h1>
<h2>Código enviado:</h2>
<br/>
<?php

//We create the purifier

require_once '../htmlpurifier/library/HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$config->set('Core.Encoding', 'ISO-8859-1'); // replace with your encoding
$config->set('HTML.Doctype', 'HTML 4.01 Transitional'); // replace with your doctype
$config->set('Core.EscapeNonASCIICharacters',true); 
//ISO-8859-1 -> UTF-8 -> clean html -> UTF-8 -> EscapeNonASCII -> ISO-8859-1
// if we don't add that option the purifier will mess our entities
$purifier = new HTMLPurifier($config);


//htmlentities(string,flags,character-set,double_encode)
$parsed_content = htmlentities($purifier->purify($_POST['editor3']),0,'ISO-8859-1',TRUE); 
$content = htmlentities($_POST['editor3'],0,'ISO-8859-1',TRUE); 

?>

<textarea id="area1" cols="100" rows="10" readonly>
<?php 
   echo $content; 
?>
</textarea>
<br/>

<h2>Código parseado:</h2>
<textarea id="area2" cols="100" rows="10" readonly>
<?php 
      echo $parsed_content; 
?>
</textarea>
<br/>

<h2>Contenido parseado:</h2>
<div id="content" style="border:1px solid black;width:800px;min-height:250px;">
<?php  
echo html_entity_decode($parsed_content); 
/*Decode the entities to show the symbols*/ 
?>
</div>
<br/>

</body>
</html>
