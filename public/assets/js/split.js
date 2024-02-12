function str_split($str, $split = 50) {
    if(intval($split) == 0) return $str;

    if(strlen($str) > $split) {
        return substr(trim($str), 0, $split)."...";
    }
    else
        return $str;
}