<?php

/*
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

*/



function parse_content(/* string */ $content){

require_once 'htmlpurifier/library/HTMLPurifier.auto.php';
    
    $config = HTMLPurifier_Config::createDefault();
    $config->set('Core', 'Encoding', 'ISO-8859-1'); // replace with your encoding
    //$config->set('Core', 'Encoding', 'UTF-8'); // replace with your encoding
    $config->set('HTML', 'Doctype', 'HTML 4.01 Transitional'); // replace with your doctype
    $purifier = new HTMLPurifier($config);
    
    return $purifier->purify($content);

}

?>