<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$cardArr = [
        "navigation"=> [
            "title"=> "Navigations",
            "subtitle"=>"Menu Items",
            "descs"=> "With a navigation menu, visitors can easily make their way around your website and get to where they want to go, whether it's your online store or your about us page.",
            "icon"=> '<i class="fi fi-tr-rectangle-list"></i>',
            "link"=> "#",
            "module_check"=> false
        ],
        "modules"=> [
            "title"=> "Modules",
            "subtitle"=>"Plugable Modules",
            "descs"=> "Modular components designed to help developers deal with common development challenges. It provides an extensible building block for robust, scalable applications",
            "icon"=> '<i class="fi fi-tr-cubes"></i>',
            "link"=> "#",
            "module_check"=> false
        ],
        "masters"=> [
            "title"=> "Masters",
            "subtitle"=>"Data Masters",
            "descs"=> "Master data is the set of identifiers that provides context about business data such as location, customer, product, asset, etc.",
            "icon"=> '<i class="fi fi-tr-tab-folder"></i>',
            "link"=> "#",
            "module_check"=> false
        ]
    ];
?>
<style>

.card {
    /*border: #fff; */
    background: #F6E5CA;
    padding: 30px;
    text-align: center;
    box-shadow: 1px 1px 7px 2px #ddd;
    margin-bottom: 30px;
    height: auto;
    cursor: pointer;
    min-height: 300px;
}
.dashboard  .col-lg-3:nth-child(2) .card {
        background-color: #f3d6ef;
}
.dashboard  .col-lg-3:nth-child(3) .card {
      
    background-color: #bfdde3;
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
        font-size: 13px;
    color: #161616;
    margin-top: 10px;
}
.card-front h3{
          margin-top: 4px;
    color: rgb(0 0 0 / 81%);
    margin-bottom: 0px;
    font-size: 20px;
    font-weight: 700;

}
.card i {
    font-size: 40px;
    opacity: 0.5;
        color: #6a4100;
}
.dashboard .col-lg-3:nth-child(2) .card i{
        color: #36002f;
}
.dashboard .col-lg-3:nth-child(3) .card i{
            color: #002128;
}
.container-studio .col-lg-3 {
    width: 16.66666667%;
}
.card .card-back{
        
    display: -webkit-box;
    -webkit-line-clamp: 3;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
}
.card{
    padding: 18px;
        min-height: unset;
}
p.subTitle {
    font-size: 13px;
}
.card .card-back{
        color: #000000;
}
@media(max-width:1450px){
    .container-studio .col-lg-3 {
    width: 20%;
}
}
@media(max-width:1199px){
    .container-studio .col-lg-3 {
    width: 25%;
}
}
@media(max-width:991px){
    .container-studio .col-lg-3 {
    width: 33.33%;
}
}
@media(max-width:767px){
    .container-studio .col-lg-3 {
    width: 50%;
}
}
</style>
<div class="container-studio container-fluid">
    <div class="row" style="padding: 10px;">
        <?php
            foreach($cardArr as $id=>$card) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div data-cardid='<?=$id?>' class="card infoCard">
                    <div class="card-front">
                       <?=$card['icon']?>
                        <h3><?=$card['title']?></h3>
                        <p class="subTitle"><?=$card['subtitle']?></p>
                        
                    </div>
                    <div class="card-back" title="<?=$card['descs']?>">
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