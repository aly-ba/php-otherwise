<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include_once "classes/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->css = "<link href='css/layout.css' rel='stylesheet' />";
$pageData->title = "Building and processing HTML forms with PHP";
$pageData->content = include_once "views/navigation.php";

$navigationIsClicked = isset($_GET['page']);
if ( $navigationIsClicked ) {
    $fileToLoad = $_GET['page'];
} else {
    $fileToLoad = "search";
}
$pageData->content .= include_once "views/$fileToLoad.php";

$page = include_once "templates/page.php";
echo $page;
