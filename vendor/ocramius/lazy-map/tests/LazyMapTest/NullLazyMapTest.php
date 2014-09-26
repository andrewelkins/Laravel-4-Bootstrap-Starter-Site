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

use LazyMapTestAsset\NullLazyMap;
use PHPUnit_Framework_TestCase;

/**
 * Tests for {@see \LazyMap\AbstractLazyMap} and {@see \LazyMapTestAsset\NullLazyMap}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 *
 * @covers \LazyMap\AbstractLazyMap
 */
class NullLazyMapTest extends PHPUnit_Framework_TestCase
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
        $this->lazyMap = new NullLazyMap();
    }

    public function testDirectPropertyAccess()
    {
        $this->assertSame(null, $this->lazyMap->foo);
        $this->assertSame(null, $this->lazyMap->bar);
        $this->assertSame(null, $this->lazyMap->{'baz\\tab'});
    }
}
