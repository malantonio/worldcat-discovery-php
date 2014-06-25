<?php
// Copyright 2014 OCLC
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
// http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

error_reporting(E_ALL | E_STRICT);
require __DIR__ . '/../vendor/autoload.php';

global $environment, $authorizationServer, $serviceURL;

use OCLC\Auth\AccessToken;
use WorldCat\Discovery\Bib;
use WorldCat\Discovery\Database;

if (isset($environment)){
    AccessToken::$authorizationServer = $authorizationServer;
    Bib::$serviceUrl = $serviceURL;
    Database::$serviceUrl = $serviceURL;
    $cassettePath = 'mocks/' . $environment;
} else {
    $cassettePath = 'mocks';
}

\VCR\VCR::turnOn();
\VCR\VCR::configure()->setCassettePath($cassettePath);
?>