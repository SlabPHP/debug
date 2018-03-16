<?php
/**
 * Debug Message Object
 *
 * @package Slab
 * @subpackage Debug
 * @author Eric
 */
namespace Slab\Debug;

class Message implements \Slab\Components\Debug\MessageInterface
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $context;

    /**
     * @var float
     */
    private $timestamp;

    /**
     * Message constructor.
     * @param $message
     * @param $context
     */
    public function __construct($message, $context)
    {
        $this->message = $message;
        $this->context = $context;
        $this->timestamp = microtime(true);
    }

    /**
     * @param $timestampRelative
     * @return string
     */
    public function formatMessage($timestampRelative = null)
    {
        if (empty($timestampRelative))
        {
            $timestampRelative = microtime(true);
        }

        return '[' . $this->context . '] ' . $this->message . ' (' . number_format(($timestampRelative - $this->timestamp) * 1000, 4) . 'ms)';
    }
}