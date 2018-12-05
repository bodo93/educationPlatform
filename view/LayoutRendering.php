<?php

/*
 * Author: Andreas Martin
 */

namespace view;

class LayoutRendering {

    public static function basicLayout(TemplateView $contentView) {
        $view = new TemplateView("layout.php");
        $view->header = (new TemplateView("header.inc.php"))->render();
        $view->content = $contentView->render();
        $view->footer = (new TemplateView("footer.inc.php"))->render();
        echo $view->render();
    }

}
