<?php
function word_censor(string $str, array $censored, string $replacement = ''): string
{
    if (empty($censored)) {
        return $str;
    }

    $str = ' ' . $str . ' ';

    // \w, \b and a few others do not match on a unicode character
    // set for performance reasons. As a result words like über
    // will not match on a word boundary. Instead, we'll assume that
    // a bad word will be bookended by any of these characters.
    $delim = '[-_\'\"`(){}<>\[\]|!?@#%&,.:;^~*+=\/ 0-9\n\r\t]';

    foreach ($censored as $badword) {
        $badword = str_replace('\*', '\w*?', preg_quote($badword, '/'));

        if ($replacement !== '') {
            $str = preg_replace(
                "/({$delim})(" . $badword . ")({$delim})/i",
                "\\1{$replacement}\\3",
                $str
            );
        } elseif (preg_match_all("/{$delim}(" . $badword . "){$delim}/i", $str, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE)) {
            $matches = $matches[1];

            for ($i = count($matches) - 1; $i >= 0; $i --) {
                $length = strlen($matches[$i][0]);
                $str    = substr_replace(
                    $str,
                    str_repeat('.', $length),
                    $matches[$i][1],
                    $length
                );
            }
        }
    }

    return trim($str);
}
