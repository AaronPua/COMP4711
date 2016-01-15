<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php            
        $position = $_GET['board'];
        $squares = str_split($position);
        
        function winner($token, $position) {
            $won = false;
            if(($position[0] == $token) &&
               ($position[1] == $token) &&
               ($position[2] == $token)) { 
                $won = true;
            } else if (($position[3] == $token) &&
                        ($position[4] == $token) &&
                        ($position[5] == $token)) {
                //...
            }
            return $won;
        }
         if(winner('x', $squares)) echo 'You Win.';
         else if (winner('o', $squares)) echo 'I win.';
         else echo 'No Winner Yet.';
        ?>        
    </body>
</html>