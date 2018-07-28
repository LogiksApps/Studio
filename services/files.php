<?php
if(!defined('ROOT')) exit('No direct script access allowed');
checkServiceAccess();

$_ENV['HIDDEN']=[
		"tmp",
		".git",
	];
$_ENV['NOSCAN']=[
        "usermedia",
		"tmp",
		"temp",
		".git",
	];

switch ($_REQUEST['action']) {
	case 'listFiles':
		if(checkUserRoles("FILES","LIST")) {
			loadHelpers("files");

			$APPPATH=ROOT.APPS_FOLDER.$_GET['forsite']."/";
			printServiceMsg(array_reverse(scanFolderTree($APPPATH)));
		} else {
			printServiceMsg([]);
		}
		break;
	case "newFolder":
		if(isset($_POST['path'])) {
			$fDir=str_replace("//","/",CMS_APPROOT.$_POST['path']);
			if(file_exists($fDir)) {
				echo "Folder with same name exists at the given path.";
				return;
			}
			mkdir($fDir,0777,true);
			if(!is_dir($fDir)) {
				echo "New Folder Could Not Be created.";
			} else {
				_log("New Folder : {$_POST['path']} #".CMS_SITENAME." @{$_SESSION['SESS_USER_ID']}","files");
				echo "FILE:{$_POST['path']}";
			}
		} else {
			echo "New Path Not Found.";
		}
		break;
	case "newFile":
		if(isset($_POST['path'])) {
			$fDir=str_replace("//","/",CMS_APPROOT.$_POST['path']);
			if(file_exists($fDir)) {
				echo "File with same name exists at the given path.";
				return;
			}
			file_put_contents($fDir,"");
			if(!is_file($fDir)) {
				echo "New Folder Could Not Be created.";
			} else {
				_log("New File : {$_POST['path']} #".CMS_SITENAME." @{$_SESSION['SESS_USER_ID']}","files");
				echo "FILE:{$_POST['path']}";
			}
		} else {
			echo "New Path Not Found.";
		}
		break;
	case "rm":
    if(isset($_POST['path'])) {
			$fDir=str_replace("//","/",CMS_APPROOT.$_POST['path']);
			if(!file_exists($fDir)) {
				echo "File/Folder does not exist.";
				return;
			}
      deleteFolder($fDir);
      if(!file_exists($fDir)) echo "Deleted file successfully";
      else echo "Error deleting file. Check if its readonly";
		} else {
			echo "New Path Not Found.";
		}
		break;
	case "cp":
		break;
	case "mv":
		break;
	case "clone"://clone
		break;
	case "rename"://rename
		break;
  	case "permissions"://permissions
		break;
}
function scanFolderTree($folder) {
	$files=array();
	$folders=array();
	if(is_dir($folder)) {
		$out=scandir($folder);
		$out=array_splice($out, 2);
		asort($out);
		foreach($out as $key => $value) {
		    if(in_array($value,$_ENV['NOSCAN'])) continue;
			$bf=$folder.$value;
			$bf=str_replace(ROOT.APPS_FOLDER."{$_GET['forsite']}/", "", $bf);
			if(in_array($bf, $_ENV['HIDDEN'])) continue;
			if(is_dir($folder.$value)) {
				$folders[$value]=scanFolderTree($folder.$value."/");
			} else {
				$files[]=$value;
			}
		}
	}
	return array_merge_recursive(array_reverse($folders),$files);
}
/* 
 * php delete function that deals with directories recursively
 */
function deleteFolder($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

        foreach( $files as $file ) {
            deleteFolder( $file );      
        }

        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );  
    }
  return file_exists($target);
}
?>
