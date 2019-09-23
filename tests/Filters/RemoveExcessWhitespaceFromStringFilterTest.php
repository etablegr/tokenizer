<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class RemoveExcessWhitespaceFromStringFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testFilter(): void
    {
        $input    = '   Hello      Yannis    ';
        $expected = ' Hello Yannis ';
        $result   = (new RemoveExcessWhitespaceFromStringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }
}
