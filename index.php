<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require_once("view/layout.php");

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

Router::route("GET", "/register", function(){
    require_once("view/instituteRegistration.php");
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

Router::route_auth("GET", "/", $authFunction, function () {
    layoutSetContent("home.php");
});

Router::route_auth("GET", "/institute/edit", $authFunction, function () {
    require_once("view/instituteEdit.php");
});

Router::route_auth("GET", "/course/overview", $authFunction, function () {
    layoutSetContent("courseOverview.php");
});

Router::route_auth("GET", "/course/create", $authFunction, function () {
    layoutSetContent("courseCreate.php");
});

Router::route_auth("GET", "/course/edit", $authFunction, function () {
    layoutSetContent("customerEdit.php");
});


Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);