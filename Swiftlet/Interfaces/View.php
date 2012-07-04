<?php
interface Swiftlet_Interfaces_View {

    public function __construct(Swiftlet_Interfaces_App $app, $name);

    public function get($variable, $htmlEncode = true);

    public function set($variable, $value = null);

    public function htmlEncode($value);

    public function htmlDecode($value);

    public function render();
}