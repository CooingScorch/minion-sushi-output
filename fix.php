<?php
$f = file_get_contents("resources/views/pages/home.blade.php");
$f = str_replace(">English<", ">ENG<", $f);
$f = str_replace(">Melayu<", ">BM<", $f);
file_put_contents("resources/views/pages/home.blade.php", $f);
echo "Done";

