<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$cardArr = [
        "navigation"=> [
            "title"=> "Navigations",
            "subtitle"=>"Menu Items",
            "descs"=> "With a navigation menu, visitors can easily make their way around your website and get to where they want to go, whether it's your online store or your about us page.",
            "icon"=> '<i class="fas fa-bars"></i>',
            "link"=> "#",
            "module_check"=> false
        ],
        "modules"=> [
            "title"=> "Modules",
            "subtitle"=>"Plugable Modules",
            "descs"=> "Modular components designed to help developers deal with common development challenges. It provides an extensible building block for robust, scalable applications",
            "icon"=> '<i class="fas fa-cubes"></i>',
            "link"=> "#",
            "module_check"=> false
        ],
        "masters"=> [
            "title"=> "Masters",
            "subtitle"=>"Data Masters",
            "descs"=> "Master data is the set of identifiers that provides context about business data such as location, customer, product, asset, etc.",
            "icon"=> '<i class="fas fa-list"></i>',
            "link"=> "#",
            "module_check"=> false
        ]
    ];
?>
<style>
.card {
    /* border: #fff; */
    background: #fff;
    padding: 30px;
    text-align: center;
    box-shadow: 1px 1px 7px 2px #ddd;
    margin-bottom: 30px;
    height: 240px;
    cursor: pointer;
}
.social-box .box {
    background: #FFF;
    border-radius: 10px; 
    cursor: pointer;
    margin: 20px 0;
    padding: 40px 10px;
    transition: all 0.5s ease-out;
}
.social-box .box:hover {
    box-shadow: 0 0 6px #4183D7;
}
.social-box .box-text {
    font-size: 15px;
    line-height: 30px;
    margin: 20px 0;
}
.social-box .box-btn a {
    color: #4183D7;
    font-size: 16px;
    text-decoration: none;
}
.social-box .fa {
    color: #4183D7;
}
.card i{
    font-size: 40px;
}
.card img{
    width: 41px;
}
.card .card-back {
    font-size: 12px;
    color: grey;
}
</style>
<div class="container-studio container-fluid">
    <div class="row" style="padding: 10px;">
        <?php
            foreach($cardArr as $id=>$card) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div data-cardid='<?=$id?>' class="card">
                    <div class="card-front">
                        <?=$card['icon']?>
                        <h3><?=$card['title']?></h3>
                        <p><?=$card['subtitle']?></p>
                    </div>
                    <div class="card-back">
                        <?=$card['descs']?>
                    </div>
                </div>
            </div>
            <?php
            }
        ?>
    </div>
</div>
<script>
$(function() {
    $(".container-studio .card").click(openCard);
});
function openCard() {
    var cardID = $(this).data("cardid");
    alert(cardID);
}
</script>