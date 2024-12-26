<?php
require_once __DIR__ . '/Language.php';

$lang = Language::getInstance();

if (isset($_GET['lang'])) {
    $lang->setLanguage($_GET['lang']);
} 
else if (isset($_COOKIE['preferred_language'])) {
    $lang->setLanguage($_COOKIE['preferred_language']);
} 
else {
    $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (in_array($browserLang, $lang->getAvailableLangs())) {
        $lang->setLanguage($browserLang);
    }
}

function t($key) {
    return Language::t($key);
}
