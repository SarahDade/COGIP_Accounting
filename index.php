<php 

require 'vendor/autoload.php';

$router = new Route($_GET['url']);

$router->get('/posts', function(){ echo 'tous les articles'; });
$router->get('/posts/:id', function($id){ echo 'Afficher l\'article'.$id; });

$router->post('/posts/:id', function($id){ echo 'Poster pour l\'article'.$id; });
?>