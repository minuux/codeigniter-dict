<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Minuux\Dict\SimpleDict;

class Dict {

    protected $path='';
    protected $out='';

    function __construct($config) {
        empty($config) OR $this->initialize($config);
        if (!file_exists($this->out)) {
            SimpleDict::make($this->path, $this->out);
        }
        $this->filter=new SimpleDict($this->out);
    }

    public function initialize($config = array()) {
        foreach ($config as $key => $val) {
            if (isset($this->$key)) {
                $this->$key = $val;
            }
        }
        return $this;
    }

    function search($str) {
        return $this->filter->search($str);
    }

    function replace($str, $replace) {
        return $this->filter->replace($str, $replace);
    }

}
