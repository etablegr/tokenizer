<?php declare(strict_types=1);

namespace Tokenizer\Filters;

use Exception;
use stdClass;

class StringFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testValidateString(): void
    {
        $input  = 'hello';
        $result = (new StringFilter())->validate($input);

        $this->assertTrue($result);
    }

    public function testFilterString(): void
    {
        $input    = 'hello';
        $expected = 'hello';
        $result   = (new StringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }

    public function testFilterStringMinLength(): void
    {
        $filter = new StringFilter(['min' => 3]);

        $input    = 'hel';
        $expected = 'hel';
        $result   = $filter->filter($input);

        $this->assertSame($expected, $result);

        $input  = 'he';
        $result = $filter->filter($input);

        $this->assertNull($result);
    }

    public function testFilterStringMinLengthMultibyte(): void
    {
        $filter = new StringFilter(['min' => 3]);

        $input    = 'αβγ';
        $expected = 'αβγ';
        $result   = $filter->filter($input);

        $this->assertSame($expected, $result);

        $input  = 'αβ';
        $result = $filter->filter($input);

        $this->assertNull($result);
    }

    public function testValidateInt(): void
    {
        $input  = 10;
        $result = (new StringFilter())->validate($input);

        $this->assertTrue($result);
    }

    public function testFilterInt(): void
    {
        $input    = 10;
        $expected = '10';
        $result   = (new StringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }

    public function testValidateFloat(): void
    {
        $input  = 3.14;
        $result = (new StringFilter())->validate($input);

        $this->assertTrue($result);
    }

    public function testFilterFloat(): void
    {
        $input    = 3.14;
        $expected = '3.14';
        $result   = (new StringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }

    public function testValidateObjectToString(): void
    {
        $input  = new Exception('Hello'); // Exception has __toString
        $result = (new StringFilter())->validate($input);

        $this->assertTrue($result);
    }

    public function testFilterObjectToString(): void
    {
        $input  = new Exception('Hello'); // Exception has __toString
        $result = (new StringFilter())->filter($input);

        $this->assertTrue(strpos($result, 'Exception: Hello') === 0);
    }

    public function testValidateObjectWithoutToString(): void
    {
        $input  = new stdClass();
        $result = (new StringFilter())->validate($input);

        $this->assertFalse($result);
    }

    public function testFilterObjectWithoutToString(): void
    {
        $input  = new stdClass();
        $result = (new StringFilter())->filter($input);

        $this->assertNull($result);
    }

    public function testValidateArray(): void
    {
        $input  = [3.14];
        $result = (new StringFilter())->validate($input);

        $this->assertFalse($result);
    }

    public function testFilterArray(): void
    {
        $input  = [3.14];
        $result = (new StringFilter())->filter($input);

        $this->assertNull($result);
    }
}
