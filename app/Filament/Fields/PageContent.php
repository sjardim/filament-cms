<?php

namespace App\Filament\Fields;

use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\ContentBlocksField;

class PageContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ) {
        return ContentBlocksField::create();
    }
}
