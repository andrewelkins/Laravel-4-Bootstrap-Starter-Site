<?php

use Woodling\Factory;
use Woodling\Blueprint;
use Woodling\Factory\Runner;

class TestWoodlingFactory extends PHPUnit_Framework_TestCase
{

    /**
     * @var Factory
     */
    public $factory;

    public function setUp()
    {
        $className = 'stdClass';
        $blueprint = new Blueprint();
        $this->factory = new Factory($className, $blueprint);
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Factory', $this->factory);
        $this->assertObjectHasAttribute('blueprint', $this->factory);
        $this->assertObjectHasAttribute('className', $this->factory);
        $this->assertInstanceOf('Woodling\Factory\Runner', $this->factory->getRunner());
    }

    public function testSetAndGetBlueprint()
    {
        $blueprint = new Blueprint();
        $this->factory->setBlueprint($blueprint);
        $this->assertSame($blueprint, $this->factory->getBlueprint());
    }

    public function testSetAndGetClass()
    {
        $class = 'User';
        $this->factory->setClassName($class);
        $this->assertEquals($class, $this->factory->getClassName());
    }

    public function testSetAndGetRunner()
    {
        $newRunner = new Runner('stdClass');
        $this->factory->setRunner($newRunner);
        $this->assertSame($newRunner, $this->factory->getRunner());
    }

    /**
     * Should make a call to Factory\Runner and return an instance
     */
    public function testMake()
    {
        $className = 'stdClass';
        $this->factory->setClassName($className);
        $attributeOverrides = array();
        $returnValue = new $className();
        $this->factory->setBlueprint(new Blueprint());
        $runnerMock = $this->getMock('Woodling\Factory\Runner', array('make'), array('stdClass'));
        $runnerMock->expects($this->once())
            ->method('make')
            ->with($this->equalTo($className), $this->isInstanceOf('Woodling\Blueprint'), $this->equalTo($attributeOverrides))
            ->will($this->returnValue($returnValue));
        $this->factory->setRunner($runnerMock);
        $instance = $this->factory->make();
        $this->assertSame($returnValue, $instance);
    }

    public function testRetrieve()
    {
        $makeArgs = 'Args';
        $makeReturns = 'Instance';
        $factoryMock = $this->getMock('Woodling\Factory', array('make'), array('stdClass', new Blueprint));
        $factoryMock->expects($this->once())
            ->method('make')
            ->with($makeArgs)
            ->will($this->returnValue($makeReturns));

        $this->assertEquals($makeReturns, $factoryMock->retrieve($makeArgs));
    }

}
