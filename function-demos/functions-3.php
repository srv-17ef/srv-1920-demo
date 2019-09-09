<?php
function sayHello($name)
{
    echo "Hello $name.";
}
function sayMoreHello($first, $last)
{
    echo "Hello $first $last.";
}
function sayMostHello($name, $title = 'The Boss')
{
    echo "Hello $name aka $title";
}

//korrekt
sayHello("Frank Herbert");
sayMoreHello("Frank", "Herbert");
sayMostHello("Frank");

//felaktiga anrop
sayHello();
sayMoreHello("Frank");
sayMostHello("Frank","Dr","Herbert");


