<?php

use Woodling\Blueprint;

class TestWoodlingBlueprint extends PHPUnit_Framework_TestCase
{

    /**
     * @var Woodling\Blueprint
     */
    public $blueprint;

    public function setUp()
    {
        $this->blueprint = new Blueprint();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Blueprint', $this->blueprint);
        $this->assertObjectHasAttribute('attributes', $this->blueprint);
        $this->assertObjectHasAttribute('sequences', $this->blueprint);
    }

    public function testMagicSetter()
    {
        $key = 'name';
        $value = 'Mindaugas Bujanauskas';
        $this->assertEmpty($this->blueprint->getAttributes());
        $this->blueprint->$key = $value;
        $this->assertArrayHasKey($key, $this->blueprint->getAttributes());
        $attributes = $this->blueprint->getAttributes();
        $this->assertEquals($value, $attributes[$key]);
    }

    public function testMagicGetter()
    {
        $key = 'name';
        $value = 'Mindaugas Bujanauskas';
        $this->blueprint->setAttribute($key, $value);
        $this->assertEquals($value, $this->blueprint->$key);
    }

    public function testSetAttributeAndGetAttribute()
    {
        $key = 'key';
        $value = 'value';
        $this->blueprint->setAttribute($key, $value);
        $this->assertEquals($value, $this->blueprint->getAttribute($key));
    }

    public function testSetAndGetAttributes()
    {
        $attributes = array('name' => 'Mindaugas Bujanauskas');
        $this->blueprint->setAttributes($attributes);
        $this->assertEquals($attributes, $this->blueprint->getAttributes());
    }

    public function testSequence()
    {
        $name = 'email';
        $closure = function() {};
        $this->assertEmpty($this->blueprint->getSequences());
        $this->blueprint->sequence($name, $closure);
        $this->assertSame($this->blueprint->getSequence($name), $closure);
    }

    public function testSetSequenceAndGetSequence()
    {
        $key = 'sequence';
        $closure = function() {};
        $this->blueprint->setSequence($key, $closure);
        $this->assertSame($closure, $this->blueprint->getSequence($key));
    }

    public function testSetSequencesAndGetSequences()
    {
        $sequences = array(1, 2, 3);
        $this->blueprint->setSequences($sequences);
        $this->assertEquals($sequences, $this->blueprint->getSequences());
    }

}
