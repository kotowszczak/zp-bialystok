<?php

include './init.php';

ob_start();

include './views/under-construction.php';

$mainContents = ob_get_clean();

include './views/layout.php';

