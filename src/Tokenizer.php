<?php declare(strict_types=1);

namespace Tokenizer;

class Tokenizer implements TokenizerInterface
{
    use IsFilterableTrait;

    private $input;

    private $token_limits = PHP_INT_MAX;

    public function getTokens(): array
    {
        $input  = (string) $this->getInput();
        $tokens = explode(' ', $input, $this->getTokensLimit());

        foreach ($tokens as $index => $value) {
            $tokens[$index] = $this->applyFilters($value);
        }

        $tokens = array_filter($tokens);
        $tokens = array_unique($tokens);
        return array_values($tokens);
    }

    public function setInput(InputInterface $input): TokenizerInterface
    {
        $this->input = $input;

        return $this;
    }

    public function getInput(): InputInterface
    {
        return $this->input;
    }

    public function setTokensLimit(int $token_limits): TokenizerInterface
    {
        $this->token_limits = $token_limits;

        return $this;
    }

    public function getTokensLimit(): int
    {
        return $this->token_limits;
    }
}
