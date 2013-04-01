<?php namespace Andrew13\Helpers;

class String {

    /**
     * Capatilize first letter of each word of a string.
     *
     * @param string  $value
     * @return string
     */
    public static function title($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE);
    }

    /**
     * @param $value
     * @internal param $html
     * @return string
     */
    public static function tidy($value)
    {
        // Check to see if Tidy is available.
        if(class_exists('Tidy')) {
            $tidy = new Tidy();
            return $tidy->repairString($value, array(
                'output-xml' => true,
                'input-xml' => true
            ));
        } else { // No Tidy, Time for regex and possibly a broken DOM :(
            preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $value, $result);
            $openedtags = $result[1];
            preg_match_all('#</([a-z]+)>#iU', $value, $result);
            $closedtags = $result[1];
            $len_opened = count($openedtags);
            if (count($closedtags) == $len_opened) {
                return $value;
            }
            $openedtags = array_reverse($openedtags);
            for ($i=0; $i < $len_opened; $i++) {
                if (!in_array($openedtags[$i], $closedtags)) {
                    $value .= '</'.$openedtags[$i].'>';
                } else {
                    unset($closedtags[array_search($openedtags[$i], $closedtags)]);
                }
            }
            return $value;
        }
    }

}