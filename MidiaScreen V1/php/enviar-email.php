<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../phpmailer/PHPMailer.php';
require __DIR__ . '/../phpmailer/SMTP.php';
require __DIR__ . '/../phpmailer/Exception.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'email-ssl.com.br';
    $mail->SMTPAuth = true;
    $mail->Username = 'email';
    $mail->Password = 'senha_segura_aqui';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('emailr', 'MidiaScreen');
    $mail->addAddress('email', 'MidiaScreen');

    $mail->isHTML(true);
    $mail->Subject = 'Nova mensagem do site';

    $nome = $_POST['nome'] ?? 'Não informado';
    $email = $_POST['email'] ?? 'Não informado';
    $mensagem = $_POST['mensagem'] ?? 'Sem mensagem';

    $mail->Body = "
        <strong>Nome:</strong> {$nome}<br>
        <strong>Email:</strong> {$email}<br>
        <strong>Mensagem:</strong><br>
        " . nl2br($mensagem);

    if ($mail->send()) {
        echo '<html><head><style>
            body { font-family: Arial, sans-serif; background: linear-gradient(to bottom, #00c6ff, #0072ff); color: white; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
            .box { background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 10px; text-align: center; max-width: 400px; }
            .icon { font-size: 50px; }
            a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: white; color: #0072ff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        </style></head><body>
        <div class="box">
            <div class="icon">✅</div>
            <h1>Mensagem enviada com sucesso!</h1>
            <p>Obrigado por entrar em contato. Retornaremos em breve.</p>
            <a href="/">Voltar ao site</a>
        </div>
        </body></html>';
    } else {
        echo '<html><head><style>
            body { font-family: Arial, sans-serif; background: linear-gradient(to bottom, #ff4b1f, #ff9068); color: white; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
            .box { background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 10px; text-align: center; max-width: 400px; }
            .icon { font-size: 50px; }
            a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: white; color: #ff4b1f; text-decoration: none; border-radius: 5px; font-weight: bold; }
        </style></head><body>
        <div class="box">
            <div class="icon">❌</div>
            <h1>Erro ao enviar mensagem</h1>
            <p>Por favor, tente novamente mais tarde.</p>
            <a href="/">Voltar ao site</a>
        </div>
        </body></html>';
    }
} catch (Exception $e) {
    echo '<html><head><style>
        body { font-family: Arial, sans-serif; background: linear-gradient(to bottom, #ff4b1f, #ff9068); color: white; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .box { background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 10px; text-align: center; max-width: 400px; }
        .icon { font-size: 50px; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: white; color: #ff4b1f; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style></head><body>
    <div class="box">
        <div class="icon">❌</div>
        <h1>Erro ao enviar mensagem</h1>
        <p>Detalhes: ' . htmlspecialchars($e->getMessage()) . '</p>
        <a href="/">Voltar ao site</a>
    </div>
    </body></html>';
}
?>