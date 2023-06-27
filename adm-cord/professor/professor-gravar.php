<?php

require_once "../../classes/Professor.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../lib/vendor/autoload.php';
$mail = new PHPMailer(true);

$professor = new Professor();

$professor->nome = $_POST['nome'];
$professor->sobrenome = $_POST['sobrenome'];
$professor->data_nasc = $_POST['data_nasc'];
$professor->email = $_POST['email'];
$professor->tel = $_POST['tel'];
$professor->cpf = $_POST['cpf'];
$professor->cep = $_POST['cep'];
$professor->endereco = $_POST['endereco'];
$professor->n_casa = $_POST['n_casa'];
$professor->bairro = $_POST['bairro'];
$professor->cidade = $_POST['cidade'];
$professor->estado = $_POST['estado'];
$senha = $professor->gerarSenha();
$professor->senha = password_hash($senha, PASSWORD_DEFAULT);

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
    $mail->addAddress($_POST['email'], $_POST['nome']);

    $mail->isHTML(true);
    $mail->Subject = 'Acesso Portal de Editais Fatec';
    $mail->Body = 'Prezado(a) ' . $_POST['nome'] . ".<br><br>Segue abaixo seu login e senha para acessar o portal de editais da fatec itapira<br><br>Login: " . $_POST['cpf'] . "<br><br>Senha: $senha";
    $mail->AltBody = 'Prezado(a) ' . $_POST['nome'] . ".\n\nSegue abaixo seu login e senha para acessar o portal de editais da fatec itapira\n\nLogin: " . $_POST['cpf'] . "\n\n<br><br>Senha: $senha";
    $mail->send();
} catch (Exception $e) {
    header("Location: ../adm.php?dir=professor&file=professor-inserir&erro=1");
}
$professor->inserir();
header("Location: ../adm.php?dir=professor&file=professor-inserir");