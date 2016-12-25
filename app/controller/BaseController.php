<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/12/24 0024
 * Time: 下午 2:50
 */

namespace app\controller;

use Pheasant;
use Latte\Engine;

class BaseController
{

    private $config;
    protected $latte;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();
        $this->latte = new Engine();
    }

    public function initDb()
    {
        Pheasant::setup($this->config['dsn']);
    }

    public function loadConfig()
    {
        $this->config = require APP_ROOT . '/config/base.php';
    }

    public function getLatte()
    {
        return $this->latte;
    }


    function  getAbsoluteUrl($name){
        return VIEW_URL.'/'.$name;
    }

}