<?php

namespace spec\Way\Generators\Parsers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MigrationNameParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Way\Generators\Parsers\MigrationNameParser');
    }

    function it_parses_a_basic_migration_name()
    {
        $this->parse('create_orders_table')->shouldBe([
            'action' => 'create',
            'table' => 'orders'
        ]);
    }

    function it_parses_a_complex_migration_name()
    {
        $this->parse('add_first_name_and_last_name_to_recent_orders_table')->shouldBe([
            'action' => 'add',
            'table' => 'recent_orders'
        ]);

        $this->parse('remove_first_name_from_users_table')->shouldBe([
            'action' => 'remove',
            'table' => 'users'
        ]);
    }

}
