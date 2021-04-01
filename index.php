<?php

include './init.php';

ob_start();

include './views/index.php';

$mainContents = ob_get_clean();

include './views/layout.php';

