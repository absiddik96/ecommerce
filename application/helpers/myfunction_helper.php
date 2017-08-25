<?php

function my_date($date)
{
    $newDate = date("d-m-Y", strtotime($date));
    return $newDate;
}

?>
