<?php

namespace GeekLab\ToolBox;

class Is
{
    /**
     * Is something empty, 0 and '0' values count as not empty.
     * http://php.net/manual/en/function.empty.php#78269
     *
     * @param       $something
     * @param  bool $nullValid Should NULL be considered as not empty?
     * @return bool
     */
    public static function empty($something, bool $nullValid = false): bool
    {
        return (('' === $something || (NULL === $something && !$nullValid)) && 0 !== $something && '0' !== $something);
    }
}
