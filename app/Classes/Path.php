<?php

namespace App\Classes;


class Path {
    public $text;
    public $path;

    public function __construct($text, $path) {
        $this -> text = $text;
        $this -> path = $path;
    }
}