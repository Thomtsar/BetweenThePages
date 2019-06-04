<?php
function checkquery($thisquery)
{
    if(!$thisquery)
    {
        die("Query Failed" . mysqli_error($connection));
    }
}

?>