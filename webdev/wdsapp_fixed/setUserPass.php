<?php
include_once 'controllers/session_control.php';
include_once 'controllers/functions.php';
include_once 'controllers/model.php';
include_once 'config/app.php';

$session = new session_control();
$functions = new functions();
$model = new model();

$token = $_POST["token"];
$email = $_POST["email"];
$password = $_POST["senha"];
$newPassword = hash('sha256',md5($password));


$rsToken = $functions->checkToken($token, $email);
//echo $rsToken;

if($rsToken){
    $qryUpdate = "UPDATE users SET senha = '".$newPassword."' WHERE id = ".$rsToken;
    $rsExec = $model->model_exec($qryUpdate);
    if ($rsExec){
        echo 1;
    }else{
        echo "Impossível criar uma nova senha. Contate o Administrador.";
    }
}else{
    echo "Link de alteração de senha inválido.";
}
