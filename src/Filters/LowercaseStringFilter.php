<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class LowercaseStringFilter extends StringFilter implements FilterInterface
{
    public function filter($value)
    {
        $value = parent::filter($value);

        if (! is_string($value)) {
            return null;
        }

        return mb_strtolower($value);
    }
}
