<?php

namespace GeekLab\ToolBox;

class Arrays
{
    /**
     * Recursive array_walk, since array_walk_recursive only deal with the outer leafs / nodes.
     *
     * @param array    $array
     * @param callable $callback
     */
    public function explore(array &$array, callable $callback): void
    {
        array_walk($array, function (&$value, $key) use (&$array, $callback)
        {
            if (is_array($value))
            {
                $this->explore($value, $callback);
            }

            $callback($array, $key, $value);
        });
    }

    /**
     * Rename / Change / Modify a key and preserve the key ordering.
     */

    /**
     * @param  array      $array
     * @param  string|int $oldKey
     * @param  string|int $newKey
     * @param  bool       $recursive
     * @return array
     */
    public function renameKey(array $array, $oldKey, $newKey, bool $recursive = FALSE): array
    {
        $newArray = [];

        foreach ($array as $k => $v)
        {
            if (is_array($v) && TRUE == $recursive)
            {
                $v = $this->renameKey($v, $oldKey, $newKey, TRUE);
            }

            if ($k === $oldKey)
            {
                $newArray[$newKey] = $v;
            }
            else
            {
                $newArray[$k] = $v;
            }
        }

        return $newArray;
    }


    /**
     * Return the first key in an array.
     *
     * @param array $array
     * @return int|null|string
     */
    public function firstKey(array $array)
    {
        reset($array);
        return key($array);
    }

    /**
     * Return the last key in an array.
     *
     * @param array $array
     * @return int|null|string
     */
    public function lastKey(array $array)
    {
        end($array);
        return key($array);
    }

    /**
     * Return the first value in an array
     * @param array $array
     * @return mixed
     */
    public function firstValue(array $array)
    {
        return array_shift($array);
    }

    /**
     * Return the last value in an array
     * @param array $array
     * @return mixed
     */
    public function lastValue(array $array)
    {
        return array_pop($array);
    }
}