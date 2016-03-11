<?php
// limonade
require_once 'lib/limonade.php';
require_once 'functions.php';

function before(){
  layout('default.php');
}

dispatch('/', 'login');
function login(){
  return render('login.html.php');
}

dispatch_post('/', 'login_post');
function login_post(){
  $con = $_POST['control_num'];
  $pass = $_POST['password'];

  header('Location: /control-1');
}

dispatch('/control-1', 'control1');
function control1(){
  global $control;
  auth_control($control);
}

run();

?>