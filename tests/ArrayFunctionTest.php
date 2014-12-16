<?php

namespace TypedPHP\Functions\ArrayFunctions\Test;

use TypedPHP\Functions\ArrayFunctions;

class ArrayFunctionTest extends Test
{
    public function testContains()
    {
        $this->assertTrue(ArrayFunctions\contains([1, 2, 3], 2));
        $this->assertFalse(ArrayFunctions\contains([1, 2, 3], 4));
    }

    public function testEach()
    {
        $expected = [2, 4, 6];
        $actual = [];

        ArrayFunctions\each([1, 2, 3], function ($item) use (&$actual) {
            $actual[] = $item * 2;
        });

        $this->assertEquals($expected, $actual);
    }

    public function testExclude()
    {
        $this->assertEquals([2 => 3], ArrayFunctions\exclude([1, 2, 3], [1, 2]));
    }

    public function testFilter()
    {
        $actual = ArrayFunctions\filter([1, 2, 3], function ($item) {
            return $item == 2;
        });

        $this->assertEquals([1 => 2], $actual);
    }

    public function testGetLength()
    {
        $this->assertEquals(3, ArrayFunctions\length([1, 2, 3]));
    }

    public function testHas()
    {
        $this->assertTrue(ArrayFunctions\has(["foo" => "bar"], "foo"));
        $this->assertFalse(ArrayFunctions\has(["foo" => "bar"], "baz"));
    }

    public function testJoin()
    {
        $this->assertEquals("1,2,3", ArrayFunctions\join([1, 2, 3], ","));
        $this->assertEquals("1", ArrayFunctions\join([1], ","));
    }

    public function testMap()
    {
        $actual = ArrayFunctions\map([1, 2, 3], function ($item) {
            return $item * 2;
        });

        $this->assertEquals([2, 4, 6], $actual);
    }

    public function testMerge()
    {
        $this->assertEquals([1, 2, 3, 4, 5, 6], ArrayFunctions\merge([1, 2, 3], [4, 5, 6]));
    }

    public function testSlice()
    {
        $this->assertEquals([1, 2, 3], ArrayFunctions\slice([1, 2, 3]));
        $this->assertEquals([2, 3], ArrayFunctions\slice([1, 2, 3], 1));
        $this->assertEquals([2], ArrayFunctions\slice([1, 2, 3], 1, 1));
    }

    public function testRandom()
    {
        $this->assertNull(ArrayFunctions\random([]));
        $this->assertNotNull(ArrayFunctions\random([1, 2, 3]));
    }
}
