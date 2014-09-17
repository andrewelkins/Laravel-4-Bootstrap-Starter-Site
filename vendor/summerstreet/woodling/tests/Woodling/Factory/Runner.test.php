<?php

use Woodling\Factory\Runner;
use Woodling\Sequencer;
use Woodling\Blueprint;

class TestWoodlingFactoryRunner extends PHPUnit_Framework_TestCase
{

    /**
     * @var Woodling\Factory\Runner
     */
    public $runner;

    public function setUp()
    {
        $this->runner = new Runner('stdClass');
        Sequencer::reset();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Factory\Runner', $this->runner);
        $this->assertInstanceOf('Woodling\Sequencer', $this->runner->getSequencer());
        $this->assertEquals('stdClass', $this->runner->getClassName());
        $this->assertEquals('stdClass', $this->runner->getSequencer()->getNamespace());
    }

    public function testSetAndGetSequencer()
    {
        $sequencer = new Sequencer();
        $this->runner->setSequencer($sequencer);
        $this->assertSame($sequencer, $this->runner->getSequencer());
    }

    public function testSetAndGetClassName()
    {
        $className = 'ClassName';
        $this->runner->setClassName($className);
        $this->assertEquals($className, $this->runner->getClassName());
    }

    public function testMake()
    {
        $className = 'stdClass';
        $blueprint = new Blueprint();
        $attributesOverrides = array();

        // Well, it should return an instance of a specified class.
        $instance = $this->runner->make($className, $blueprint, $attributesOverrides);
        $this->assertInstanceOf('stdClass', $instance);
    }

    public function testMakeWithAttributes()
    {
        $className = 'stdClass';
        $attributes = array('name' => 'Mindaugas Bujanauskas', 'hobbies' => 'Skateboarding');
        $blueprint = new Blueprint();
        $blueprint->setAttributes($attributes);
        $instance = $this->runner->make($className, $blueprint, array());
        $this->assertEquals($attributes['name'], $instance->name);
        $this->assertEquals($attributes['hobbies'], $instance->hobbies);
    }

    public function testMakeWithLazyAttributes()
    {
        $className = 'stdClass';
        $name = 'Mindaugas Bujanauskas';
        $attributes = array(
            'time' => function() { return microtime(); },
            'name' => function() use($name) { return $name; }
        );
        $now = microtime();
        $blueprint = new Blueprint();
        $blueprint->setAttributes($attributes);
        $instance = $this->runner->make($className, $blueprint, array());
        $this->assertEquals($name, $instance->name);
        $this->assertGreaterThanOrEqual((float) $now, (float) $instance->time);
    }

    public function testMakeWithSequences()
    {
        $className = 'stdClass';
        $sequences = array(
            'email' => function($i) { return "username{$i}@hostname.com"; },
            'index' => function($i) { return $i; }
        );
        $blueprint = new Blueprint();
        $blueprint->setSequences($sequences);
        $instance = $this->runner->make($className, $blueprint, array());
        $this->assertEquals('username1@hostname.com', $instance->email);
        $this->assertEquals(1, $instance->index);
    }

    public function testMakeWithAttributeOverrides()
    {
        $className = 'stdClass';
        $attributes = array(
            'name' => 'Mindaugas Bujanauskas',
            'hobbies' => 'Cooking'
        );
        $attributeOverrides = array(
            'occupation' => 'Developer',
            'hobbies' => 'Skateboarding'
        );
        $blueprint = new Blueprint();
        $blueprint->setAttributes($attributes);

        $instance = $this->runner->make($className, $blueprint, $attributeOverrides);
        $this->assertEquals($attributes['name'], $instance->name);
        $this->assertEquals($attributeOverrides['occupation'], $instance->occupation);
        $this->assertEquals($attributeOverrides['hobbies'], $instance->hobbies);
    }

    public function testMakeWithSequenceOverrides()
    {
        $className = 'stdClass';
        $sequences = array(
            'email' => function($i) { return "username{$i}@hostname.com"; },
            'index' => function($i) { return $i; }
        );
        $sequenceOverrides = array(':sequences' => array(
            'email' => function($i) { return "name{$i}@hostname.com"; }
        ));
        $blueprint = new Blueprint();
        $blueprint->setSequences($sequences);
        $instance = $this->runner->make($className, $blueprint, $sequenceOverrides);
        $this->assertEquals('name1@hostname.com', $instance->email);
        $this->assertEquals(1, $instance->index);
    }

    public function testMakeWithSequenceOverrideWithAttribute()
    {
        $className = 'stdClass';
        $sequences = array(
            'email' => function($i) { return "username{$i}@hostname.com"; },
        );
        $attributeOverrides = array(
            'email' => 'name@hostname.com'
        );
        $blueprint = new Blueprint();
        $blueprint->setSequences($sequences);
        $instance = $this->runner->make($className, $blueprint, $attributeOverrides);
        $this->assertEquals('name@hostname.com', $instance->email);
    }

    public function testMakeWithVariousAttributes()
    {
        $className = 'stdClass';
        $attributes = array(
            'attribute' => 'Mindaugas',
            'attributeOverride' => 'Bujanauskas',
            'attributeLazy' => function() { return 'Short'; },
            'attributeLazyOverride' => function() { return 'Time is very precious'; }
        );
        $sequences = array(
            'sequence' => function($i) { return $i; },
            'sequenceOverride' => function() { return 'Override me'; }
        );
        $attributeOverrides = array(
            'attributeOverride' => 'MindaugasBujanauskas',
            'attributeLazyOverride' => function() { return 'Diff'; },
            ':sequences' => array(
                'sequenceOverride' => function($i) { return "Instance #{$i}"; }
            )
        );
        $blueprint = new Blueprint();
        $blueprint->setAttributes($attributes);
        $blueprint->setSequences($sequences);

        $instance = $this->runner->make($className, $blueprint, $attributeOverrides);

        $this->assertInstanceOf($className, $instance);
        $this->assertEquals($attributes['attribute'], $instance->attribute);
        $this->assertEquals('Short', $instance->attributeLazy);
        $this->assertEquals(1, $instance->sequence);
        $this->assertEquals($attributeOverrides['attributeOverride'], $instance->attributeOverride);
        $this->assertEquals('Diff', $instance->attributeLazyOverride);
        $this->assertEquals('Instance #1', $instance->sequenceOverride);
    }

    public function testWithAttributes()
    {
        $instance = new stdClass();
        $attributes = array('name' => 'Mindaugas Bujanauskas', 'hobbies' => 'Skateboarding');
        $this->runner->withAttributes($instance, $attributes);
        $this->assertEquals($attributes['name'], $instance->name);
        $this->assertEquals($attributes['hobbies'], $instance->hobbies);
    }

    public function testWithLazyAttributes()
    {
        $name = 'Mindaugas Bujanauskas';
        $instance = new stdClass();
        $attributes = array(
            'time' => function() { return microtime(); },
            'name' => function() use($name) { return $name; }
        );
        $now = microtime();
        $this->runner->withAttributes($instance, $attributes);
        $this->assertGreaterThanOrEqual((float) $now, (float) $instance->time);
        $this->assertEquals($name, $instance->name);
    }

    public function testWithSequences()
    {
        $instance1 = new stdClass();
        $instance2 = new stdClass();
        $sequences = array(
            'email' => function($i) { return "username{$i}@hostname.com"; },
            'index' => function($i) { return $i; }
        );
        $this->runner->withSequences($instance1, $sequences);
        $this->runner->withSequences($instance2, $sequences);
        $this->assertEquals('username1@hostname.com', $instance1->email);
        $this->assertEquals('username2@hostname.com', $instance2->email);
        $this->assertEquals('1', $instance1->index);
        $this->assertEquals('2', $instance2->index);
    }

}
