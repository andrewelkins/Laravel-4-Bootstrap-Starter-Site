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

namespace LazyMapPerformance;

use Athletic\AthleticEvent;
use LazyMapTestAsset\NullArrayBasedLazyMap;
use LazyMapTestAsset\NullLazyMap;

/**
 * Performance tests for {@see \LazyMapTestAsset\NullLazyMap}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class NullLazyMapEvent extends AthleticEvent
{
    /**
     * @var mixed[]
     */
    private $array;

    /**
     * @var NullArrayBasedLazyMap
     */
    private $arrayMap;

    /**
     * @var NullLazyMap
     */
    private $lazyMap;

    public function setUp()
    {
        $this->array    = array('existingKey' => null);
        $this->arrayMap = new NullArrayBasedLazyMap();
        $this->lazyMap  = new NullLazyMap();

        // enforcing key instantiation
        $this->arrayMap->get('existingKey');
        $this->lazyMap->existingKey;
    }

    /**
     * @baseline
     * @iterations 100000
     * @group initialized-map
     *
     * @return mixed
     */
    public function initializedArrayPerformance()
    {
        if (isset($this->array['existingKey'])) {
            return $this->array['existingKey'];
        }
    }

    /**
     * @iterations 100000
     * @group initialized-map
     *
     * @return mixed
     */
    public function initializedArrayMapPerformance()
    {
        return $this->arrayMap->get('existingKey');
    }

    /**
     * @iterations 100000
     * @group initialized-map
     *
     * @return mixed
     */
    public function initializedLazyMapPerformance()
    {
        return $this->lazyMap->existingKey;
    }

    /**
     * @baseline
     * @iterations 100000
     * @group un-initialized-map
     *
     * @return mixed
     */
    public function unInitializedArrayPerformance()
    {
        if (isset($this->array['nonExistingKey'])) {
            return $this->array['nonExistingKey'];
        }

        return $this->array['nonExistingKey'] = null;
    }

    /**
     * @iterations 100000
     * @group un-initialized-map
     *
     * @return mixed
     */
    public function unInitializedArrayMapPerformance()
    {
        return $this->arrayMap->get('nonExistingKey');
    }

    /**
     * @iterations 100000
     * @group un-initialized-map
     *
     * @return mixed
     */
    public function unInitializedLazyMapPerformance()
    {
        return $this->lazyMap->nonExistingKey;
    }
}
