# \GeekLab\ToolBox\Is
## Basic usage:
## empty($something, bool $nullValid): bool
###Description:
Will check if $something is empty, will return FALSE on 0 and "0". Also will return TRUE is $something is NULL, unless $nullValid is set to TRUE.

### Usage:

    if(\GeekLab\ToolBox\Is::empty(''))
    {
        //...
    }
