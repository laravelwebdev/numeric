<?php

namespace Laravelwebdev\Numeric;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;

class Numeric extends Field
{
    use SupportsDependentFields;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'numeric';

    /**
     * The text alignment for the field's text in tables.
     *
     * @var string
     */
    public $textAlign = 'right';

    /**
     * Set the hues that may be selected by the color picker.
     *
     * @return $this
     */
    public function separator(string $separator)
    {
        return $this->withMeta(['separator' => $separator]);
    }
}
