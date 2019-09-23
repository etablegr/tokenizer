<?php declare(strict_types=1);

namespace Tokenizer;

use Tokenizer\Filters\StringFilter;
use Tokenizer\Filters\UnaccentStringFilter;

class TokenizerTest extends \PHPUnit\Framework\TestCase
{
    public function testDefaultInputFilters(): void
    {
        $input    = new Input('   Hello    Yannis  ');
        $expected = 'Hello Yannis';
        $result   = (new Tokenizer())->setInput($input)->getInput();

        $this->assertEquals($expected, $result);
    }

    public function testGetTokens(): void
    {
        $input    = new Input('token1 token2 token3');
        $expected = ['token1', 'token2', 'token3'];
        $result   = (new Tokenizer())->setInput($input)->getTokens();

        $this->assertEquals($expected, $result);
    }

    public function testGetTokensUnique(): void
    {
        $input    = new Input('token1 token1 token2 token1 token2 token3 token1 token2 token3');
        $expected = ['token1', 'token2', 'token3'];
        $result   = (new Tokenizer())->setInput($input)->getTokens();

        $this->assertEquals($expected, $result);
    }

    public function testGetTokensMinLength(): void
    {
        $input    = new Input('token toke tok to t αα');
        $expected = ['token', 'toke', 'tok'];

        $tokenizer = new Tokenizer();
        $tokenizer->addFilter(new StringFilter(['min' => 3]));

        $result = $tokenizer->setInput($input)->getTokens();

        $this->assertEquals($expected, $result);
    }

    public function testGetTokensUnaccent(): void
    {
        $input    = (new Input('άά άα αά αα'))->addFilter(new UnaccentStringFilter());
        $expected = ['αα'];
        $result   = (new Tokenizer())->setInput($input)->getTokens();

        $this->assertEquals($expected, $result);
    }
}
