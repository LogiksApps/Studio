<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$slug = _slug("page/b/c/d");
if(strlen($slug['page'])<=0) $slug['page'] = "default";

$file = __DIR__."/pages/{$slug['page']}.php";
if(file_exists($file)) include_once $file;
else include_once __DIR__."/pages/default.php";
?>