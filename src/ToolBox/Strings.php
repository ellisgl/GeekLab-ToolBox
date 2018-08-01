<?php

namespace GeekLab\ToolBox;

class Strings
{
    /**
     * Does a string start with $needle?
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public function beginsWith(string $haystack, string $needle): bool
    {
        return (!empty($needle) && 0 === strpos($haystack, $needle));
    }


    /**
     * Does a string end with $needle?
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public function endsWith(string $haystack, string $needle): bool
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }
}