<!-- 
Author: Philipp Lehmann
Source 1: https://www.youtube.com/watch?v=cgvDMUrQ3vA
Source 2: https://www.w3schools.com/php/func_http_setcookie.asp
-->

<?php
    $cookie_name = "lang";
    
    if(!isset($_COOKIE[$cookie_name])){
         setcookie($cookie_name, 'en', time() + (86400 * 30), '/');
         $_COOKIE[$cookie_name] = 'en';
    }
    else if(isset($_GET['lang']) && $_COOKIE[$cookie_name] != $_GET['lang'] && !empty($_COOKIE[$cookie_name])){
        echo $_GET['lang'];
        if($_COOKIE[$cookie_name] == "de"){
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, 'en', time() + (86400 * 30), '/');
            $_COOKIE[$cookie_name] = 'en';
        }else if($_COOKIE[$cookie_name] == "en"){
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, 'de', time() + (86400 * 30), '/');
            $_COOKIE[$cookie_name] = 'de';
        }
    }
    
    require_once "view/assets/language/" . $_COOKIE[$cookie_name] . ".php";
?>