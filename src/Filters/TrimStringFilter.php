<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class TrimStringFilter extends StringFilter implements FilterInterface
{
    public function filter($value)
    {
        $value = parent::filter($value);

        if (! is_string($value)) {
            return null;
        }

        return trim($value);
    }
}
