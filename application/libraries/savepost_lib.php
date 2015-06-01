<?php
class Savepost_lib {
    function __construct() {
		$this -> _ci =& get_instance();
		$this -> _ci -> memcachedlib -> set(__keyTMP($_SERVER['REQUEST_URI']), $_POST, 300);
		var_dump($this -> _ci -> memcachedlib -> get(__keyTMP($_SERVER['REQUEST_URI'])));die;
	}
}
