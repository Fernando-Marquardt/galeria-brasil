# Galeria Brasil 3.1.2 Beta

## REQUISITOS

Requisitos necessários para utilizar a galeria:

 - Servidor HTTP (Apache, IIS, TomCat, etc.)
 - PHP 5 ou superior
 - MySQL 4.1 ou superior
 - GD2 com suporte à JPEG, PNG e GIF
 - Flash Player 9 ou superior

## TECNOLOGIAS UTILIZADAS NO DESENVOLVIMENTO

Foram utilizadas as seguintes tecnologias/softwares para desenvolver a Galeria Brail:
 - PHP (http://www.php.net/)
 - MySQL (http://www.mysql.com/)
 - GD Graphics Library (http://www.boutell.com/gd/)
 - Smarty Template Engine (http://www.smarty.net/)
 - PHPMailer (http://phpmailer.codeworxtech.com/)
 - FancyUpload (http://digitarald.de/project/fancyupload/)
 - Mootools (http://www.mootools.net/)

## COMO INSTALAR

 1. Descompacte os arquivos em uma pasta do seu sistema.
 2. Envie estes arquivos através de FTP para o seu servidor e de permissão de leitura e escrita (CHMOD 0777 no Linux) nos seguintes arquivos e pastas:
    - core/inc.config.php
    - galerias/
    - compile/
    - instalar/compile
    - admin/compile
 3. Cria uma tabela no banco de dados MySQL
 4. Acesse a pasta instalar no endereço onde está sua galeria. E siga os passos citados na tela. Exemplo: http://www.seusite.com.br/galeria/instalar
 5. Terminada a instalação altere as permissões do arquivo core/inc.config.php para Somente Leitura (CHMOD 0444 no Linux) e remova a pasta instalar/ do seu servidor.
