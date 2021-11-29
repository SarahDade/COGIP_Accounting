class Router{

    /**
     * @var string
     */
    public static $method;

    public function get($method, $url, $controller, $function, $middleware = "guest") {

        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                listPosts();
            }
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();
                    }
                else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
        }
        else {
            listPosts();
        }
    }
    <!-- dont forget to add get to array -->
}


<!-- 
$route = new Router();
$route->get('/', 'controller', 'function', 'admin')
 -->