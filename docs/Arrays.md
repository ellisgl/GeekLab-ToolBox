 # \GeekLab\ToolBox\Arrays
 ## explore(array &$array, callable $callback): void
 Description: Recursive version of array_walk and is different from array_walk_recursive, since array_walk_recursive will only visit leaf nodes. \GeekLab\ToolBox\Arrays::explore will hit visit all nodes.
 
 Usage: See tests/unit/Arrays_exploreTest.php for using GeekLab\ToolBox\Arrays::renameKey() recursively.
  
 ## renameKey(array &$array, $oldKey, $newKey, bool $insert = FALSE, bool $replace = FALSE): bool
 Description: Will rename a key in an array, which is passed in by reference.
 
 Usage:
 
     $arr = [
     'xyz' => 1,
     'def' => 2
     ];
     
     renameKey($arr, 'def', 'DefLeppard');
