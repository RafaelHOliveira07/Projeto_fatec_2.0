<?php

require_once "../../classes/Professor.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../lib/vendor/autoload.php';
$mail = new PHPMailer(true);

(!empty($_POST['email'])) ? $email = $_POST['email'] : $email = $_GET['email'];

$sql = "SELECT prof_id, email, nome, sobrenome FROM tb_prof WHERE email ='{$email}' LIMIT 1";

include "../../classes/Conexao.php";

$resultado = $conexao->query($sql);
$lista = $resultado->fetch();
$emailExistente = $lista['email'];
$prof_id = $lista['prof_id'];
$nome = $lista['nome'] . " " . $lista['sobrenome'];

if (!(($email) === ($emailExistente))) {
    header('Location: ../index.php?dir=login&file=recuperar-senha&email=não');
} else {
    $professor = new Professor($prof_id);
    $chave_recuperar = password_hash($prof_id, PASSWORD_DEFAULT);
    $professor->recuperar_senha = $chave_recuperar;
    $professor->atualizarRecuperarSenha();
    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'acccac5512828f';
        $mail->Password = 'e65019a8614c35';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        $mail->setFrom('atendimento@fatec.com', 'Atendimento');
        $mail->addAddress($emailExistente, $nome);

        $mail->isHTML(true);
        $mail->Subject = 'Recuperar senha';
        $mail->Body = 'Prezado(a) ' . $nome . ".<br><br>Segue abaixo a chave para a recuperação da senha<br><br>Chave: " . $chave_recuperar ."<br><br>Se não solicitou a alteração de senha, nehuma ação é necessária.";
        $mail->AltBody = 'Prezado(a) ' . $nome . ".\n\nSegue abaixo a chave para a recuperação da senha\n\nChave: " . $chave_recuperar . "\n\nSe não solicitou a alteração de senha, nehuma ação é necessária.";
        $mail->send();
        header("Location: ../index.php?dir=login&file=recuperar-atualizar&chave={$chave_recuperar}&id={$prof_id}&email={$email}");
    } catch (Exception $e) {
        header("Location: ../index.php?dir=login&file=recuperar-senha&email=erro");
    }
}