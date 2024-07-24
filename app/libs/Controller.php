<?php

class Controller 
{
    public function model($model) {
        require_once '../app/models/' . ucwords($model) . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        if (file_exists(
            '../app/views/' . $view . '.php'
        )) {
            extract(
                $data
            );
            require_once '../app/views/' . $view . '.php';
        } else die(
            'View not found'
        );
    }
}
