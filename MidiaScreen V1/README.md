# MidiaScreen V1

Site institucional da **MidiaScreen**, desenvolvido em HTML, CSS,
JavaScript e PHP, com integração de envio de e-mails via **PHPMailer**.

## 🚀 Estrutura do Projeto

-   `index.html` → Página principal do site\
-   `css/style.css` → Estilos e identidade visual\
-   `js/script.js` → Scripts de interação\
-   `php/enviar-email.php` → Lógica de envio de formulários\
-   `phpmailer/` → Biblioteca PHPMailer para envio de e-mails\
-   `img/` → Logos, ícones e imagens do site

## ⚙️ Funcionalidades

-   Página institucional responsiva\
-   Seção de serviços e contato\
-   Formulário de contato com envio de e-mail via **PHPMailer**\
-   Integração com redes sociais (Instagram, LinkedIn, WhatsApp, E-mail)

## 🛠️ Tecnologias Utilizadas

-   **HTML5**\
-   **CSS3**\
-   **JavaScript**\
-   **PHP 7+**\
-   **PHPMailer**

## 📦 Instalação

1.  Clone ou baixe este repositório:

    ``` bash
    git clone https://github.com/seu-usuario/midiascreen-v1.git
    ```

2.  Coloque os arquivos em um servidor com suporte a **PHP** (Apache,
    Nginx ou XAMPP/Laragon para local).\

3.  Configure o arquivo `php/enviar-email.php` com as credenciais
    corretas do seu servidor SMTP.

## 📧 Configuração do PHPMailer

No arquivo `php/enviar-email.php`, edite as credenciais:

``` php
$mail->Host = 'smtp.seuprovedor.com';
$mail->Username = 'seu-email@dominio.com';
$mail->Password = 'sua-senha';
$mail->setFrom('seu-email@dominio.com', 'MidiaScreen');
$mail->addAddress('destinatario@dominio.com', 'Destinatário');
```

## 🌐 Acesso

Após configurar corretamente, acesse o site em:

    http://localhost/MidiaScreen V1/

ou no domínio configurado.

## 📄 Licença

Este projeto é de uso privado da **MidiaScreen**. Todos os direitos
reservados.
