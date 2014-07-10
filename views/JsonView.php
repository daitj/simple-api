<?php

class JsonView extends ApiView {
    public function render($content) {
        header('Content-type:application/json; charset=utf-8');
        echo json_encode($content);
        return true;
    }
}
