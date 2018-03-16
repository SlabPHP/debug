<?php
/**
 * Benchmark Tests
 *
 * @package Slab
 * @subpackage Tests
 * @author Eric
 */
namespace Slab\Tests\Debug;

class BenchmarkTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test benchmark
     */
    public function testBenchmark()
    {
        $benchmark = new \Slab\Debug\Benchmark('test');

        $objects = [];
        for ($i=0; $i<10000; ++$i)
        {
            $object = new \stdClass();
            $object->index = $i;
            $objects[] = $object;
        }

        $benchmark->end();

        $this->assertNotEmpty($benchmark->getElapsedTime());
        $this->assertNotEmpty($benchmark->getMemoryUsage());
        $this->assertNotEmpty($benchmark->getMemoryUsageReal());
    }

}