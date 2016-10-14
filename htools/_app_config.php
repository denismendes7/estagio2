<?php
/**
 * @package Htools
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "Model/User.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'Secure.LoginForm'),
	'POST:login' => array('route' => 'Secure.Login'),
	'GET:secureuser' => array('route' => 'Secure.UserPage'),
	'GET:secureadmin' => array('route' => 'Secure.AdminPage'),
	'GET:logout' => array('route' => 'Secure.Logout'),
	
	// Funcoes Autenticacao
	'GET:roles' => array('route' => 'Role.ListView'),
	'GET:role/(:num)' => array('route' => 'Role.SingleView', 'params' => array('id' => 1)),
	'GET:api/roles' => array('route' => 'Role.Query'),
	'POST:api/role' => array('route' => 'Role.Create'),
	'GET:api/role/(:num)' => array('route' => 'Role.Read', 'params' => array('id' => 2)),
	'PUT:api/role/(:num)' => array('route' => 'Role.Update', 'params' => array('id' => 2)),
	'DELETE:api/role/(:num)' => array('route' => 'Role.Delete', 'params' => array('id' => 2)),
		
	// Usuarios Autenticacao
	'GET:users' => array('route' => 'User.ListView'),
	'GET:user/(:num)' => array('route' => 'User.SingleView', 'params' => array('id' => 1)),
	'GET:api/users' => array('route' => 'User.Query'),
	'POST:api/user' => array('route' => 'User.Create'),
	'GET:api/user/(:num)' => array('route' => 'User.Read', 'params' => array('id' => 2)),
	'PUT:api/user/(:num)' => array('route' => 'User.Update', 'params' => array('id' => 2)),
	'DELETE:api/user/(:num)' => array('route' => 'User.Delete', 'params' => array('id' => 2)),
		
		
	// Facebook
	'GET:facebooks' => array('route' => 'Facebook.ListView'),
	'GET:facebook/(:any)' => array('route' => 'Facebook.SingleView', 'params' => array('id' => 1)),
	'GET:api/facebooks' => array('route' => 'Facebook.Query'),
	'POST:api/facebook' => array('route' => 'Facebook.Create'),
	'GET:api/facebook/(:any)' => array('route' => 'Facebook.Read', 'params' => array('id' => 2)),
	'PUT:api/facebook/(:any)' => array('route' => 'Facebook.Update', 'params' => array('id' => 2)),
	'DELETE:api/facebook/(:any)' => array('route' => 'Facebook.Delete', 'params' => array('id' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:num)' => array('route' => 'Usuario.SingleView', 'params' => array('id' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:num)' => array('route' => 'Usuario.Read', 'params' => array('id' => 2)),
	'PUT:api/usuario/(:num)' => array('route' => 'Usuario.Update', 'params' => array('id' => 2)),
	'DELETE:api/usuario/(:num)' => array('route' => 'Usuario.Delete', 'params' => array('id' => 2)),
		
	// Concentrador
	'GET:concentradores' => array('route' => 'Concentrador.ListView'),
	'GET:concentrador/(:num)' => array('route' => 'Concentrador.SingleView', 'params' => array('id' => 1)),
	'GET:api/concentradores' => array('route' => 'Concentrador.Query'),
	'POST:api/concentrador' => array('route' => 'Concentrador.Create'),
	'GET:api/concentrador/(:num)' => array('route' => 'Concentrador.Read', 'params' => array('id' => 2)),
	'PUT:api/concentrador/(:num)' => array('route' => 'Concentrador.Update', 'params' => array('id' => 2)),
	'DELETE:api/concentrador/(:num)' => array('route' => 'Concentrador.Delete', 'params' => array('id' => 2)),
		
	// Empresa
	'GET:empresas' => array('route' => 'Empresa.ListView'),
	'GET:empresa/(:num)' => array('route' => 'Empresa.SingleView', 'params' => array('id' => 1)),
	'GET:api/empresas' => array('route' => 'Empresa.Query'),
	'POST:api/empresa' => array('route' => 'Empresa.Create'),
	'GET:api/empresa/(:num)' => array('route' => 'Empresa.Read', 'params' => array('id' => 2)),
	'PUT:api/empresa/(:num)' => array('route' => 'Empresa.Update', 'params' => array('id' => 2)),
	'DELETE:api/empresa/(:num)' => array('route' => 'Empresa.Delete', 'params' => array('id' => 2)),
		
	// Acesso
	'GET:acessos' => array('route' => 'Acesso.ListView'),
	'GET:acesso/(:num)' => array('route' => 'Acesso.SingleView', 'params' => array('id' => 1)),
	'GET:api/acessos' => array('route' => 'Acesso.Query'),
	'POST:api/acesso' => array('route' => 'Acesso.Create'),
	'GET:api/acesso/(:num)' => array('route' => 'Acesso.Read', 'params' => array('id' => 2)),
	'PUT:api/acesso/(:num)' => array('route' => 'Acesso.Update', 'params' => array('id' => 2)),
	'DELETE:api/acesso/(:num)' => array('route' => 'Acesso.Delete', 'params' => array('id' => 2)),
		
	// PFacebook
	'GET:pfacebooks' => array('route' => 'PFacebook.ListView'),
	'GET:pfacebook/(:num)' => array('route' => 'PFacebook.SingleView', 'params' => array('id' => 1)),
	'GET:api/pfacebooks' => array('route' => 'PFacebook.Query'),
	'POST:api/pfacebook' => array('route' => 'PFacebook.Create'),
	'GET:api/pfacebook/(:num)' => array('route' => 'PFacebook.Read', 'params' => array('id' => 2)),
	'PUT:api/pfacebook/(:num)' => array('route' => 'PFacebook.Update', 'params' => array('id' => 2)),
	'DELETE:api/pfacebook/(:num)' => array('route' => 'PFacebook.Delete', 'params' => array('id' => 2)),
		
	// PerfilSms
	'GET:perfilsmses' => array('route' => 'PerfilSms.ListView'),
	'GET:perfilsms/(:num)' => array('route' => 'PerfilSms.SingleView', 'params' => array('id' => 1)),
	'GET:api/perfilsmses' => array('route' => 'PerfilSms.Query'),
	'POST:api/perfilsms' => array('route' => 'PerfilSms.Create'),
	'GET:api/perfilsms/(:num)' => array('route' => 'PerfilSms.Read', 'params' => array('id' => 2)),
	'PUT:api/perfilsms/(:num)' => array('route' => 'PerfilSms.Update', 'params' => array('id' => 2)),
	'DELETE:api/perfilsms/(:num)' => array('route' => 'PerfilSms.Delete', 'params' => array('id' => 2)),
		
	// RelacaoAcesso
	'GET:relacaoacessos' => array('route' => 'RelacaoAcesso.ListView'),
	'GET:relacaoacesso/(:num)' => array('route' => 'RelacaoAcesso.SingleView', 'params' => array('id' => 1)),
	'GET:api/relacaoacessos' => array('route' => 'RelacaoAcesso.Query'),
	'POST:api/relacaoacesso' => array('route' => 'RelacaoAcesso.Create'),
	'GET:api/relacaoacesso/(:num)' => array('route' => 'RelacaoAcesso.Read', 'params' => array('id' => 2)),
	'PUT:api/relacaoacesso/(:num)' => array('route' => 'RelacaoAcesso.Update', 'params' => array('id' => 2)),
	'DELETE:api/relacaoacesso/(:num)' => array('route' => 'RelacaoAcesso.Delete', 'params' => array('id' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Concentrador","fk_perfil",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("PerfilSms","fk_sms",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("User","u_role",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>