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
  $control = 2;
  $_SESSION['control_num'] = $control;
  redirect_to('/manage');
}

dispatch('/manage', 'get_control');
function get_control(){
  $control_num = (isset($_SESSION['control_num']) ? $_SESSION['control_num'] : false );
  if($control_num){
    return render('control'.$control_num.'.html.php');
  } else{
    redirect_to('/');
  }
}

// used from ajax in control 1
dispatch('/check-cogni-id', 'check_cogni_id');
function check_cogni_id(){
  global $conn;
  $cogni_id = trim( end(explode('/', $_GET['cogni_id'])) );
  // all tickets in which this cogni-id exits
  $q = "select * from receipts where cogni_id = $cogni_id || email = $cogni_id";
  $result = $conn->query($q);
  if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
      $data[] = $row;
      // now all the entries on same ticket
      $q = "select * from receipts where ticket_id = ".$row['ticket_id'];
      $result2 = $conn->query($q);
      if ($result2->num_rows > 0){
        while ($row2 = $results->fetch_assoc()){
          $data[] = $row2;
        }
      }
    }
  }
  return json_encode($data);
}

// on submitting the control-1
dispatch_post('/verify', 'save_control1');
function save_control1(){
  
}

// on submitting the control-2
dispatch_post('/allot', 'save_control2');
function save_control1(){
  
}

//Route for all public assets
dispatch('/public/**', 'public_pages');
function public_pages(){
  $filename = params(0);
  return render_file(option('public_dir').'/'.$filename);
};

function configure(){
  global $conn;
  $conn = new mysqli('localhost', 'root', '', 'cogni-controls');
  if ($conn->connect_error)
    die('Connection failed: '.$conn->connect_error);
}

run();

?>