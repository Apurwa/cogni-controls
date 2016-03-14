<?php
// limonade
require_once 'lib/limonade.php';
require_once 'functions.php';
session_start();


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
  global $conn;
  $control_num = (isset($_SESSION['control_num']) ? $_SESSION['control_num'] : false );
  if ($control_num){
    $after_c1 = [];
    if ($control_num == 2){
      $q = "select * from check_ins where kit_issued = false || id_issued = false";
      $after_c1 = select_q($q);
    }
    return render('control'.$control_num.'.html.php', 'default.php', array('c2'=>$after_c1));
  } else{
    redirect_to('/');
  }
}

// used from ajax in control 1
dispatch('/check-cogni-id', 'check_cogni_id');
function check_cogni_id(){
  global $conn;
  $cogni_id = $_GET['cogni_id'];
  // all tickets in which this cogni-id exits
  $q = "select * from receipts where cogni_id = '$cogni_id' or email like '$cogni_id%'";
  $result = $conn->query($q);
  if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
      // now all the entries on same ticket
      $q = "select * from receipts where ticket_id = '".$row['ticket_id']."'";
      $result2 = $conn->query($q);
      if ($result2->num_rows > 0){
        while ($row2 = $result2->fetch_assoc()){
          $data[] = $row2;
        }
      }
    }
  }
  return json_encode($data);
}

// on submitting the control-1
dispatch_post('/c1-submit', 'save_control1');
function save_control1(){
  global $conn, $check_ins_cols; $c1_values = '';
  $c1_data = json_decode($_POST['c1_data'], true);
  foreach ($c1_data as $key => $value) {
    $c1_values .= "('', '".$c1_data[$key]['receipt_id']."', '".$c1_data[$key]['cogni_id']."', '".$c1_data[$key]['ticket_id']."', '".$c1_data[$key]['noc']."', '".$c1_data[$key]['college_id']."', '".$c1_data[$key]['is_acco']."','','','','','".date('Y-m-d h:i:sa')."','')";
    if ($key+1 < sizeof($c1_data))
      $c1_values .= ', ';
  }
  $q = "insert into check_ins ($check_ins_cols) values $c1_values";
  //echo $q;
  if ($conn->query($q))
    return 'success';
  else
    return 'Error: '.$conn->error;
}

// on submitting the control-2
dispatch_post('/c2-submit', 'save_control2');
function save_control2(){
  global $conn, $check_ins_cols;
  $c2_values = "kit_issued = ".$_POST['kit_issued'].", id_issued = ".$_POST['id_issued'].",
               bhawan = '".$_POST['bhawan']."', room_no = '".$_POST['room']."', control2_at = '".date('Y-m-d h:i:sa')."'";
  $q = "update check_ins set $c2_values where receipt_id = '".$_POST['receipt_id']."'";
  //echo $q;
  if ($conn->query($q))
    return 'success';
  else
    return 'Error: '.$conn->error;
}

//Route for all public assets
dispatch('/public/**', 'public_pages');
function public_pages(){
  $filename = params(0);
  return render_file(option('public_dir').'/'.$filename);
};

function before(){
  global $control;
  $control = 1;
  layout('default.php');
}

function configure(){
  global $conn;
  $conn = new mysqli('127.0.0.1', 'root', 'root', 'cogni-controls');
  if ($conn->connect_error)
    die('Connection failed: '.$conn->connect_error);

  global $check_ins_cols;
  $check_ins_cols = "id, receipt_id, cogni_id, ticket_id, noc, college_id, is_acco, kit_issued, id_issued, bhawan, room_no, control1_at, control2_at";
}

run();

?>