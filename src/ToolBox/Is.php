<?php

namespace GeekLab\ToolBox;

class Is
{
    /**
     * Is something empty, 0 and '0' values count as not empty.
     * http://php.net/manual/en/function.empty.php#78269
     *
     * @param mixed $something
     * @param bool  $nullValid Should NULL be considered as not empty?
     * @return bool
     */
    public static function empty(mixed $something, bool $nullValid = false): bool
    {
        // Only '' and NULL (unless $nullValid) are empty, so 0 and '0' are never empty.
        return '' === $something || (null === $something && !$nullValid);
    }
}
