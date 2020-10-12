<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| Este arquivo especifica quais sistemas devem ser carregados por padrão.
|
|Com o propósito de manter o sistema menos pesado possível,apenas os 
| recursos mínimos são carregados por padrão.
*Por exemplo,
|o banco de dados não é conectado automaticamente, já que nenhuma 
|suposição é feita sobre se você pretende usá-lo ou não. Este arquivo 
|permite que você defina globalmente quais sistemas você gostaria de 
|carregar em cada solicitação.
|
| -------------------------------------------------------------------
| Instruções
| -------------------------------------------------------------------
|
| Essas são coisas que vocẽ pode carregar automáticamente:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Protótipo:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| Essas são as classes localizadas em /libraries/ ou em seu
| application/libraries/ directory, com a adição do
| 'database' library, que é somente para um caso especial.
|
| Protótipo:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| Você também pode fornecer um nome de library alternativa a ser 
| atribuído no controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('session');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| Essas classes são localizadas em system/libraries/ ou em seu
| application/libraries/ directory, mas também são colocados dentro de 
| seu próprio subdiretório e estendem o CI_Driver_Library class. Eles 
| oferecem várias opções de driver intercambiáveis.
|
| Protótipo:
|
|	$autoload['drivers'] = array('cache');
|
| Você também pode fornecer um nome de propriedade alternativa 
| a ser atribuído no controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Protótipo:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'form', 'date');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Protótipo:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTA: Este item é destinado somente para você se você tiver criado 
| arquivos de configuração personalizados. 
| Caso contrário, deixe em branco.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Protótipo:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTA: Não inclua o "_lang" part de seu arquivo.  Por Exemplo:
| "codeigniter_lang.php" seria referenciado como array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Protótipo:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| Você também pode fornecer um nome de modelo alternativo 
| a ser atribuído no controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
