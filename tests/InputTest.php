<?php declare(strict_types=1);

namespace Tokenizer;

class InputTest extends \PHPUnit\Framework\TestCase
{
    public function testSetInput(): void
    {
        $input = new Input(null);

        $this->assertSame('', $input->getInput());
        $this->assertSame('', (string) $input);

        $input = new Input([]);

        $this->assertSame('', $input->getInput());
        $this->assertSame('', (string) $input);

        $input = new Input(1);

        $this->assertSame('1', $input->getInput());
        $this->assertSame('1', (string) $input);

        $input = new Input(3.14);

        $this->assertSame('3.14', $input->getInput());
        $this->assertSame('3.14', (string) $input);
    }
}
