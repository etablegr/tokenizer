<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class LowercaseStringFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testFilter(): void
    {
        $input    = 'HELLO';
        $expected = 'hello';
        $result   = (new LowercaseStringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }

    public function testFilterGreek(): void
    {
        $input    = 'ΓΕΙΑ';
        $expected = 'γεια';
        $result   = (new LowercaseStringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }
}
