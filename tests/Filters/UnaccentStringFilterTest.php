<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class UnaccentStringFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testFilter(): void
    {
        $input    = implode('', array_keys(UnaccentStringFilter::REPLACEMENTS));
        $expected = implode('', array_values(UnaccentStringFilter::REPLACEMENTS));
        $result   = (new UnaccentStringFilter())->filter($input);

        $this->assertSame($expected, $result);
    }
}
