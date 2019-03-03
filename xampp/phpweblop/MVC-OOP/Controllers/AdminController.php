<?php
class AdminController extends Controller {
    public function indexAction(){
      /*  echo __METHOD__;

            echo '<pre><br>';
                    print_r($this);
            echo '</pre>';*/
        $this->view->Abc = "đây là biến ABc";

    }
}