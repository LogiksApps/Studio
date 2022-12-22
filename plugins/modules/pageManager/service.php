<?php
if(!defined('ROOT')) exit('No direct script access allowed');

checkServiceAccess();

if(!isset($_REQUEST["action"])) {
	printServiceErrorMsg("NotAcceptable","Action Not Defined.");
}
if(!isset($_REQUEST["comptype"])) {
	printServiceErrorMsg("NotAcceptable","Component Type Not Defined.");
}
switch ($_REQUEST['action']) {
	case 'getlist':
		$fs=[];
		switch ($_REQUEST["comptype"]) {
			case 'pages':
				$pageFolder=CMS_APPROOT."pages/defn/";
				if(!is_dir($pageFolder)) @mkdir($pageFolder,0777,true);
				$fData=scanFetch($pageFolder);
				foreach($fData as $kn => $pageInfo) {
				    if(isset($pageInfo['folder']) && $pageInfo['folder']==true) {
				        
				        foreach($pageInfo as $a=>$b) {
				            if(is_array($b)) {
				                $pageJSONInfo = json_decode(file_get_contents($pageFolder.$b['path']),true);
				    
            				    $fData[$kn][$a]['title'] = $pageJSONInfo['title'];
            				    $fData[$kn][$a]['enabled'] = ($pageJSONInfo['enabled']=="true")?true:false;
            				    $fData[$kn][$a]['access'] = (isset($pageJSONInfo['access'])?$pageJSONInfo['access']:"public");
            				    $fData[$kn][$a]['template'] = $pageJSONInfo['template'];
            				    $fData[$kn][$a]['slug'] = $pageJSONInfo['slug'];
				            }
				        }
				        continue;
				    }
				    
				    $pageJSONInfo = json_decode(file_get_contents($pageFolder.$pageInfo['path']),true);
				    
				    $fData[$kn]['title'] = $pageJSONInfo['title'];
				    $fData[$kn]['enabled'] = ($pageJSONInfo['enabled']=="true")?true:false;
				    $fData[$kn]['access'] = (isset($pageJSONInfo['access'])?$pageJSONInfo['access']:"public");
				    $fData[$kn]['template'] = $pageJSONInfo['template'];
				    $fData[$kn]['slug'] = $pageJSONInfo['slug'];
				}
				printServiceMsg($fData);
				break;
			case 'comps':
				$pageFolder=CMS_APPROOT."pages/comps/";
				if(!is_dir($pageFolder)) @mkdir($pageFolder,0777,true);
				$fData=scanFetch($pageFolder);
				printServiceMsg($fData);
				break;
			case 'layouts':
				$pageFolder=CMS_APPROOT."css/templates/";
				if(!is_dir($pageFolder)) @mkdir($pageFolder,0777,true);
				$fData=scanFetch($pageFolder);
				printServiceMsg($fData);
				break;
			case 'snippets':
				$pageFolder=CMS_APPROOT."pages/snippets/";
				if(!is_dir($pageFolder)) @mkdir($pageFolder,0777,true);
				$fData=scanFetch($pageFolder);
				printServiceMsg($fData);
				break;
		}
	break;

	case "create":
		if(isset($_REQUEST["src"])) {
			$_REQUEST["src"]=str_replace(" ", "_", str_replace("/", "_", $_REQUEST["src"]));
			$_REQUEST["src"]=strtolower(cleanSpecial($_REQUEST["src"]));
			$src=$_REQUEST["src"];
			switch ($_REQUEST["comptype"]) {
				case 'pages':
					$defaultPageJson=[
							"title"=>toTitle(str_replace("_", " ", $src)),
							"description"=>"",
							"keywords"=>"",
							"robot"=>"",
							"slug"=>"",
							"template"=>"default",
							"enabled"=>"true",
							"access"=>"public",
							"meta"=>[],
						];
					$fs=[
							CMS_APPROOT."pages/defn/{$src}.json"=>json_encode($defaultPageJson,JSON_PRETTY_PRINT|JSON_HEX_QUOT|JSON_UNESCAPED_SLASHES),
							CMS_APPROOT."pages/viewpage/{$src}.tpl"=>"",
							CMS_APPROOT."pages/viewpage/{$src}.php"=>"<?php \n\n\n?>",
						];
					foreach ($fs as $f=>$data) {
						file_put_contents($f, $data);
					}
					break;
				case 'comps':
					$fs=[
							CMS_APPROOT."pages/comps/{$src}.tpl"=>"",
						];
					foreach ($fs as $f=>$data) {
						//if(!is_dir(dirname($f))) mkdir(dirname($f),0777,true);
						file_put_contents($f, $data);
					}
					break;
				case 'layouts':
					$fs=[
							CMS_APPROOT."css/templates/{$src}.tpl"=>"",
						];
					foreach ($fs as $f=>$data) {
						file_put_contents($f, $data);
					}
					break;
				case 'snippets':
					$fs=[
							CMS_APPROOT."pages/snippets/{$src}.php"=>"<?php \n\n\n?>",
						];
					foreach ($fs as $f=>$data) {
						//if(!is_dir(dirname($f))) mkdir(dirname($f),0777,true);
						file_put_contents($f, $data);
					}
					break;
			}
		} else {
			echo "<h1 align=center>Sorry, Source not defined.</h1>";
		}
	break;
	case "delete":
		if(isset($_POST["src"])) {
			$srcFiles=str_replace(".json", "", $_POST["src"]);
			$srcFiles=explode(",", $srcFiles);
			switch ($_REQUEST["comptype"]) {
				case 'pages':
					foreach ($srcFiles as $src) {
						$fs=[
								CMS_APPROOT."pages/viewpage/{$src}.tpl",
								CMS_APPROOT."pages/viewpage/{$src}.php",
								CMS_APPROOT."css/comps/{$src}.css",
								CMS_APPROOT."js/comps/{$src}.js",
								CMS_APPROOT."pages/defn/{$src}.json",
							];
						foreach ($fs as $f) {
							if(file_exists($f)) {
								unlink($f);
							}
						}
					}
					break;
				case 'comps':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", str_replace(".php","",$src));
						$fs=[
								CMS_APPROOT."pages/comps/{$src}.tpl",
								CMS_APPROOT."pages/comps/{$src}.php",
							];
						foreach ($fs as $f) {echo $f;
							if(file_exists($f)) {
								unlink($f);
							}
						}
					}
					break;
				case 'layouts':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", $src);
						$fs=[
								CMS_APPROOT."css/templates/{$src}.tpl",
							];
						foreach ($fs as $f) {
							if(file_exists($f)) {
								unlink($f);
							}
						}
					}
					break;
				case 'snippets':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", str_replace(".php","",$src));
						$fs=[
								CMS_APPROOT."pages/snippets/{$src}.php",
							];
						foreach ($fs as $f) {echo $f;
							if(file_exists($f)) {
								unlink($f);
							}
						}
					}
					break;
			}
		} else {
			echo "<h1 align=center>Sorry, Source not defined.</h1>";
		}
	break;

	case "rename":
		if(isset($_REQUEST["src"]) && isset($_REQUEST["new"])) {
			$_REQUEST["new"]=str_replace(" ", "_", str_replace("/", "_", $_REQUEST["new"]));
			$_REQUEST["new"]=strtolower(cleanSpecial($_REQUEST["new"]));

			$srcNew=$_REQUEST["new"];
			$src=$_REQUEST["src"];

			switch ($_REQUEST["comptype"]) {
				case 'pages':
					$src=str_replace(".json", "", $src);
					$srcNew=str_replace(".json", "", $srcNew);

					$fs=[
							CMS_APPROOT."pages/viewpage/{$src}.tpl"=>CMS_APPROOT."pages/viewpage/{$srcNew}.tpl",
							CMS_APPROOT."pages/viewpage/{$src}.php"=>CMS_APPROOT."pages/viewpage/{$srcNew}.php",
							CMS_APPROOT."css/comps/{$src}.css"=>CMS_APPROOT."css/comps/{$srcNew}.css",
							CMS_APPROOT."js/comps/{$src}.js"=>CMS_APPROOT."js/comps/{$srcNew}.js",
							CMS_APPROOT."pages/defn/{$src}.json"=>CMS_APPROOT."pages/defn/{$srcNew}.json",
						];
					foreach ($fs as $f1=>$f2) {
						if(file_exists($f1)) {
							if(!is_dir(dirname($f2))) mkdir(dirname($f2),0777,true);
							copy($f1, $f2);
							unlink($f1);
						}
					}
				break;
				case 'comps':
					$src=str_replace(".tpl", "", str_replace(".php","",$src));
					$srcNew=str_replace(".tpl", "", str_replace(".php","",$srcNew));
					
					$fs=[
							CMS_APPROOT."pages/comps/{$src}.tpl"=>CMS_APPROOT."pages/comps/{$srcNew}.tpl",
							CMS_APPROOT."pages/comps/{$src}.php"=>CMS_APPROOT."pages/comps/{$srcNew}.php",
						];
					foreach ($fs as $f1=>$f2) {
						if(file_exists($f1)) {
							if(!is_dir(dirname($f2))) mkdir(dirname($f2),0777,true);
							copy($f1, $f2);
							unlink($f1);
						}
					}
				break;
				case 'layouts':
					$src=str_replace(".tpl", "", $src);
					$srcNew=str_replace(".tpl", "", $srcNew);

					$fs=[
							CMS_APPROOT."css/templates/{$src}.tpl"=>CMS_APPROOT."css/templates/{$srcNew}.tpl",
						];
					var_dump($fs);
					foreach ($fs as $f1=>$f2) {
						if(file_exists($f1)) {
							if(!is_dir(dirname($f2))) mkdir(dirname($f2),0777,true);
							copy($f1, $f2);
							unlink($f1);
						}
					}
				break;
				case 'snippets':
					$src=str_replace(".tpl", "", str_replace(".php","",$src));
					$srcNew=str_replace(".tpl", "", str_replace(".php","",$srcNew));
					
					$fs=[
							CMS_APPROOT."pages/snippets/{$src}.php"=>CMS_APPROOT."pages/snippets/{$srcNew}.php",
						];
					foreach ($fs as $f1=>$f2) {
						if(file_exists($f1)) {
							if(!is_dir(dirname($f2))) mkdir(dirname($f2),0777,true);
							copy($f1, $f2);
							unlink($f1);
						}
					}
				break;
			}
		} else {
			echo "<h1 align=center>Sorry, Source or New Name not defined.</h1>";
		}
	break;

	case "clone":
		if(isset($_REQUEST["src"])) {
			$srcFiles=explode(",", $_REQUEST["src"]);

			switch ($_REQUEST["comptype"]) {
				case 'pages':
					foreach ($srcFiles as $src) {
						$src=str_replace(".json", "", $src);
						$fs=[
								CMS_APPROOT."pages/viewpage/{$src}.tpl"=>CMS_APPROOT."pages/viewpage/{$src}-copy.tpl",
								CMS_APPROOT."pages/viewpage/{$src}.php"=>CMS_APPROOT."pages/viewpage/{$src}-copy.php",
								CMS_APPROOT."css/comps/{$src}.css"=>CMS_APPROOT."css/comps/{$src}-copy.css",
								CMS_APPROOT."js/comps/{$src}.js"=>CMS_APPROOT."js/comps/{$src}-copy.js",
								CMS_APPROOT."pages/defn/{$src}.json"=>CMS_APPROOT."pages/defn/{$src}-copy.json",
							];
						foreach ($fs as $f1=>$f2) {
							if(file_exists($f1)) {
								copy($f1, $f2);
							}
						}
					}
					break;
				case 'comps':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", str_replace(".php","",$src));
						$fs=[
								CMS_APPROOT."pages/comps/{$src}.tpl"=>CMS_APPROOT."pages/comps/{$src}-copy.tpl",
								CMS_APPROOT."pages/comps/{$src}.php"=>CMS_APPROOT."pages/comps/{$src}-copy.php",
							];
						foreach ($fs as $f1=>$f2) {
							if(file_exists($f1)) {
								copy($f1, $f2);
							}
						}
					}
					break;
				case 'layouts':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", $src);
						$fs=[
								CMS_APPROOT."css/templates/{$src}.tpl"=>CMS_APPROOT."css/templates/{$src}-copy.tpl",
							];
						foreach ($fs as $f1=>$f2) {
							if(file_exists($f1)) {
								if(is_writable(dirname($f2))) {
									copy($f1, $f2);
								} else {
									exit("failed: Layout Template folder is write protected.");
								}
							}
						}
					}
					break;
				case 'snippets':
					foreach ($srcFiles as $src) {
						$src=str_replace(".tpl", "", str_replace(".php","",$src));
						$fs=[
								CMS_APPROOT."pages/snippets/{$src}.php"=>CMS_APPROOT."pages/snippets/{$src}-copy.php",
							];
						foreach ($fs as $f1=>$f2) {
							if(file_exists($f1)) {
								copy($f1, $f2);
							}
						}
					}
					break;
			}
			
		} else {
			echo "<h1 align=center>Sorry, Source not defined.</h1>";
		}
	break;
}
function scanFetch($dir,$relativePath="") {
	if(!is_dir($dir)) return [];
	$fs=[];
	if(is_dir($dir)) {
		$fs=scandir($dir);
		$fs=array_splice($fs, 2);

		$fData=[];
		foreach ($fs as $key => $fx) {
			if(strpos(strtolower($fx), ".txt")>2) {
				continue;
			}
			if(strpos($fx, "_")>1) {
				$fxx=explode("_", $fx);
				$fxy=array_splice($fxx, 1);
				$fxy=implode("_", $fxy);
				$fxx=implode("_", $fxx);

				$fxy=str_replace(".json", "", str_replace(".tpl", "", str_replace(".php", "", $fxy)));

				if(!isset($fData[$fxx])) $fData[$fxx]=["folder"=>true];
				elseif(!isset($fData[$fxx]['folder'])) {
					$temp=$fData[$fxx];
					$fData[$fxx]=["folder"=>true];
					$fData[$fxx][$temp['name']]=$temp;
				}
				$fData[$fxx][$fxy]=fInfo($dir.$fx,$relativePath.$fx);
				
				//$fData[$fxx]=array_merge(["folder"=>true],scanFetch($dir.$fx."/",$relativePath.$fx."/"));
			} else {
				$fxy=str_replace(".json", "", str_replace(".tpl", "", str_replace(".php", "", $fx)));
				$fData[$fxy]=fInfo($dir.$fx,$relativePath.$fx);
			}
		}
		$fs=$fData;
	}
	ksort($fs);
	return $fs;
}
function fInfo($f,$relativePath) {
	$info=[];
	$info['created']=date("Y/m/d F H:i:s.", filectime($f));
	$info['updated']=date("Y/m/d F H:i:s.", filemtime($f));
	$info['size']=filesize($f);

	$info['type']=$_REQUEST["comptype"];

	$info['locked']=(!is_writable($f));
	$info['is_open']=false;
	$info['open_by']=false;
	
	$info['status']="NA";

	$info['path']=$relativePath;

	$info['name']=explode(".", basename($f));
	array_splice($info['name'], 1);
	$info['name']=implode(".", $info['name']);
	
	$info['title']=toTitle($info['name']);

	$info['edit']="";
	//http://logiks.com/modules/cmsEditor?site=studio&forsite=default&type=edit&src=%2Fpages%2Fcomps%2FtestComp.tpl

	return $info;
}
?>
