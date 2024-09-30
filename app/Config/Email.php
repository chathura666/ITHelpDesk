<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'chathuradulanga@gmail.com';
    public $SMTPPass = 'Jony666@Gmail';
    public $SMTPPort = 587;
    public $SMTPCrypto = 'tls';
    public $mailType = 'html';
    public $charset = 'utf-8';
    public $validate = true;
    public $priority = 3;
    public $CRLF = "\r\n";
    public $newline = "\r\n";
}
