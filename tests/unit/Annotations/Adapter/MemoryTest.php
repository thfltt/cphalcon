<?php

namespace Phalcon\Test\Unit\Annotations\Adapter;

use Phalcon\Test\Module\UnitTest;
use Phalcon\Annotations\Adapter\Memory;

/**
 * \Phalcon\Test\Unit\Annotations\Adapter\MemoryTest
 * Tests for \Phalcon\Annotations\Adapter\Memory component
 *
 * @copyright (c) 2011-2017 Phalcon Team
 * @link      https://phalconphp.com
 * @author    Andres Gutierrez <andres@phalconphp.com>
 * @author    Serghei Iakovlev <serghei@phalconphp.com>
 * @package   Phalcon\Test\Unit\Annotations
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalconphp.com
 * so that we can send you a copy immediately.
 */
class MemoryTest extends UnitTest
{
    public function testMemoryAdapter()
    {
        require_once PATH_DATA . 'annotations/TestClass.php';
        require_once PATH_DATA . 'annotations/TestClassNs.php';

        $adapter = new Memory();

        $classAnnotations = $adapter->get('TestClass');
        $this->assertTrue(is_object($classAnnotations));
        $this->assertEquals(get_class($classAnnotations), 'Phalcon\Annotations\Reflection');
        $this->assertEquals(get_class($classAnnotations->getClassAnnotations()), 'Phalcon\Annotations\Collection');

        $classAnnotations = $adapter->get('TestClass');
        $this->assertTrue(is_object($classAnnotations));
        $this->assertEquals(get_class($classAnnotations), 'Phalcon\Annotations\Reflection');
        $this->assertEquals(get_class($classAnnotations->getClassAnnotations()), 'Phalcon\Annotations\Collection');

        $classAnnotations = $adapter->get('User\TestClassNs');
        $this->assertTrue(is_object($classAnnotations));
        $this->assertEquals(get_class($classAnnotations), 'Phalcon\Annotations\Reflection');
        $this->assertEquals(get_class($classAnnotations->getClassAnnotations()), 'Phalcon\Annotations\Collection');

        $classAnnotations = $adapter->get('User\TestClassNs');
        $this->assertTrue(is_object($classAnnotations));
        $this->assertEquals(get_class($classAnnotations), 'Phalcon\Annotations\Reflection');
        $this->assertEquals(get_class($classAnnotations->getClassAnnotations()), 'Phalcon\Annotations\Collection');

        $property = $adapter->getProperty('TestClass', 'testProp1');
        $this->assertTrue(is_object($property));
        $this->assertEquals(get_class($property), 'Phalcon\Annotations\Collection');
        $this->assertEquals($property->count(), 4);
    }
}
