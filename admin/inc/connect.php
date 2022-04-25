<?php
function connect()
{
    $GLOBALS["con"] = mysqli_connect("localhost", "root", "", "mega");
}
