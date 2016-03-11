<?php
// limonade
require_once 'lib/limonade.php';
require_once 'functions.php';

dispatch('/', 'login');
function login(){
  return render('login.html.php');
}

dispatch_post('/', 'login');
function login(){
  $con = $_POST['control_num'];
  $pass = $_POST['password'];

  header(Location: '/control-1')
}

dispatch('/control-1', 'control1');
function control1(){
  global $control;
  auth_control($control);
}

run();

?>