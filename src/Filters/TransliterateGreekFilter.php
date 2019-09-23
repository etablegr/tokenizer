<?php declare(strict_types=1);

namespace Tokenizer\Filters;

/**
 * See: https://gist.github.com/alxarch/1371282
 */
class TransliterateGreekFilter extends StringFilter implements FilterInterface
{
    public const REPLACEMENTS =
        [
            '/(μπ)/u'                         => 'b',
            '/(ντ)/u'                         => 'd',
            '/(τζ)/u'                         => 'j',
            '/(γκ)/u'                         => 'g',
            '/(Μπ)/u'                         => 'B',
            '/(Ντ)/u'                         => 'D',
            '/(Τζ)/u'                         => 'J',
            '/(Γκ)/u'                         => 'G',
            '/(Oι|Οί|Ει|Εί|[ΙΊΗΉ]|Υι|Υί)/u'   => 'I',
            '/(Αι|Αί|[ΕΈ])/u'                 => 'E',
            '/(oι|oί|ει|εί|[ιΐϊίηή]|υι|υί)/u' => 'i',
            '/(αι|αί|[εέ])/u'                 => 'e',
            '/(ου|ού)/u'                      => 'ou',
            '/(Ου|Ού)/u'                      => 'Ou',
            '/[όο]/u'                         => 'o',
            '/[ωώ]/u'                         => 'w',
            '/[αά]/u'                         => 'a',
            '/β/u'                            => 'v',
            '/γ/u'                            => 'g',
            '/δ/u'                            => 'd',
            '/ζ/u'                            => 'z',
            '/θ/u'                            => 'th',
            '/κ/u'                            => 'k',
            '/(λλ)/u'                         => 'l',
            '/λ/u'                            => 'l',
            '/μ/u'                            => 'm',
            '/ν/u'                            => 'n',
            '/ξ/u'                            => 'x',
            '/π/u'                            => 'p',
            '/ρ/u'                            => 'r',
            '/[σς]/u'                         => 's',
            '/τ/u'                            => 't',
            '/[υΰϋύ]/u'                       => 'y',
            '/φ/u'                            => 'f',
            '/χ/u'                            => 'h',
            '/ψ/u'                            => 'ps',
            '/[ΌΟ]/u'                         => 'O',
            '/[ΩΏ]/u'                         => 'W',
            '/[ΑΆ]/u'                         => 'A',
            '/Β/u'                            => 'V',
            '/Γ/u'                            => 'G',
            '/Δ/u'                            => 'D',
            '/Z/u'                            => 'Z',
            '/Θ/u'                            => 'Th',
            '/Κ/u'                            => 'K',
            '/Λ/u'                            => 'L',
            '/Μ/u'                            => 'M',
            '/Ν/u'                            => 'N',
            '/Ξ/u'                            => 'X',
            '/Π/u'                            => 'P',
            '/Ρ/u'                            => 'R',
            '/Σ/u'                            => 'S',
            '/Τ/u'                            => 'T',
            '/[ΥΎΫ]/u'                        => 'Y',
            '/Φ/u'                            => 'F',
            '/Χ/u'                            => 'H',
            '/Ψ/u'                            => 'Ps',
        ];

    public function filter($value)
    {
        $value = parent::filter($value);

        if (! is_string($value)) {
            return null;
        }

        return preg_replace(array_keys(self::REPLACEMENTS), array_values(self::REPLACEMENTS), $value);
    }
}
