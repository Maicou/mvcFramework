<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        /**
         * 
         * Erster Part um Routing zu testen
         * zum ausprobieren, auskommentieren
         * 
         *         if (isset($_GET['url'])) {
          $url = $_GET['url'];
          $url = rtrim($url, '/');
          $url = explode('/', $url);
          // var_dump($url);

          if(function_exists($url['0'])){
          $url['0']($url['1']);
          }else{
          echo "no function with this name";
          }

          }


          function about($name){
          echo "about $name";
          }

          function services(){
          echo "services";
          }
         * */
        class kite {

            public $routes = array();

            
            
            
            function router() {

                if (isset($_GET['url'])) {
                    $url = $_GET['url']; 
                    $url = rtrim($url, '/');
                    $url = explode('/', $url);
                    foreach($url as $key=> $value){
                        $this->routes[$key] = $value;
                        //print_r($this);
                    }


                    
                   require_once "app/Controller.php";
                   if(isset($this->routes['0'])){
                       $method = $this->routes['0'];
                       $controller = new Controller();
                       if(method_exists('Controller', $method)){
                           
                           $controller->$method();
                       }else {
                           $controller->main();
                       }
                   }
                    
//echo "This is from display function: $url";
                }
            }

        }

        $kite = new kite();
        $kite->router();
        ?>
    </body>
</html>
