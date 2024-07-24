<?php
/**
 * App core router class
 * creates URLs & loads the controllers
 * URL FORMAT - /controller/method/params
 */

class Core 
{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];


    public function __construct()
    {
        echo "<br/>Core program launched! ";
        $url = $this->getURL();
        print_r($url);
        if(
            $url &&
            file_exists("../app/controllers/" . ucwords($url[0]) . ".php")
        ) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // create the controller
        require_once "../app/controllers/" . $this->currentController . ".php";
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = ($url) ? array_values($url) : [] ;

        // call a callback with array of params
        echo "<br/><pre>".print_r($this)."</pre><br/>";
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }

    }
}
