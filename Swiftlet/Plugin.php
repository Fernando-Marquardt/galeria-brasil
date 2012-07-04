<?php
abstract class Swiftlet_Plugin implements Swiftlet_Interfaces_Plugin {
    
    protected
            $app,
            $controller,
            $view
            ;

    /**
     * Constructor
     * @param object $app
     * @param object $view
     * @param object $controller
     */
    public function __construct(Swiftlet_Interfaces_App $app, Swiftlet_Interfaces_View $view, Swiftlet_Interfaces_Controller $controller) {
        $this->app        = $app;
        $this->view       = $view;
        $this->controller = $controller;
    }
}