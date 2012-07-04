<?php
abstract class Swiftlet_Controller implements Swiftlet_Interfaces_Controller {
    
    /**
     * @var Swiftlet_Interfaces_App 
     */
    protected $app;
    /**
     * @var Swiftlet_Interfaces_View 
     */
    protected $view;
    protected $title;

    /**
     * Constructor
     * @param object $app
     * @param object $view
     */
    public function __construct(Swiftlet_Interfaces_App $app, Swiftlet_Interfaces_View $view) {
        $this->app  = $app;
        $this->view = $view;

        $this->view->set('pageTitle', $this->title);
    }

    /**
     * Default action
     */
    public function index() {}

    /**
     * Fallback in case action doesn't exist
     */
    public function notImplemented() {
        throw new Exception('Action ' . $this->view->htmlEncode($this->app->getAction()) . ' not implemented in ' . get_called_class());
    }
}