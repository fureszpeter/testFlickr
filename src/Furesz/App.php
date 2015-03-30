<?php

namespace Furesz;

class App extends Singleton
{

    /** @var  string */
    private $appRoot;

    /**
     * @return void
     */
    public function bootstrap()
    {
        $this->setTimezone();
    }

    /**
     * @return string
     */
    public function getAppRoot()
    {
        return realpath($this->appRoot);
    }

    /**
     * @return void
     */
    private function setTimezone()
    {
        if (ini_get("date.timezone")) {
            ini_set("date.timezone", "Europe/Budapest");
        }
    }

    /**
     * @param $rootPath
     */
    public function setAppRoot($rootPath)
    {
        $this->appRoot = realpath($rootPath);
    }

    /**
     * @param bool $on
     */
    public function setDebug($on)
    {
        error_reporting(E_ALL);
        ini_set("display_errors", ($on ? "On" : "Off"));
    }
}