<?php
interface Swiftlet_Interfaces_Plugin {
    
    public function __construct(Swiftlet_Interfaces_App $app, Swiftlet_Interfaces_View $view, Swiftlet_Interfaces_Controller $controller);
}
