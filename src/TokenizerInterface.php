<?php declare(strict_types=1);

namespace Tokenizer;

interface TokenizerInterface extends IsFilterableInterface
{
    public function getTokens(): array;

    public function setInput(InputInterface $input): self;

    public function getInput(): InputInterface;

    public function getTokensLimit(): int;

    public function setTokensLimit(int $token_limits): self;
}
