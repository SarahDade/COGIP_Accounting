class Route{

    /**
    * @var string
    */
    public static $url;

    /**
    * @var string
    */
    public static $controller;

    /**
    * @var string
    */
    public static $function;

    /**
    * @var string
    */
    public static $middleware;

    public function __construct($url, $controller, $function, $middleware = "guest") {
        $this->url = $url;
        $this->controller = $controller;
        $this->function = $function;
        $this->middleware = $middleware;
    }
}