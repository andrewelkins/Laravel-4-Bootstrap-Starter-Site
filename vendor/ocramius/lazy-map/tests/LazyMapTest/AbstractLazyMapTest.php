<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace LazyMapTest;

use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * Tests for {@see \LazyMap\AbstractLazyMap}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 *
 * @covers \LazyMap\AbstractLazyMap
 */
class AbstractLazyMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \LazyMap\AbstractLazyMap|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $lazyMap;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->lazyMap = $this->getMockForAbstractClass('LazyMap\AbstractLazyMap');
    }

    public function testDirectPropertyAccess()
    {
        $this
            ->lazyMap
            ->expects($this->exactly(3))
            ->method('instantiate')
            ->with($this->isType('string'))
            ->will($this->returnCallback(function ($key) {
                return $key . ' - initialized value';
            }));

        $this->assertSame('foo - initialized value', $this->lazyMap->foo);
        $this->assertSame('bar - initialized value', $this->lazyMap->bar);
        $this->assertSame('baz\\tab - initialized value', $this->lazyMap->{'baz\\tab'});
    }

    public function testMultipleDirectPropertyAccessDoesNotTriggerSameInstantiation()
    {
        $this
            ->lazyMap
            ->expects($this->exactly(2))
            ->method('instantiate')
            ->with($this->isType('string'))
            ->will($this->returnCallback(function ($key) {
                return new stdClass();
            }));

        $foo = $this->lazyMap->foo;

        $this->assertInstanceOf('stdClass', $foo);
        $this->assertSame($foo, $this->lazyMap->foo);
        $bar = $this->lazyMap->bar;

        $this->assertInstanceOf('stdClass', $bar);
        $this->assertSame($bar, $this->lazyMap->bar);

        $this->assertNotSame($bar, $foo);
    }

    public function testUnSettingPropertiesRemovesSharedInstance()
    {
        $this
            ->lazyMap
            ->expects($this->exactly(2))
            ->method('instantiate')
            ->with($this->isType('string'))
            ->will($this->returnCallback(function ($key) {
                return new stdClass();
            }));

        $foo = $this->lazyMap->foo;

        $this->assertInstanceOf('stdClass', $foo);
        $this->assertSame($foo, $this->lazyMap->foo);

        unset($this->lazyMap->foo);

        $bar = $this->lazyMap->foo;

        $this->assertInstanceOf('stdClass', $bar);
        $this->assertSame($bar, $this->lazyMap->foo);

        $this->assertNotSame($bar, $foo);
    }
}
