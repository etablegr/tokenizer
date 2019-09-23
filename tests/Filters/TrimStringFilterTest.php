<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class TrimStringFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testFilter(): void
    {
        $input    = '  hello  ';
        $expected = 'hello';
        $result   = (new TrimStringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }
}
