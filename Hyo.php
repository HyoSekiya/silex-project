<?php

class Hyo {
    public $name;

    public function constract($value) {
        $this->name = $value;
    }

    public function Hello () {
        return 'Hello' + $this.name;
    }
}