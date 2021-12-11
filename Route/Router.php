<?php 

require (__DIR__ . "./Route.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();

class Router {

    private $routes = [];
    private $url;

//      ┌───────────────────────────┐
//      │  CONSTRUCT - CURRENT URL  │
//      └───────────────────────────┘
    public function __construct($url) {
        $array = explode("/", $url);    

        for ($i = 0; $i < 2; $i++) {

            array_shift($array);  
        }
        switch (count($array)) {
            case 1:
                if( $array[0] == ''){
                    array_splice( $array, 0, 0, '/' );
                }
                break;
            case 2:
                array_splice( $array, 1, 0, '/' );
                break;
            case 3:
                array_splice( $array, 1, 0, '/' );
                array_splice( $array, 3, 0, '/' );
                break;
            case 4:
                array_splice( $array, 1, 0, '/' );
                array_splice( $array, 3, 0, '/' );
                array_splice( $array, 5, 0, '/' );
                break;
        }
        $array = implode("",$array);
        $this->url = $array;

        // ajout de route pour le dossier public (accessible à tous!!!) => onload
        // http://localhost/COGIP_Accounting/public/assets/css/style.css


    }

//      ┌───────┐
//      │  ADD  │
//      └───────┘
    public function add($path, $callable) {
        $id = false;
        $array = explode("/", $path); 
        $routesGroup = $array[0];

        if (stripos($path, '/$id') !== false) {

            $path = substr($path, 0, strpos($path, '/$id'));
            $id = '/$id';
        }
        if ($routesGroup == '') {

            if ($id != false ) {$route = new Route($path, $callable, $id);}
            else {$route = new Route($path, $callable);}
            $this->routes['homepage'][] = $route;
        }
        else {

            if ($id != false ) {$route = new Route($path, $callable, $id);}
            else {$route = new Route($path, $callable);}
            $this->routes[$routesGroup][] = $route;
        }
    }

//      ┌─────────┐
//      │  PRINT  │
//      └─────────┘
    public function print() {
        echo '<pre>';
        echo print_r($this->routes);
        echo '</pre>';
    }

//      ┌──────────┐
//      │  LOADER  │
//      └──────────┘
    public function loader() {
        $redirected = false;

        foreach ($this->routes as $route) {
            foreach ($route as $element) {

                if ($element->id != false) {
                    if (preg_match('~[0-9]+~', $this->url, $matches)) {

                        $id = $matches[0];

                        $url_treatment = explode("/", $this->url); 
                        array_pop($url_treatment);
                        $url_post_treatment = implode("/",$url_treatment);


                        if ($element->path == $url_post_treatment){

                            switch ($element->callable[1]) {
                                case 'create':
                                    
                                    $element->middleware('moderator');
                                    break;
        
                                case 'edit':
                                    
                                    $element->middleware('admin');
                                    break;
                                    
                                case 'delete':
                                    
                                    $element->middleware('admin');
                                    break;
                            }

                            if ($element->access != false) {
                                $element->call($element->callable, $id);
                                $redirected = true;
                            }else{
                                if (!$redirected) require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/error/404.php");  
                            }
                        }
                    }
                }
                else {

                    if ($element->path == $this->url) {

                        switch ($element->callable[1]) {
                            case 'create':
                                
                                $element->middleware('moderator');
                                break;
    
                            case 'edit':
                                
                                $element->middleware('admin');
                                break;
                                
                            case 'delete':
                                
                                $element->middleware('admin');
                                break;
                        }

                        if ($element->access != false) {
                            $element->call($element->callable);
                            $redirected = true;
                        }else{
                            if (!$redirected) require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/error/404.php");  
                        }
                    }
                }
            }
        }
//          ┌──────────────────┐
//          │  404 Not Found.  │
//          └──────────────────┘
        if (!$redirected) require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/error/404.php");  
    }
    
}