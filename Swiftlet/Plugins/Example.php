<?php
class Swiftlet_Plugins_Example extends Swiftlet_Plugin {

    /**
     * Implementation of the actionAfter hook
     */
    public function actionAfter() {
        if (get_class($this->controller) === 'Swiftlet_Controllers_Index') {
            $helloWorld = $this->view->get('helloWorld');

            $this->view->set('helloWorld', $helloWorld . ' This string was altered by ' . __CLASS__ . '.');
        }
    }
}