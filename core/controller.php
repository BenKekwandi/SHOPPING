<?php


class Controller
{
    public function load_view($view,$data)
    {
        require(ROOT_PATH.'/views/'.$view.'.php');
    }
}

?>