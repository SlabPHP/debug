<?php
/**
 * Manager Tests
 *
 * @package Slab
 * @subpackage Tests
 * @author Eric
 */
namespace Slab\Tests\Debug;

class ManagerTest extends \PHPUnit\Framework\TestCase
{
    public function testManager()
    {
        $debug = new \Slab\Debug\Manager();

        $debug->startBenchmark('test');
        $debug->endBenchmark('test');

        $debug->addMessage('Testing message!', 'mapping');
        $debug->addMessage('Hello message!');

        $benchmarks = $debug->getBenchmarks();
        $messages = $debug->getMessages();

        $this->assertNotEmpty($benchmarks);
        $this->assertCount(1, $benchmarks);

        $this->assertNotEmpty($messages);
        $this->assertCount(2, $messages);

        $this->assertNotEmpty($messages['GENERAL']);
        $this->assertCount(1, $messages['GENERAL']);

        $this->assertNotEmpty($messages['MAPPING']);
        $this->assertCount(1, $messages['MAPPING']);
    }
}