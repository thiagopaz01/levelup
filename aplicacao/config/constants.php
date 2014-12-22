<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*-------------------------------------------------------------------------
 Dados do projeto
 -------------------------------------------------------------------------*/
define('TITULO_PROJETO', 'bsa-site');
define('NOME_CLIENTE', 'Bezerra de Souza Advogados');
define('EMAIL_GATILHO', 'igor.melo@plano4.com.br');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('USUARIO_ATIVO',	'ativo');
define('USUARIO_INATIVO', 'inativo');

define('DESCRIPTION', '');
define('KEYWORDS', '');

// Includes
define('INC_HEADER_ADMIN', 'conteudo/admin/include/inc_header_admin.php');
define('INC_MENU_ADMIN', 'conteudo/admin/include/inc_adm_menu.php');
define('INC_FOOTER_ADMIN', 'conteudo/admin/include/inc_footer.php');
define('MOBILE_DETECT', 'conteudo/site/include/Mobile_Detect.php');

/* End of file constants.php */
/* Location: ./application/config/constants.php */