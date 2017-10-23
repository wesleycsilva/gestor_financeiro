<?php

require 'model/Model.php';

/**
 * Description of Controller
 *
 * @author Wesley
 */
class Controller {

    public function Index() {
        $model = new Model();
        $dados = $model->ListaDados();
        include 'view/view.php';
    }

}
