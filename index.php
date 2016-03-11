<?php
// limonade
require_once 'lib/limonade.php';

dispatch('/', 'login');
function login(){
  return 'hello world!';
}

run();

?>