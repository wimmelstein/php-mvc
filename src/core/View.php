<?php


namespace app\core;


class View {

    public function renderTemplate() {
        ob_start();
        include_once(Application::$ROOT_DIR . '/layout/template.php');
        return ob_get_clean();
    }

    public function renderContent($view)
    {
        ob_start();
        include_once (Application::$ROOT_DIR . "/views/$view.php");
        return ob_get_clean();
    }

    public function render($view) {
        $layout = $this->renderTemplate();
        $content = $this->renderContent($view);
        echo str_replace('{{content}}', $content, $layout);

    }
}
