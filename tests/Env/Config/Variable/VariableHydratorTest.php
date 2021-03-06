<?php

/*
 * This file is part of the Manalize project.
 *
 * (c) Manala <contact@manala.io>
 *
 * For the full copyright and license information, please refer to the LICENSE
 * file that was distributed with this source code.
 */

namespace Manala\Manalize\Tests\Env\Config\Variable;

use Manala\Manalize\Env\Config\Variable\AppName;
use Manala\Manalize\Env\Config\Variable\VariableHydrator;

class VariableHydratorTest extends \PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
        $var = new AppName(null);

        (new VariableHydrator())->hydrate($var, ['value' => 'manala']);

        $prop = (new \ReflectionClass($var))->getProperty('value');
        $prop->setAccessible(true);

        $this->assertSame('manala', $prop->getValue($var));
    }
}
