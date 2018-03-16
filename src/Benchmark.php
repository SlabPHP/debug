<?php
/**
 * Benchmark Debug Object
 *
 * @package Slab
 * @subpackage Debug
 * @author Eric
 */
namespace Slab\Debug;

class Benchmark implements \Slab\Components\Debug\BenchmarkInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $memoryStart;

    /**
     * @var int
     */
    private $memoryEnd;

    /**
     * @var int
     */
    private $memoryStartReal;

    /**
     * @var integer
     */
    private $memoryEndReal;

    /**
     * @var int
     */
    private $cpuStart;

    /**
     * @var int
     */
    private $cpuEnd;

    /**
     * @var float
     */
    private $timeStart;

    /**
     * @var float
     */
    private $timeEnd;

    /**
     * Benchmark constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;

        $this->timeStart = microtime(true);
        $this->cpuStart = 0;
        $this->memoryStart = memory_get_usage(false);
        $this->memoryStartReal = memory_get_usage(true);
    }

    /**
     * end benchmark
     */
    public function end()
    {
        $this->timeEnd = microtime(true);
        $this->cpuEnd = 0;
        $this->memoryEnd = memory_get_usage(false);
        $this->memoryEndReal = memory_get_usage(true);
    }

    /**
     * @return int
     */
    public function getMemoryUsage()
    {
        if (empty($this->timeEnd))
        {
            return 0;
        }

        return ($this->memoryEnd - $this->memoryStart);
    }

    /**
     * @return int
     */
    public function getMemoryUsageReal()
    {
        if (empty($this->timeEnd))
        {
            return 0;
        }

        return ($this->memoryEndReal - $this->memoryStartReal);
    }

    /**
     * @return float|int|mixed
     */
    public function getElapsedTime()
    {
        if (empty($this->timeEnd))
        {
            return 0;
        }

        return ($this->timeEnd - $this->timeStart);
    }
}