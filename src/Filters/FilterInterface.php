<?php declare(strict_types=1);

namespace Tokenizer\Filters;

interface FilterInterface
{
    public function __construct(array $options = []);

    public function filter($value);

    public function validate($value): bool;

    public function setOption(string $key, $value): self;

    public function setOptions(array $options): self;

    public function getOption(string $key);

    public function getOptions(): array;
}
