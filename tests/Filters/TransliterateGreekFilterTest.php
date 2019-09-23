<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class TransliterateGreekFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testFilter(): void
    {
        $input    = 'Χαλάνδρι';
        $expected = 'Halandri';
        $result   = (new TransliterateGreekFilter())->filter($input);

        $this->assertSame($expected, $result);
    }
}
