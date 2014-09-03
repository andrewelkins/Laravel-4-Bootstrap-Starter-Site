<?php

use Woodling\Sequencer;

class TestWoodlingSequencer extends PHPUnit_Framework_TestCase
{

    /**
     * @var Woodling\Sequencer
     */
    public $sequencer;

    public function setUp()
    {
        $this->sequencer = new Sequencer();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Sequencer', $this->sequencer);
    }

    public function testClass()
    {
        $this->assertClassHasStaticAttribute('counters', 'Woodling\Sequencer');
    }

    public function testInstantiationWithNamespace()
    {
        $namespace = 'namespace';
        $sequencer = new Sequencer($namespace);
        $this->assertEquals($namespace, $sequencer->getNamespace());
    }

    public function provider()
    {
        return array(
            array('counter.name', 1),
            array('counter.name', 2),
            array('another.counter', 1),
            array('counter.name', 3)
        );
    }

    /**
     * Should receive a counter name and return an incremented value
     * @dataProvider provider
     */
    public function testNext($counterName, $result)
    {
        $this->assertEquals($result, $this->sequencer->next($counterName));
    }

    public function testNextWithNamespace()
    {
        $namespace = 'Namespace';
        $key = 'counter';
        $expectedNamespace = $namespace . '.' . $key;
        $sequencer = new Sequencer($namespace);
        $counter = $sequencer->next($key);
        $counters = Sequencer::getCounters();
        $this->assertEquals($counter, $counters[$expectedNamespace]);
    }

    public function testStaticReset()
    {
        Sequencer::setCounters(array(1, 2, 3));
        Sequencer::reset();
        $this->assertEmpty(Sequencer::getCounters());
    }

    public function testSetAndGetCounters()
    {
        $counters = array('key' => 'value');
        Sequencer::setCounters($counters);
        $this->assertEquals($counters, Sequencer::getCounters());
    }

    public function testSetAndGetNamespace()
    {
        $namespace = 'Namespace';
        $this->sequencer->setNamespace($namespace);
        $this->assertEquals($namespace, $this->sequencer->getNamespace());
    }

}
