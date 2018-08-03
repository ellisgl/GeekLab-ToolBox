# \GeekLab\ToolBox\Arrays
## Basic usage:
`$Arrays = new \GeekLab\ToolBox\Arrays();`

## explore(array &$array, callable $callback): void
### Description:
Recursive version of array_walk and is different from array_walk_recursive, since array_walk_recursive will only visit leaf nodes. \GeekLab\ToolBox\Arrays::explore will hit visit all nodes.

### Usage:
See [tests/unit/Arrays_exploreTest.php](tests/unit/Arrays_exploreTest.php) for using GeekLab\ToolBox\Arrays::renameKey() recursively.
  
## renameKey(array &$array, $oldKey, $newKey, bool $ignoreMissing = FALSE, bool $replace = FALSE): bool
### Description:
Will rename a key in an array, which is passed in by reference.
 
### Usage:
 
    $array = [
        'xyz' => 1,
        'def' => 2
    ];
     
    $Arrays->renameKey($array, 'def', 'DefLeppard');

## firstKey(array $array)
### Description:
Returns the first key of an array.

### Usage:
  
    $array = [
            'xyz' => 1,
            'def' => 2
        ];
 
    $fk = $Arrays->firstKey($array);

## lastKey(array $array)
### Description:
Returns the last key of an array.

### Usage:

    $array = [
                'xyz' => 1,
                'def' => 2
            ];
     
    $lk = $Arrays->lastKey($array);

## firstValue(array $array)
### Description:
Returns the first value of an array.

### Usage:
  
    $array = [
            'xyz' => 1,
            'def' => 2
        ];
 
    $fv = $Arrays->firstValue($array);

## lastValue(array $array)
### Description: Returns the last value of an array.

### Usage:
  
    $array = [
            'xyz' => 1,
            'def' => 2
        ];
 
    $fv = $Arrays->lastValue($array);
