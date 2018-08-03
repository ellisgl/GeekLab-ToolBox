# \GeekLab\ToolBox\BatchLoop
## Basic usage:
`$batch = new \GeekLab\ToolBox\BatchLoop();`

## run(int $iterations, callable $callback): void

### Description:

THIS IS A MICRO-OPTIMIZATION AND ONLY USE IF DOING >=1,000,000 ITERATIONS AND REALLY NEED TO SHAVE OFF A SECOND.
 
Batches 1000 calls at a time (or 1 at a time if not divisible by 1000).

See: https://makezine.com/2008/05/20/duffs-device-loop-unrolling-fo/

### Usage:

    $a = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    $b = [];

    $BatchLoop->run(count($a), function($i) use ($a, &$b)
    {
        $b[] = $a[$i];
    });