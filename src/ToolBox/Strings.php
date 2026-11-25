<?php

namespace GeekLab\ToolBox;

class Strings
{
    /**
     * Does a string start with $needle?
     * An empty $needle never matches.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function beginsWith(string $haystack, string $needle): bool
    {
        // Compare with '' rather than empty(), since empty('0') is true and '0' is a valid needle.
        return $needle !== '' && str_starts_with($haystack, $needle);
    }


    /**
     * Does a string end with $needle?
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function endsWith(string $haystack, string $needle): bool
    {
        return str_ends_with($haystack, $needle);
    }
}
