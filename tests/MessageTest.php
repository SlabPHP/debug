<?php
/**
 * Message Tests
 *
 * @package Slab
 * @subpackage Tests
 * @author Eric
 */
namespace Slab\Tests\Debug;

class MessageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test individual message creation and format
     */
    public function testMessage()
    {
        $message = new \Slab\Debug\Message('Hello occurred, omg what do we do!', 'Sasquatch');

        $this->assertContains('[Sasquatch] Hello occurred, omg what do we do! (', $message->formatMessage());
    }
}