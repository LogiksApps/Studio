<?php
if(!defined('ROOT')) exit('No direct script access allowed');
//Main Sidebar

$sidebars = perspectives_sidebar();
if(!$sidebars) {
?>
<style>
#sidebar, #leftMenuOpen {display: none !important;}
#header {left: 0px !important;}
#page-wrapper {margin: 0px !important;}
body.home #content>ul#myTab {left: 0px !important;}
</style>
<?php
    return;
} elseif(count($sidebars)==1) {
?>
<style>
.sidebarMenu {
    top: 47px !important;
}
</style>
<?php
}

// printArray($sidebars);
$firstOne = array_keys($sidebars)[0];
?>
<div class="panel-group" id="sidebarAccordion">
    <?php
        foreach($sidebars as $src=>$srcConfig) {
            $icon = $srcConfig['icon'];
            
            $openClassHeader = "";
            $openClassBody = "";
            $areaExpand = "";
            if($src==$firstOne) {
                $openClassHeader = " active";
                $openClassBody = " in";
                $areaExpand = "aria-expanded='true'";
            }
            ?>
            <div class="panel panel-default ">
                  <div class="panel-heading <?=$openClassHeader?>">
                    <h4 class="panel-title <?=$openClassHeader?> mainTitle" >
                      <a data-toggle="collapse" data-parent="#sidebarAccordion" <?=$areaExpand?> href="#collapse-<?=$src?>"><?="<i class='{$icon}'></i>&nbsp;"._ling($srcConfig['title'])?></a>
                    </h4>
                  </div>
                  <div id="collapse-<?=$src?>" class="panel-collapse collapse <?=$openClassBody?> mainCollapse">
                    <div class="panel-body">
                        <?php
                            $srcArr = explode(".", $srcConfig['src']);
                            if(count($srcArr)>1)
                                loadPluginComponent($srcArr[0], $srcArr[1]);
                            else
                                loadWidget($srcConfig['src']);
                        ?>
                    </div>
                  </div>
            </div>
            <?php
        }
    ?>
</div>