<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$slug=_slug();
// echo $_SESSION['SESS_GUID'].$_SESSION['SESS_PRIVILEGE_ID'].ROLE_PRIME;
if(isset($slug["module"])) {
	$modulePath=checkModule($slug["module"]);
	if($modulePath) {
		$modulePath=dirname($modulePath)."/cms.php";
		$modulePath1=dirname($modulePath)."/studio.php";
		
		if(checkUserScope($slug["module"])) {
			if(file_exists($modulePath)) {
				_pageVar("PLUGINEDIT",true);
				_pageVar("MODULE",$slug["module"].".cms");
			} elseif(file_exists($modulePath1)) {
				_pageVar("PLUGINEDIT",true);
				_pageVar("MODULE",$slug["module"].".studio");
			} else {
				_pageVar("PLUGINEDIT",false);
				_pageVar("MODULE",$slug["module"]);
			}
		} else {
			trigger_logikserror("Sorry, You don't have access to Module '{$slug["module"]}'.",E_ERROR,403);
		}
	} else {
		trigger_logikserror("Sorry, Module '{$slug["module"]}' not found.",E_ERROR,404);
	}
} else {
	trigger_logikserror("Sorry, Module not defined.");
}
?>
