# SlabPHP Debug

The debug library adds a simple interface to collect information for inclusion in the SlabPHP debug toolbar.

## Usage

Include this project

    composer require slabphp/debug
    
## Benchmarks

You can start and end a benchmark with:

    $debug = new \Slab\Debug\Manager();
    
    $debug->startBenchmark('starting up');
    
    // do some stuff
    
    $debug->endBenchmark('starting up');
    
The results of that benchmark will be returned when you do ->getBenchmarks();

## Messages

You can add debug messages with:

    $debug->addMessage("Something happened!", "CONTROLLER");
    
When you do ->getMessages() an entry will be in the "CONTROLLER" context with a timestamp.  