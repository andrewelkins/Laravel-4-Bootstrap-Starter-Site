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

namespace LazyMapTestAsset;

/**
 * Simple classical array-based map - used to simulate the overhead of a classical array-based solution
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class NullArrayBasedLazyMap
{
    /**
     * @var mixed[]
     */
    private $items = array();

    /**
     * Lazy getter - retrieves or instantiates a key in the map
     *
     * @param string $name
     *
     * @return mixed
     */
    public function & get($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }

        $this->items[$name] = $this->instantiate($name);

        return $this->items[$name];
    }

    /**
     * Null instantiator, emulates same overhead of an {@see \LazyMapTestAsset\NullLazyMap}
     */
    protected function instantiate($name)
    {
        return null;
    }
}
