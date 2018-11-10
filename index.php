<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require_once("config/Autoloader.php");
require_once("view/layout.php");

use routing\Router;

session_start();

$authFunction = function () {
    if (isset($_SESSION["instituteLogin"])) {
        return true;
    }
    Router::redirect("/login");
    return false;
};

$errorFunction = function () {
    Router::errorHeader();
    require_once("view/404.php");
};

Router::route("GET", "/login", function(){
    require_once("view/instituteLogin.php");
});

Router::route("POST", "/dbaccess", function(){
    require_once("view/dbAccess.php");
});

Router::route("GET", "/login/forgotPassword", function(){
    require_once("view/instituteForgotPassword.php");
});

Router::route("GET", "/register", function(){
    require_once("view/instituteRegistration.php");
});

Router::route("GET", "/ourterms", function(){
    require_once("view/terms.php");
});

Router::route("POST", "/dbregister", function(){
    require_once("view/dbRegistration.php");
});

Router::route("POST", "/register", function(){
    Router::redirect("/logout");
});

Router::route("POST", "/login", function () {
    session_regenerate_id(true);
    $_SESSION['instituteLogin']=$_POST['email'];
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});

/* IM EINSATZ
Router::route_auth("GET", "/", $authFunction, function () {
    require_once("view/home.php");
});

Router::route_auth("GET", "/search", $authFunction, function () {
    require_once("view/search.php");
});


Router::route_auth("GET", "/institute/edit", $authFunction, function () {
    require_once("view/instituteEdit.php");
});

Router::route_auth("GET", "/course/overview", $authFunction, function () {
    require_once("view/courseOverview.php");
});

Router::route_auth("GET", "/course/create", $authFunction, function () {
    require_once("view/courseCreate.php");
});

Router::route_auth("GET", "/course/edit", $authFunction, function () {
    require_once("view/courseEdit.php");
});
*/

// JUST 4 TESTING
Router::route("GET", "/",  function () {
    require_once("view/home.php");
});

Router::route("GET", "/search", function () {
    require_once("view/search.php");
});

Router::route("POST", "/search", function () {
    require_once("view/search.php");
});

Router::route("POST", "/searchResult", function () {
    require_once("view/searchResult.php");
});

Router::route("GET", "/institute/edit", function () {
    require_once("view/instituteEdit.php");
});

Router::route("GET", "/course/overview", function () {
    require_once("view/courseOverview.php");
});

Router::route("POST", "/course/overview", function () {
    require_once("view/courseOverview.php");
});

Router::route("GET", "/course/create", function () {
    require_once("view/courseCreate.php");
});

Router::route("POST", "/course/create", function () {
    require_once("view/courseCreate.php");
});

Router::route("GET", "/course/edit", function () {
    require_once("view/courseEdit.php");
});

Router::route("POST", "/course/edit", function () {
    require_once("view/courseEdit.php");
});

Router::route("GET", "/course/delete", function () {
    require_once("view/courseDelete.php");
});

Router::route("POST", "/course/delete", function () {
    require_once("view/courseDelete.php");
});

Router::route("POST", "/course/delete", function () {
    require_once("view/courseDelete.php");
});

Router::route("GET", "/search", function () {
    require_once("view/search.php");
});

Router::route("GET", "", function () {
    require_once("view/home.php");
});


Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);
