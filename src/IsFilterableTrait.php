<?php declare (strict_types = 1);

namespace Tokenizer;

use Tokenizer\Filters\FilterInterface;

trait IsFilterableTrait
{
    private $filters = [];

    public function addFilter(FilterInterface $filter): IsFilterableInterface
    {
        $this->filters[] = $filter;

        return $this;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function applyFilters(string $input = null): ?string
    {
        $filters = $this->getFilters();

        foreach ($filters as $filter) {
            if ($filter instanceof FilterInterface) {
                if (! $filter->validate($input)) {
                    return null;
                }

                $input = $filter->filter($input);
            }
        }

        return $input;
    }
}
