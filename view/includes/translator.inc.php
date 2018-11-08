<!-- 
Author: Philipp Lehmann
Source 1: https://www.youtube.com/watch?v=cgvDMUrQ3vA
Source 2: https://www.w3schools.com/php/func_http_setcookie.asp
-->

<?php
    $cookie_name = "lang";
    
    if(!isset($_COOKIE[$cookie_name]))
         setcookie($cookie_name, 'en', time() + (86400 * 30), '/');
    else if(isset($_GET['lang']) && $_COOKIE[$cookie_name] != $_GET['lang'] && !empty($_GET['lang'])){
        if($_GET['lang'] == "en"){
            setcookie($cookie_name, 'en', time() + (86400 * 30), '/');
        header("Refresh:0");
        }else if($_GET['lang'] == "de"){
            setcookie($cookie_name, 'de', time() + (86400 * 30), '/');
            header("Refresh:0");
        }
    }

    require_once "view/assets/language/" . $_COOKIE[$cookie_name] . ".php";
?>