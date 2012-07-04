<?php
interface Swiftlet_Interfaces_Controller {

    public function __construct(Swiftlet_Interfaces_App $app, Swiftlet_Interfaces_View $view);

    public function index();

    public function notImplemented();
}
