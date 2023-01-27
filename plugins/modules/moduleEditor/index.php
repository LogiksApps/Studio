<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$slug = _slug("a/module/moduleSrc");

if(strlen($slug['moduleSrc'])<=0) $slug['moduleSrc'] = "dev";

$modPath = CMS_APPROOT.($slug['moduleSrc']=="dev"?"pluginsDev/":"plugins/")."modules/{$slug['module']}";

if(!file_exists($modPath) || !is_dir($modPath)) {
   echo "<h3 align=center><br>Module `{$slug['module']}` does not exist or is not supported</h3>"; 
   return;
}



printArray([$slug, $modPath]);
?>
