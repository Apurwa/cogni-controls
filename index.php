<?php
// limonade
require_once 'lib/limonade.php';
require_once 'functions.php';
session_start();

function before(){
  global $control;
  $control = 1;
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
  $control = 1;
  $_SESSION['control_num'] = $control;
  redirect_to('/manage');
}

dispatch('/manage', 'get_control');
function get_control(){
  $control_num = (isset($_SESSION['control_num']) ? $_SESSION['control_num'] : false );
  if($control_num){
    return render('control'.$control_num.'.html.php');
  } else{
    header('location: /');
  }
}

//Route for all public assets
dispatch('/public/**', 'public_pages');
function public_pages(){
  $filename = params(0);
  return render_file(option('public_dir').'/'.$filename);
};

/*function configure(){
  option('base_uri', '/cogni-controls');
  # option('base_uri', '/my_app'); # '/' or same as the RewriteBase in your .htaccess
}*/

run();

?>