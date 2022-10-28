<?php

require_once '../app/application.php';

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

Core\Action::getActionByUrl($url)->run();
