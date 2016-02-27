<?php

namespace spec\Blake\Mock\Traits;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertiesImplSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Blake\Mock\Traits\PropertiesImpl');
    }

    function it_provides_read_access_to_id()
    {
        $this->id->shouldEqual(42);
    }

    function it_prevents_writing_to_id()
    {
        $this->id = 99;
        $this->id->shouldEqual(42);
    }

    function it_provides_read_access_to_name()
    {
        $this->firstName->shouldEqual('Hugh');
    }

    function it_provides_write_access_to_name()
    {
        $this->firstName = 'Dan';
        $this->firstName->shouldEqual('Dan');
    }

    function it_prevent_access_to_secret()
    {
        $this->secret->shouldEqual(null);
        $this->secret = 'new secret';
        $this->secret->shouldEqual(null);
        $this->insideMan()->shouldEqual("this is a secret, don't tell anyone");
    }

    function it_uses_getters_without_properties()
    {
        $this->name->shouldEqual('Hugh Man');
    }

    function it_uses_setters_that_shadow_properties()
    {
        $this->age = '36';
        $this->age->shouldEqual(36);
    }
}
