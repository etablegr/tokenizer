<?php declare (strict_types = 1);

namespace Tokenizer;

use Tokenizer\Filters\FilterInterface;

interface IsFilterableInterface
{
    public function addFilter(FilterInterface $filter): self;

    public function getFilters(): array;

    public function applyFilters(string $input = null): ?string;
}
