<?php

use Woodling\Core;
use Woodling\Woodling;

class TestWoodlingWoodling extends PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        // Each test starts with no core
        Woodling::reset();
    }

    public function testStaticInit()
    {
        // We will create a new file with a class name only we know. This file should be
        // loaded by Woodling::init().
        $file = 'tests/blueprints.php';
        $class = 'WoodlingTestStaticInitHelper_'.md5(microtime());
        $content = '<?php class '.$class.'{}';
        @file_put_contents($file, $content);

        $this->assertInstanceOf('Woodling\Core', Woodling::core());
        $this->assertTrue(class_exists($class));

        @unlink($file);
    }

    public function testClass()
    {
        $this->assertClassHasStaticAttribute('core', 'Woodling\Woodling');
    }

    public function testStaticReset()
    {
        $core = new Core();
        $woodlingMock = $this->getMockClass('Woodling\Woodling', array('init'));
        $woodlingMock::staticExpects($this->any())
            ->method('init');

        // Control test to make sure we are getting back what we expect from core()
        $woodlingMock::core($core);
        $this->assertSame($core, $woodlingMock::core());

        // After we call reset() method Woodling::$core should be set to NULL and when we
        // try to call core() it should set a new core for us.
        $woodlingMock::reset();
        $this->assertNotSame($core, $woodlingMock::core());
    }

    public function testStaticCore()
    {
        // Test that core() creates a core if none exists
        $this->assertInstanceOf('Woodling\Core', Woodling::core());

        // Test that core is set when passing it to `core()`
        Woodling::reset();
        $core = new Core();
        $this->assertSame($core, Woodling::core($core));
    }

    public function testDeprecatedSetGetCore()
    {
        $core = new Core();
        $woodlingMock = $this->getMockClass('Woodling\Woodling', array('core'));
        $woodlingMock::staticExpects($this->at(0))
            ->method('core');
        $woodlingMock::staticExpects($this->at(1))
            ->method('core')
            ->with($this->isInstanceOf('Woodling\Core'));
        $woodlingMock::getCore();
        $woodlingMock::setCore($core);
    }

    public function testStaticFactory()
    {
        $myFactoryName = 'myFactory';
        $myFactory = 'Factory';
        $coreMock = $this->getMock('Woodling\Core', array('getFactory'));
        $coreMock->expects($this->once())
            ->method('getFactory')
            ->with($this->equalTo($myFactoryName))
            ->will($this->returnValue($myFactory));

        Woodling::core($coreMock);

        $returnedFactory = Woodling::factory($myFactoryName);
        $this->assertEquals($myFactory, $returnedFactory);
    }

    public function testStaticSeed()
    {
        $name = 'User';
        $closure = function() {};
        $coreMock = $this->getMock('Woodling\Core', array('seed'));
        $coreMock->expects($this->once())
            ->method('seed')
            ->with($this->equalTo($name), $this->isInstanceOf('Closure'));
        Woodling::core($coreMock);
        Woodling::seed($name, $closure);
    }

    public function testStaticRetrieve()
    {
        $name = 'User';
        $returnValue = 'Object';
        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->once())
            ->method('retrieve')
            ->with($this->equalTo($name))
            ->will($this->returnValue($returnValue));
        Woodling::core($coreMock);
        $this->assertEquals($returnValue, Woodling::retrieve($name));
    }

    public function testStaticRetrieveWithOverrides()
    {
        $name = 'User';
        $overrides = array('name' => 'Mindaugas Bujanauskas');
        $returnValue = 'Object';
        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->once())
            ->method('retrieve')
            ->with($this->equalTo($name), $this->arrayHasKey('name'))
            ->will($this->returnValue($returnValue));
        Woodling::core($coreMock);
        Woodling::retrieve($name, $overrides);
    }

    public function testStaticSaved()
    {
        $name = 'User';
        $returnValue = 'Object';
        $coreMock = $this->getMock('Woodling\Core', array('saved'));
        $coreMock->expects($this->once())
            ->method('saved')
            ->with($this->equalTo($name))
            ->will($this->returnValue($returnValue));
        Woodling::core($coreMock);
        $this->assertEquals($returnValue, Woodling::saved($name));
    }

    public function testStaticSavedWithOverrides()
    {
        $name = 'User';
        $overrides = array('name' => 'Mindaugas Bujanauskas');
        $returnValue = 'Object';
        $coreMock = $this->getMock('Woodling\Core', array('saved'));
        $coreMock->expects($this->once())
            ->method('saved')
            ->with($this->equalTo($name), $this->arrayHasKey('name'))
            ->will($this->returnValue($returnValue));
        Woodling::core($coreMock);
        Woodling::saved($name, $overrides);
    }

    public function testStaticRetrieveList()
    {
        $name = 'stdClass';
        $count = 3;
        $returnValue = array(new $name());

        $coreMock = $this->getMock('Woodling\Core', array('retrieveList'));
        $coreMock->expects($this->once())
            ->method('retrieveList')
            ->with($this->equalTo($name), $this->equalTo($count), $this->equalTo(array()))
            ->will($this->returnValue($returnValue));

        Woodling::core($coreMock);

        $list = Woodling::retrieveList($name, $count);
        $this->assertEquals($returnValue, $list);
    }

    public function testStaticRetrieveListWithOverrides()
    {
        $name = 'stdClass';
        $count = 3;
        $overrides = array('name' => 'Mindaugas Bujanauskas');
        $returnValue = array(new $name());

        $coreMock = $this->getMock('Woodling\Core', array('retrieveList'));
        $coreMock->expects($this->once())
            ->method('retrieveList')
            ->with($this->equalTo($name), $this->equalTo($count), $this->equalTo($overrides))
            ->will($this->returnValue($returnValue));

        Woodling::core($coreMock);

        $list = Woodling::retrieveList($name, $count, $overrides);
        $this->assertEquals($returnValue, $list);
    }

    public function testStaticSavedList()
    {
        $name = 'stdClass';
        $count = 3;
        $returnValue = new $name();

        $coreMock = $this->getMock('Woodling\Core', array('savedList'));
        $coreMock->expects($this->once())
            ->method('savedList')
            ->with($this->equalTo($name), $this->equalTo($count), $this->equalTo(array()))
            ->will($this->returnValue($returnValue));

        Woodling::core($coreMock);

        $list = Woodling::savedList($name, $count);
        $this->assertEquals($returnValue, $list);
    }

    public function testStaticSavedListWithOverrides()
    {
        $name = 'stdClass';
        $count = 3;
        $overrides = array('name' => 'Mindaugas Bujanauskas');
        $returnValue = new $name();

        $coreMock = $this->getMock('Woodling\Core', array('savedList'));
        $coreMock->expects($this->once())
            ->method('savedList')
            ->with($this->equalTo($name), $this->equalTo($count), $this->equalTo($overrides))
            ->will($this->returnValue($returnValue));

        Woodling::core($coreMock);

        $list = Woodling::savedList($name, $count, $overrides);
        $this->assertEquals($returnValue, $list);
    }

}
