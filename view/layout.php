<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function layoutSetContent($content){
    require_once("header.php");
    require_once($content);
    require_once("footer.php");
}