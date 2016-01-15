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
        
        if(winner('x', $squares)) {
            echo 'You win.';
        } else if (winner('o', $squares)) {
            echo 'I win.';
        } else {
            echo 'No winner yet.';
        }
       
        function winner($token, $position) {
            for ($row = 0; $row < 3; $row++) {
                $result = true;
                for ($col = 0; $col < 3; $col++) {
                    if ($position[3 * $row + $col] != $token) {
                        $result = false;
                    } else {
			return $result;
                    }
                }
            }
            for ($column = 0; $column < 3; $column++) {
                $result = true;
                for ($row = 0; $row < 3; $row++) {
                    if ($position[$column + 3 * $row] != $token) {
			$result = false;
                    } else {
			return $result;
                        }
                }
            }
            if (($position[0] == $token) && ($position[4] == $token) && ($position[8] == $token)) {
                 $result = true;
            }
            else if (($position[2] == $token) && ($position[4] == $token) && ($position[6] == $token)) {
                 $result = true;
            }
             
             return $restult;
          }
        ?>        
    </body>
</html>