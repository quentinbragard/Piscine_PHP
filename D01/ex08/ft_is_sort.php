<?php
function ft_is_sort($tab)
{
    $compare = $tab;
    sort($compare);
    if ($tab === $compare)
        return (1);
    else
        return (0);
}
?>