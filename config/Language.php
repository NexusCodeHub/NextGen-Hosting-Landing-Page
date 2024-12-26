<?php
class Language {
    private static $instance = null;
    private $translations = [];
    private $currentLang = 'de';
    private $availableLangs = ['de', 'en'];

    private function __construct() {
        $this->loadLanguage($this->currentLang);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setLanguage($lang) {
        if (in_array($lang, $this->availableLangs)) {
            $this->currentLang = $lang;
            $this->loadLanguage($lang);
            setcookie('preferred_language', $lang, time() + (86400 * 30), '/');
            return true;
        }
        return false;
    }

    private function loadLanguage($lang) {
        $langFile = __DIR__ . "/lang/{$lang}.php";
        if (file_exists($langFile)) {
            $this->translations = require $langFile;
        }
    }

    public function get($key) {
        $keys = explode('.', $key);
        $value = $this->translations;

        foreach ($keys as $k) {
            if (isset($value[$k])) {
                $value = $value[$k];
            } else {
                return $key;
            }
        }

        return $value;
    }

    public function getCurrentLang() {
        return $this->currentLang;
    }

    public function getAvailableLangs() {
        return $this->availableLangs;
    }

    public static function t($key) {
        return self::getInstance()->get($key);
    }
}
