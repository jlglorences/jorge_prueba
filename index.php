<?php

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/*
 * Vamos a crear un conflicto
 * Esta es la linea 1 jodiendo desde la 2
 * Vamos a crear el conflicto
 * Linea 2 para un nuevo conflicto. A cascarla desde aquí
 */

/*
 * añado una linea en 2
 * Sumo a la linea de antes
 * pongo otra linea
 */

// CLI/Nginx/Cron: We need to set the "current working directory" to this folder
chdir(dirname(__FILE__));

// vendors not installed
if (!is_dir(__DIR__ . '/vendor')) {
    echo 'Your install is missing some dependencies. If you have composer
         installed you should run: <code>composer install</code>. If you
         don\'t have composer installed you really should, see
         http://getcomposer.org for more information';
    exit;
}

require_once __DIR__ . '/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// get environment and debug mode from environment variables
$env = getenv('FORK_ENV') ?: 'prod';
$debug = getenv('FORK_DEBUG') === '1';

// Fork has not yet been installed
$parametersFile = dirname(__FILE__) . '/app/config/parameters.yml';
$request = Request::createFromGlobals();
if (!file_exists($parametersFile)) {
    $env = 'install';
    if (substr($request->getRequestURI(), 0, 8) != '/install') {
        // check .htaccess
        if (!file_exists('.htaccess') && !isset($_GET['skiphtaccess'])) {
            echo 'Your install is missing the .htaccess file. Make sure you show
                 hidden files while uploading Fork CMS. Read the article about
                 <a href="http://www.fork-cms.com/community/documentation/detail/installation/webservers">webservers</a>
                 for further information. <a href="?skiphtaccess">Skip .htaccess
                 check</a>';
            exit;
        }

        header('Location: /install');
        exit;
    }
}

require_once __DIR__ . '/app/AppKernel.php';

if (extension_loaded('newrelic')) {
    newrelic_name_transaction(strtok($request->getRequestUri(), '?'));
}

if ($debug) {
    Debug::enable();
	7+
	+7 9999999999999999999999999999999999999999
	+7
	+7
	+7
	+7
	+7
	+7
	+7
	+7
}

$kernel = new AppKernel($env, $debug);
$response = $kernel->handle($request);
if ($response->getCharset() === null && $kernel->getContainer() != null) {
    $response->setCharset(
        $kernel->getContainer()->getParameter('kernel.charset')
    );
}

9
9
9
9
9
9
9
9
9
9
$response->send();
$kernel->terminate($request, $response);
