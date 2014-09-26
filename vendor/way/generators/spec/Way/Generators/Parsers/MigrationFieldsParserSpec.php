<?php

namespace spec\Way\Generators\Parsers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MigrationFieldsParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Way\Generators\Parsers\MigrationFieldsParser');
    }

    function it_parses_a_string_of_fields()
    {
        $this->parse('name:string')->shouldReturn([
            ['field' => 'name', 'type' => 'string']
        ]);

        $this->parse('name:string, age:integer')->shouldReturn([
            ['field' => 'name', 'type' => 'string'],
            ['field' => 'age', 'type' => 'integer']
        ]);

        $this->parse('name:string:nullable, age:integer')->shouldReturn([
            ['field' => 'name', 'type' => 'string', 'decorators' => ['nullable']],
            ['field' => 'age', 'type' => 'integer']
        ]);

        $this->parse('name:string(15):nullable')->shouldReturn([
            ['field' => 'name', 'type' => 'string', 'args' => '15', 'decorators' => ['nullable']]
        ]);

        $this->parse('name:double(15,8):nullable:default(10), age:integer')->shouldReturn([
            ['field' => 'name', 'type' => 'double', 'args' => '15,8', 'decorators' => ['nullable', 'default(10)']],
            ['field' => 'age', 'type' => 'integer']
        ]);

    }

}
