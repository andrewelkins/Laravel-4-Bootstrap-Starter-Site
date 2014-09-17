<?php

namespace spec\Way\Generators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Way\Generators\Compilers\TemplateCompiler;
use Way\Generators\Filesystem\Filesystem;

class SchemaCreatorSpec extends ObjectBehavior {

    public function let(Filesystem $file, TemplateCompiler $compiler)
    {
        $this->beConstructedWith($file, $compiler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Way\Generators\SchemaCreator');
    }

}
