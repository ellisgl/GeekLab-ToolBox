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
     * Rename a key and preserve the key ordering.
     * Stolen from: https://stackoverflow.com/questions/13233405/change-key-in-associative-array-in-php
     *
     * @param  array      &$array        The array.
     * @param  int|string $oldKey        The key you want to replace.
     * @param  int|string $newKey        The key you want to replace it with.
     * @param  bool       $ignoreMissing Insert newKey if oldKey was not found?  Raise error if false.
     * @param  bool       $replace       If newKey matches a key in the array, remove that key? Raise error if false.
     * @return bool
     */
    public function renameKey(array &$array, $oldKey, $newKey,
                              bool $ignoreMissing = FALSE, bool $replace = FALSE): bool
    {
        if (!empty($array))
        {
            if (!array_key_exists($oldKey, $array))
            {
                if ($ignoreMissing)
                {
                    return FALSE;
                }

                return !trigger_error('Old key does not exist', E_USER_WARNING);
            }
            else
            {
                if (array_key_exists($newKey, $array))
                {
                    if ($replace)
                    {
                        unset($array[$newKey]);
                    }
                    else
                    {
                        return !trigger_error('New key already exists', E_USER_WARNING);
                    }
                }

                $keys = array_keys($array);

                // Fix: http://php.net/manual/en/function.array-search.php#122377
                $keys[array_search($oldKey, array_map('strval', $keys))] = $newKey;

                $array = array_combine($keys, $array);

                return TRUE;
            }
        }

        return FALSE;
    }
}