<?php
abstract class Swiftlet_Model implements Swiftlet_Interfaces_Model {
    
    protected $app;

    /**
     * Constructor
     * @param object $app
     */
    public function __construct(Swiftlet_Interfaces_App $app) {
        $this->app = $app;
    }
}