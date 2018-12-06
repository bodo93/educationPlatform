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
use controller\InstituteController;
use controller\CourseController;
use controller\EmailController;

ini_set( 'session.cookie_httponly', 1 );
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

// JUST FOR TESTING
// ################
Router::route("GET", "/Invoice", function(){
    require_once("Invoice/createInvoice.php");
});

// JUST FOR TESTING
// ################
Router::route("GET", "/sendEmail", function(){
    require_once("Testing/sendEmail.php");
});

Router::route_auth("GET", "/course/edit", $authFunction, function () {
    require_once("view/courseEdit.php");
});

Router::route_auth("POST", "/course/edit", $authFunction, function () {
    CourseController::update();
});

Router::route("GET", "/login", function(){
    require_once("view/instituteLogin.php");
});

Router::route("POST", "/login", function () {
    InstituteController::login();
});

Router::route("GET", "/login/forgotPassword", function(){
    require_once("view/instituteForgotPassword.php");
});

Router::route("POST", "/login/forgotPassword", function(){
    EmailController::resetPw();
});

Router::route("GET", "/login/newPassword", function(){
    require_once("view/instituteNewPassword.php");
});

Router::route("GET", "/register", function(){
    require_once("view/instituteCreateAccount.php");
});

Router::route("POST", "/register", function () {
    InstituteController::register();
});

Router::route("GET", "/ourOffer", function(){
    require_once("view/ourOffer.php");
});

Router::route("GET", "/terms", function(){
    require_once("view/terms.php");
});

Router::route("GET", "/test", function(){
    require_once("view/TEST.php");
});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});

Router::route_auth("POST", "/course/overview", $authFunction, function () {
    require_once("view/courseOverview.php");
});

Router::route_auth("GET", "/course/overview", $authFunction, function () {
    require_once("view/courseOverview.php");
});

Router::route_auth("GET", "/course/create", $authFunction, function () {
    require_once("view/courseCreate.php");
});

Router::route_auth("GET", "/institute", $authFunction, function () {
    require_once("view/instituteShowAccount.php");
});

Router::route_auth("GET", "/institute/edit", $authFunction, function () {
    require_once("view/instituteEditAccount.php");
});

Router::route_auth("POST", "/institute/edit", $authFunction, function () {
    InstituteController::updateAccount();
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

Router::route_auth("POST", "/course/create", $authFunction, function () {
    CourseController::create();
});

Router::route_auth("GET", "/course/cost", $authFunction, function () {
    require_once("view/courseCost.php");
});

Router::route_auth("POST", "/course/cost", $authFunction, function () {
    require_once("view/courseCost.php");
});

Router::route_auth("GET", "/course/delete", $authFunction, function () {
    require_once("view/courseDelete.php");
});

Router::route_auth("POST", "/course/delete", $authFunction, function () {
    CourseController::delete();
});

Router::route("GET", "", function () {
    require_once("view/search.php");
});

Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $errorFunction);