<?php

declare(strict_types=1);

require_once "inc/helpers.php";

if (is_logged_in()) {
    header("Location: dashboard.php");
    exit();
}

header("Location: landing.php");
exit();
