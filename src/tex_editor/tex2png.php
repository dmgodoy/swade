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
$path_tmp = 'tmp/';
$path_dest = 'img/';

$latex_formula = "'".$_POST["MathInput"]."'";

$cadena = "./texvc $path_tmp $path_dest $latex_formula";

exec($cadena,$output,$return);

$out = $output[0];
$name = substr($out ,1 , 32 );

$to_replace = array('\\');
$escaped_latex_formula = str_replace($to_replace, '\\\\', $latex_formula);
$cwd = dirname($_SERVER["PHP_SELF"]);

echo "<img src=\"${cwd}/${path_dest}${name}.png\" alt=\"Formula inválida\" data-tex-swade = $escaped_latex_formula onclick=\"swade_app.tex_code_selected = $escaped_latex_formula;swade_app.selected_tex_object = this;\"/>";


?>
