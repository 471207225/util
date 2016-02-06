<?php


class App
{


    public static function start()
    {
        spl_autoload_register('App::autoload');

        self::dispatcher();

        self::run('Util\\'.UTIL,ACTION);
//        \Util\Post::postfile();

    }

    private static function run($classname,$action){

        $module = new $classname();

        $class  = new  \ReflectionClass($module);
        $method = new  \ReflectionMethod($module,$action);
        if($class->hasMethod($action)&&$method->isPublic()){
            $method->invoke($module);
        }

    }

    private static function dispatcher(){
        $paths = explode('/',$_GET['s']);
        $util = array_shift($paths);
        define('UTIL',ucfirst($util));

        $action = array_shift($paths);
        define('ACTION',$action);

        $var = array();
        preg_replace_callback('/(\w+)\/([^\/]+)/',function($match) use(&$var){$var[$match[1]]=strip_tags($match[2]); },implode('/',$paths));
        $_GET = $var;
        $_REQUEST = array_merge($_POST,$_GET);
    }

    static function autoload($class)
    {
        $name = str_replace('\\', '/', $class) . '.class.php';
        if (is_file($name)) {
            include $name;
        }
    }
}