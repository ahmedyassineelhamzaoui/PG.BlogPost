<?php
class Session{
    static public function set($type,$message){
        setcookie($type,$message,time()+5,"/");

        // setcooki comprend comme paramétre le type et le message ansi time de la mort de cette cookie et / pour dir la cokise fonction dans tous le projet
    }
}



?>