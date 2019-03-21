<?php

//used to redirect user to a different page instead of using header function each time
function redirect($filename)
{
    header("Location:" . $filename . ".php");
}