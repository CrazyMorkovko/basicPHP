<?php
function power ($val, $pow) {
    if ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    return 1;
}

echo power(4, 6);
