# \GeekLab\ToolBox\Strings

## Basic usage:
`$Strings = new \GeekLa\ToolBox\Strings();`

## beginsWith(string $haystack, string $needle): bool
Description: Does a string begin with $needle?
 
Usage:
    
    if($Strings->beginWith('This is my haystack', 'This')))
    {
        //...
    }
  
## endsWith(string $haystack, string $needle): bool
Description: Does a string end with $needle?
 
Usage:
    
    if($Strings->endsWith('This is my haystack', 'stack')))
    {
        //...
    }
