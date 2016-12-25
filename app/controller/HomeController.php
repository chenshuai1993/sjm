<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/12/24 0024
 * Time: 下午 2:51
 */

namespace app\controller;


use app\model\ToDo;

class HomeController extends BaseController
{
    protected $latte;

    function __construct()
    {
        parent::__construct();
        $this->latte = $this->getLatte();
    }

    public function show()
    {
        echo 'home,show';
    }

    public function migrate(){
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(ToDo::schema());
    }

    public function create(){
        $todo = new ToDo();
        $todo->title = '设计自己的mvc框架';
        $todo->status = true;
        $todo->save();
    }


    public function showAll(){
        $todos = ToDo::all();
        $this->latte->setTempDirectory(VIEW_URL.'/home');
        $parameters['items'] = $todos;
        $temp = $this->getAbsoluteUrl('home/index.latte');
        $this->latte->render($temp, $parameters);
    }

    /**
     * @param $title
     * @author chenss
     * @email  css852438363@163.com
     * @desc
     */
    function add()
    {   $title = $_POST['title'];
        $todo = new ToDo();
        $todo->title = $title;
        $todo->status = true;
        $todo->save();
    }

    function submit(){
        $id = $_POST['id'];
        $todo = ToDo::byId($id);
        $todo->status = false;
        $todo->save();
    }

    function delete(){
        $id = $_POST['id'];
        $todo = ToDo::byId($id);
        $todo->delete();
        //$temp = $this->getAbsoluteUrl('home/index.latte');
        //$this->latte->render($temp, $parameters);
        $this->latte->redirectUrl('/aaa');
    }

}