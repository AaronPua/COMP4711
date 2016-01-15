<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php            
        class Game {
            var $position;
            
            function __construct($squares) {
                $this->position = str_split($squares);
            }
            
            function display() {
                echo '<table cols="3" style = "font-size: large; font-weight:bold">';
                echo '<tr>';
                for ($pos = 0; $pos < 9; $pos++) {
                    echo $this->show_cell($pos);
                    if ($pos % 3 == 2) {
                        echo '</tr><tr>';
                    }
                }
                echo '</tr>';
                echo '</table>';
            }
            
            function show_cell($which) {
                $token = $this->position[$which];
                if($token <> '-') {
                    return '<td>'.$token.'</td>'; 
                }
                $this -> newposition = $this->position;
                $this -> newposition[$which] = 'o';
                $move = implode($this->newposition);
                $link = '/repo/index.php?board='.$move;
                return '<td><a href="'.$link.'">-</a></td>';
                
            }
            
            function winner($token) {
                $result = true;
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
                
                for ($row = 0; $row < 3; $row++) {
                    $result = true;
                    for ($col = 0; $col < 3; $col++) {
                        if ($this->position[3 * $row + $col] != $token) {
                            $result = false;
                        } else {
                        	return $result;
                        }
                    }
                }
                
                if (($this->position[0] == $token) && ($position[4] == $token) && ($position[8] == $token)) {
                     $result = true;
                }
                else if (($this->position[2] == $token) && ($position[4] == $token) && ($position[6] == $token)) {
                     $result = true;
                }            
                return $result;
            }                     
        } 
            $squares = $_GET['board'];
            $game = new Game($squares);
            
            $game->display();
            if($game->winner('x')) {
                echo 'You win, lucky guesses.';
            } else if ($game->winner('o')) {
                echo 'I win, muahahahahaha';
            } else {
                echo 'No winners yet, but you are losing';
            }
        ?>        
    </body>
</html>