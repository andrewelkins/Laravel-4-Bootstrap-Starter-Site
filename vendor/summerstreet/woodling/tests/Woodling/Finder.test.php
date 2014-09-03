<?php

use Woodling\Finder;
use org\bovigo\vfs\vfsStream;

class TestWoodlingFinder extends PHPUnit_Framework_TestCase
{

    /**
     * @var Finder
     */
    public $finder;

    public function setUp()
    {
        $this->finder = new Finder();
    }

    public function testInstantiation()
    {
        $this->assertNotEmpty($this->finder->searchPaths);
    }

    public function testAddPaths()
    {
        $stringPath = 'my/string/path';
        $arrayPaths = array('my/array/path/1', 'my/array/path/2');

        $this->finder->addPaths($stringPath);
        $this->assertTrue(in_array($stringPath, $this->finder->searchPaths), 'String path added');

        $this->finder->addPaths($arrayPaths);
        $this->assertTrue(in_array($arrayPaths[0], $this->finder->searchPaths), 'Array path [0] added');
        $this->assertTrue(in_array($arrayPaths[1], $this->finder->searchPaths), 'Array path [1] added');
    }

    public function testFindBlueprints()
    {
        $userFile = 'WoodlingTestsUser_'.md5(microtime());
        $botFile = 'WoodlingTestsBot_'.md5(microtime());
        $blueprintsFile = 'WoodlingTestsBlueprints_'.md5(microtime());

        $structure = array(
            'app' => array(
                'tests' => array(
                    'blueprints' => array(
                        'user.php' => '<?php class '.$userFile.'{}',
                        'bot.php' => '<?php class '.$botFile.'{}'
                    )
                )
            ),
            'tests' => array(
                'blueprints.php' => '<?php class '.$blueprintsFile.'{}'
            )
        );

        $vfs = vfsStream::setup('Woodling', null, $structure);

        $this->finder->searchPaths = array(
            vfsStream::url('Woodling/app/tests' . '/blueprints/'),
            vfsStream::url('Woodling/tests' . '/blueprints/') // this is a file
        );

        $this->finder->findBlueprints();

        $this->assertTrue(class_exists($userFile), 'Finder loads user file');
        $this->assertTrue(class_exists($botFile), 'Finder loads bot file');
        $this->assertTrue(class_exists($blueprintsFile), 'Finder loads blueprints file');
    }

}
