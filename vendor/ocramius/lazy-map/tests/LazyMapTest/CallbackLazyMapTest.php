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

use LazyMap\CallbackLazyMap;
use LazyMapTestAsset\NullLazyMap;
use PHPUnit_Framework_TestCase;

/**
 * Tests for {@see \LazyMap\CallbackLazyMap}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 *
 * @covers \LazyMap\CallbackLazyMap
 */
class CallbackLazyMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \LazyMap\CallbackLazyMap
     */
    protected $lazyMap;

    /**
     * @var callable|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $callback;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->callback = $this->getMock('stdClass', array('__invoke'));
        $this->lazyMap  = new CallbackLazyMap($this->callback);
    }

    public function testDirectPropertyAccess()
    {
        $count = 0;
        $this
            ->callback
            ->expects($this->exactly(3))
            ->method('__invoke')
            ->will($this->returnCallback(function ($name) use (& $count) {
                $count += 1;

                return $name . ' - ' . $count;
            }));

        $this->assertSame('foo - 1', $this->lazyMap->foo);
        $this->assertSame('bar - 2', $this->lazyMap->bar);
        $this->assertSame('baz\\tab - 3', $this->lazyMap->{'baz\\tab'});
    }
}
