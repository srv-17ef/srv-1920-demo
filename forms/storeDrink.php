<?php

require "db-bolaget.php";

storeDrink($_POST);

header("Location: index.php?sortby=namn");