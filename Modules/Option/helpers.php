<?php

use Illuminate\Support\HtmlString;
use Modules\Option\Entities\Option;
use Modules\Product\Entities\Product;
use Modules\Option\Entities\OptionValue;

if (! function_exists('option_name')) {
    function option_name(Option $option)
    {
        return new HtmlString($option->name . ($option->is_required ? '<span>*</span>' : ''));
    }
}

if (! function_exists('option_value')) {
    function option_value(Product $product, OptionValue $value)
    {
        $price = $value->priceForProduct($product);

        $formatted = $price->isZero()
            ? ''
            : "+ {$price->convertToCurrentCurrency()->format()}";

        return new HtmlString("{$value->label} <span class='value-price'>{$formatted}</span>");
    }
}
