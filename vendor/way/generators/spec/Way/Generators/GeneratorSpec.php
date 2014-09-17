<?php

namespace spec\Way\Generators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Way\Generators\Filesystem\Filesystem;
use Way\Generators\Compilers\TemplateCompiler;

class GeneratorSpec extends ObjectBehavior {

    function let(Filesystem $file)
    {
        // By default, we'll set the file to not exist
        // This may be overridden, though
        $file->exists('foo.txt')->willReturn(false);

        $this->beConstructedWith($file);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Way\Generators\Generator');
    }

    function it_compiles_a_template(Filesystem $file, TemplateCompiler $compiler)
    {
        $template = 'class $NAME$ {}';
        $data = ['NAME' => 'Bar'];
        $compiledTemplate = 'class Bar {}';

        $file->get('template.txt')->shouldBeCalled()->willReturn($template);
        $compiler->compile($template, $data)->shouldBeCalled()->willReturn($compiledTemplate);

        // When we call compile, we expect the method to
        // fetch the given template, compile it down,
        // and return the results
        $this->compile('template.txt', $data, $compiler)->shouldBe($compiledTemplate);
    }

}
