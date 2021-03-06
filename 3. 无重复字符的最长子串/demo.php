<?php
/**
 * @param string
 *
 * @return int
 */
function lengthOfLongestSubstringA(string $s)
{
    $tmp_str = '';
    $max_len = 0;
    // $max_str = '';

    for ($i = 0; $i < strlen($s); $i++) {
        $tmp_len = strpos($s, $s{$i}, $i + 1) === false ? strlen($s) : strpos($s, $s{$i}, $i + 1);
        $tmp_str = substr($s, $i, $tmp_len - $i);
        
        for ($j = 1; $j < strlen($tmp_str); $j++) {
            if (strpos($tmp_str, $tmp_str{$j}, $j + 1) !== false) {
                $tmp_str = substr($tmp_str, 0, strpos($tmp_str, $tmp_str{$j}, $j + 1));
            }
        }

        // $max_str = strlen($tmp_str) > $max_len
        //     ? $tmp_str
        //     : $max_str;

        $max_len = strlen($tmp_str) > $max_len
            ? strlen($tmp_str)
            : $max_len;
    }

    // echo $max_str . PHP_EOL;
    return $max_len;
}

/**
 * @param string
 *
 * @return int
 */
function lengthOfLongestSubstring(string $s)
{
    $tmp_len = $max_len = $start = 0;
    $map = [];

    for ($i=0; $i<strlen($s); $i++) {
        if (isset($map[$s{$i}]) && $start <= $map[$s{$i}]) {
            $start = $map[$s{$i}];
            $tmp_len = $i - $map[$s{$i}];
        } else {
            $tmp_len++;
        }

        $map[$s{$i}] = $i;

        if ($max_len < $tmp_len) {
            $max_len = $tmp_len;
        }
    }

    return $max_len;
}

echo lengthOfLongestSubstring('abba') . PHP_EOL;
echo lengthOfLongestSubstring('aab') . PHP_EOL;
echo lengthOfLongestSubstring('abcbcabcbb') . PHP_EOL;
echo lengthOfLongestSubstring('bbbbb') . PHP_EOL;
echo lengthOfLongestSubstring('pwwkew') . PHP_EOL;
