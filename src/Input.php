<?php declare (strict_types = 1);

namespace Tokenizer;

use Tokenizer\Filters\RemoveExcessWhitespaceFromStringFilter;
use Tokenizer\Filters\StringFilter;
use Tokenizer\Filters\TrimStringFilter;

class Input implements InputInterface
{
    use IsFilterableTrait;

    private $input = '';

    public function __construct($input = '')
    {
        $this->addFilter(new TrimStringFilter())
            ->addFilter(new RemoveExcessWhitespaceFromStringFilter());

        $this->setInput($input);
    }

    public function __toString()
    {
        return $this->getInput();
    }

    public function setInput($input): InputInterface
    {
        $this->input = (string) (new StringFilter())->filter($input);

        return $this;
    }

    public function getInput(): string
    {
        return (string) $this->applyFilters($this->input);
    }
}
