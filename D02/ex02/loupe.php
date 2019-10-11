#!/usr/bin/php
<?PHP
if ($argc <2)
    exit;
$str = trim(file_get_contents($argv[1]));
preg_match_all("/<a/", $str, $startmatch, PREG_OFFSET_CAPTURE);
preg_match_all("/a>/", $str, $endmatch, PREG_OFFSET_CAPTURE);
$i = 0;
foreach ($startmatch as $occur)
{
    foreach ($occur as $number)
    {
        $sub = substr($str, $number[1], ($endmatch[0][$i][1] - $number[1] + 2));
        $len = strlen($sub);
        $y = 0;
        while ($y < $len)
        {
            if ($sub[$y] == ">")
            {
                ++$y;
                while ($sub[$y] != "<" && $y < $len)
                {
                    $str[$y + $number[1]] = strtoupper($str[$y + $number[1]]);
                    ++$y;
                }
            }
            ++$y;
        }
        if (preg_match("/title=/", $sub, $title, PREG_OFFSET_CAPTURE))
               $y = $title[0][1] + 6;
        while ($y < $len && $sub[$y] != ">")
            {
               $str[$y + $number[1]] = strtoupper($str[$y + $number[1]]);
                ++$y;

            }
        ++$i;
    }
}
print ($str);
?>