<?php
/**
 * Debug Manager Library
 *
 * @package Slab
 * @subpackage Debug
 * @author Eric
 */
namespace Slab\Debug;

class Manager implements \Slab\Components\Debug\ManagerInterface
{
    /**
     * @var Benchmark[]
     */
    private $benchmarks = [];

    /**
     * @var array
     */
    private $messages = [];

    /**
     * Debug constructor.
     */
    public function __construct()
    {
        $this->messages['GENERAL'] = [];
    }

    /**
     * @param $name
     * @return $this
     */
    public function startBenchMark($name)
    {
        $this->benchmarks[$name] = new Benchmark($name);

        return $this;
    }

    /**
     * @param $name
     * @return $this|mixed
     */
    public function endBenchmark($name)
    {
        $this->benchmarks[$name]->end();

        return $this;
    }

    /**
     * @return Benchmark[]
     */
    public function getBenchmarks()
    {
        return $this->benchmarks;
    }

    /**
     * @param $message
     * @param string $context
     * @return $this
     */
    public function addMessage($message, $context = null)
    {
        if (empty($context))
        {
            $context = 'GENERAL';
        }
        else
        {
            $context = strtoupper($context);
        }

        if (empty($this->messages[$context]))
        {
            $this->messages[$context] = [];
        }

        $this->messages[$context][] = new Message($message, $context);

        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }
}