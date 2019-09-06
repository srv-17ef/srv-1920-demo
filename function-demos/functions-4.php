<?php

//indata $isLoud
function sayHello(bool $isLoud) {
    if($isLoud){
        echo "HELLO!";
    } else {
        echo "Hello!";
    }
}

//mata in true till isLoud
sayHello(true);

//mata in fel datatyp
sayHello(42);

