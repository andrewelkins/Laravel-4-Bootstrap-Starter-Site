<?php

namespace spec\Way\Generators\Compilers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateCompilerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Way\Generators\Compilers\TemplateCompiler');
    }

    function it_compiles_a_template_with_data()
    {
        $data = [
            'NAME' => 'Foo',
            'PARENT' => 'Bar'
        ];

        $this->compile(
            'class $NAME$ extends $PARENT$ {}', $data
        ) ->shouldBe('class Foo extends Bar {}');
    }
}
