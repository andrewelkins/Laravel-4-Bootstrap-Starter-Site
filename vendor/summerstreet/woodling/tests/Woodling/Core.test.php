<?php

use Woodling\Core;
use Woodling\Blueprint;

class TestWoodlingCore extends PHPUnit_Framework_TestCase
{

    /**
     * @var Core
     */
    public $core;

    public function setUp()
    {
        $this->core = new Core();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Core', $this->core);
        $this->assertInstanceOf('Woodling\Repository', $this->core->repository);
        $this->assertInstanceOf('Woodling\Finder', $this->core->finder);
    }

    public function testGetFactory()
    {
        $factoryName = 'myFactory';
        $expectedFactory = 'Factory';
        $repositoryMock = $this->getMock('Woodling\Repository', array('get'));
        $repositoryMock->expects($this->once())
            ->method('get')
            ->with($this->equalTo($factoryName))
            ->will($this->returnValue($expectedFactory));

        $this->core->repository = $repositoryMock;

        $factory = $this->core->getFactory($factoryName);
        $this->assertEquals($expectedFactory, $factory);
    }

    /**
     * Should instantiate an empty blueprint, send it over to the callback so that user
     * could set up attributes, then this blueprint should be added to the factory, which
     * should be stored in storage. Factory should receive class name.
     */
    public function testSeedSimple()
    {
        $name = 'User'; // Factory name
        $blueprintInstance = null; // Ref to blueprint

        $callbackMock = $this->getMock('stdClass', array('emptyMethod'));
        $callbackMock->expects($this->once())
            ->method('emptyMethod')
            ->with($this->isInstanceOf('Woodling\Blueprint'));

        $callback = function($blueprint) use($callbackMock, &$blueprintInstance)
        {
            $blueprintInstance = $blueprint;
            $callbackMock->emptyMethod($blueprint);
        };

        $this->core->seed($name, $callback); // Call!

        $factory = $this->core->repository->get($name);
        $factoryBlueprint = $factory->getBlueprint();

        $this->assertInstanceOf('Woodling\Factory', $factory);
        $this->assertSame($blueprintInstance, $factoryBlueprint);
        $this->assertEquals($name, $factory->getClassName());
    }

    /**
     * Not including a callback in your arguments is a sin
     * @expectedException InvalidArgumentException
     */
    public function testSeedAdvancedException()
    {
        $this->core->seed('Author', array('class' => 'User'));
    }

    public function testSeedAdvanced()
    {
        $name = 'Author';
        $author = 'John Doe';
        $className = 'User';
        $fixture = function($blueprint) use($author) { $blueprint->name = $author; };
        $this->core->seed($name, array('class' => $className, 'do' => $fixture));
        $factory = $this->core->repository->get('Author');
        $this->assertEquals($author, $factory->getBlueprint()->getAttribute('name'));
        $this->assertEquals($className, $factory->getClassName());
    }

    public function testRetrieve()
    {
        $modelName = 'stdClass';
        $factoryMock = $this->getMock('Woodling\Factory', array('make'), array('Mock', new Blueprint()));
        $factoryMock->expects($this->once())
            ->method('make')
            ->will($this->returnValue(new $modelName()));
        $repositoryMock = $this->getMock('Woodling\Repository', array('get'));
        $repositoryMock->expects($this->once())
            ->method('get')
            ->with($this->equalTo($modelName))
            ->will($this->returnValue($factoryMock));
        $this->core->repository = $repositoryMock;
        $instance = $this->core->retrieve($modelName);
        $this->assertInstanceOf($modelName, $instance);
    }

    public function testRetrieveWithOverrides()
    {
        $overrides = array('name' => 'John', 'surname' => 'Doe');
        $modelName = 'stdClass';
        $factoryMock = $this->getMock('Woodling\Factory', array('make'), array('Mock', new Blueprint()));
        $factoryMock->expects($this->once())
            ->method('make')
            ->with($this->logicalAnd($this->arrayHasKey('name'), $this->arrayHasKey('surname')));
        $this->core->repository->add($modelName, $factoryMock);
        $this->core->retrieve($modelName, $overrides);
    }

    public function testSaved()
    {
        $persistMethodName = 'mySaveMethod';
        $modelName = 'stdClass';
        $modelMock = $this->getMock($modelName, array($persistMethodName));
        $modelMock->expects($this->once())
            ->method($persistMethodName);
        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->once())
            ->method('retrieve')
            ->with($this->equalTo($modelName))
            ->will($this->returnValue($modelMock));
        $coreMock->persistMethod = $persistMethodName;
        $coreMock->saved($modelName);
    }

    public function testSavedWithOverrides()
    {
        $overrides = array('name' => 'John Doe');
        $modelName = 'stdClass';
        $modelMock = $this->getMock($modelName, array('save'));
        $modelMock->expects($this->once())
            ->method('save');
        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->once())
            ->method('retrieve')
            ->with($this->equalTo($modelName), $this->arrayHasKey('name'))
            ->will($this->returnValue($modelMock));
        $coreMock->saved($modelName, $overrides);
    }

    public function testRetrieveList()
    {
        $name = 'stdClass';
        $instance = new $name();
        $count = 3;

        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->exactly($count))
            ->method('retrieve')
            ->with($this->equalTo($name), $this->equalTo(array()))
            ->will($this->returnValue($instance));

        $list = $coreMock->retrieveList($name, $count);

        $this->assertCount($count, $list);
        $this->assertEquals($instance, $list[1]);
    }

    public function testRetrieveListWithOverrides()
    {
        $name = 'stdClass';
        $instance = new $name();
        $overrides = array('name' => 'John Doe');
        $count = 3;

        $coreMock = $this->getMock('Woodling\Core', array('retrieve'));
        $coreMock->expects($this->exactly($count))
            ->method('retrieve')
            ->with($this->equalTo($name), $this->equalTo($overrides))
            ->will($this->returnValue($instance));

        $list = $coreMock->retrieveList($name, $count, $overrides);

        $this->assertCount($count, $list);
        $this->assertEquals($instance, $list[0]);
    }

    public function testSavedList()
    {
        $name = 'stdClass';
        $count = 3;
        $returnValue = new $name();

        $coreMock = $this->getMock('Woodling\Core', array('saved'));
        $coreMock->expects($this->exactly($count))
            ->method('saved')
            ->with($this->equalTo($name), $this->equalTo(array()))
            ->will($this->returnValue($returnValue));

        $list = $coreMock->savedList($name, $count);

        $this->assertCount($count, $list);
        $this->assertEquals($returnValue, $list[0]);
    }

    public function testSavedListWithOverrides()
    {
        $name = 'stdClass';
        $count = 3;
        $overrides = array('name' => 'John Doe');
        $returnValue = new $name();

        $coreMock = $this->getMock('Woodling\Core', array('saved'));
        $coreMock->expects($this->exactly($count))
            ->method('saved')
            ->with($this->equalTo($name), $this->equalTo($overrides))
            ->will($this->returnValue($returnValue));

        $list = $coreMock->savedList($name, $count, $overrides);

        $this->assertCount($count, $list);
        $this->assertEquals($returnValue, $list[0]);
    }

}
