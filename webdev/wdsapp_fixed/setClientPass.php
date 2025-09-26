<?php
include_once 'controllers/functions.php';
include_once 'controllers/session_control.php';
include_once 'controllers/model.php';
include_once 'config/app.php';

$model = new model();
$session = new session_control();
$functions = new functions();


$token = $_POST["token"];
$email = $_POST["email"];
$password = $_POST["senha"];
$newPassword = $password;

$rsToken = $functions->checkClientToken($token, $email);
//echo $rsToken;

if($rsToken){
    $qryUpdate = "UPDATE clients SET password = '".$newPassword."' WHERE id = ".$rsToken;
    $rsExec = $model->model_exec($qryUpdate);
    if ($rsExec){
        echo 1;
    }else{
        echo "Impossível criar uma nova senha. Contate o Administrador.";
    }
}else{
    echo "Não foi possível reconhecer os dados informados.";
}