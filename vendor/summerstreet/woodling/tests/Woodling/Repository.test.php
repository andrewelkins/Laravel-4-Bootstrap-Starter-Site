<?php

use Woodling\Repository;
use Woodling\Factory;
use Woodling\Blueprint;

class TestWoodlingRepository extends PHPUnit_Framework_TestCase
{

    /**
     * @var Repository
     */
    public $repository;

    public function setUp()
    {
        $this->repository = new Repository();
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf('Woodling\Repository', $this->repository);
        $this->assertObjectHasAttribute('store', $this->repository);
    }

    public function testAddAndGet()
    {
        $name = 'User';
        $factory = new Factory('stdClass', new Blueprint());
        $this->assertEmpty($this->repository->getStore());
        $this->repository->add($name, $factory);
        $this->assertSame($factory, $this->repository->get($name));
    }

    public function testSetStoreAndGetStore()
    {
        $store = array('key' => 'value');
        $this->repository->setStore($store);
        $this->assertEquals($store, $this->repository->getStore());
    }

}
