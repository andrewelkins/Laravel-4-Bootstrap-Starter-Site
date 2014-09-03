<?php namespace Woodling;

/**
 * Finder loads Blueprints for you.
 *
 * @package Woodling
 */

class Finder
{

    /**
     * @var array Default search paths (last node serves as both file and folder name)
     */
    public $searchPaths = array(
        'application/tests/blueprints',
        'app/tests/blueprints',
        'tests/blueprints'
    );

    /**
     * Adds paths to the default search array.
     *
     * Paths can be relative to your root file or absolute. Takes a string or an array of
     * paths.
     *
     * <code>
     *     $finder->addPaths('src/Acme/DemoBundle/Tests/blueprints');
     *
     *     $finder->addPaths(array(
     *         '/home/users/mindaugas/blueprints',
     *         'app/tests/blueprints'
     *     ));
     * </code>
     *
     * @param string|array $paths String or array of paths to expand search with
     */
    public function addPaths($paths)
    {
        if (is_string($paths))
        {
            $paths = array($paths);
        }

        foreach($paths as $path)
        {
            $this->searchPaths[] = $path;
        }
    }

    /**
     * Attempts to load files specified in `$this->searchPaths`.
     *
     * By default, it will attempt to load the following files:
     *
     * - application/tests/blueprints/*.php
     * - application/tests/blueprints.php
     * - app/tests/blueprints/*.php
     * - app/tests/blueprints.php
     * - tests/blueprints/*.php
     * - tests/blueprints.php
     *
     * It iterates over `$this->searchPaths` array and appends `.php` to each path, trying
     * to load it as a file. Afterwards it loads this path as a folder and iterates over
     * each item in it and if PHP file is found, loads it.
     */
    public function findBlueprints()
    {
        foreach($this->searchPaths as $path)
        {
            // Try to load $path.php
            $file = rtrim($path, '/') . '.php';
            if (file_exists($file))
            {
                require_once($file);
            }

            // Load php files in path
            if (is_dir($path))
            {
                foreach (new \DirectoryIterator($path) as $node)
                {
                    $ext = strtolower(pathinfo($node->getPathName(), PATHINFO_EXTENSION));

                    if ($node->isFile() && $ext === 'php')
                    {
                        require_once($node->getPathName());
                    }
                }
            }
        }
    }

}
