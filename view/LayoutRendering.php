<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace view;

class LayoutRendering {

    public static function basicLayout(TemplateView $contentView) {
        $view = new TemplateView("layout.php");
        $view->header = (new TemplateView("header.php"))->render();
        $view->content = $contentView->render();
        $view->footer = (new TemplateView("footer.php"))->render();
        echo $view->render();
    }

}
