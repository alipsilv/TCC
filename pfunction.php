<?php

    function CalculateLength($source)
    {
        return strlen($source);
    }

    if(isset($_GET['calculate-length']) && isset($_GET['value'])){
        die(CalculateLength($_GET['value']));
    }

?>