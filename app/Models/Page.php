<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\{HasAuthorAttributeTrait, HasDefaultContentBlocksTrait, HasHeroImageAttributesTrait, HasIntroAttributeTrait, HasOverviewAttributesTrait, HasPageAttributesTrait, HasSEOAttributesTrait, HasSlugAttributeTrait};
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\{HasContentBlocks, HasHeroImageAttributes, HasIntroAttribute, HasMediaAttributes, HasOverviewAttributes, HasPageAttributes, HasSEOAttributes, Linkable};
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Concerns\HasImageEditor;

class Page extends Model implements HasContentBlocks, HasHeroImageAttributes, HasIntroAttribute, HasMedia, HasMediaAttributes, HasOverviewAttributes, HasPageAttributes, HasSEOAttributes, Linkable
{
    use HasFactory;
    use SoftDeletes;
    use HasAuthorAttributeTrait;
    use HasDefaultContentBlocksTrait;
    use HasHeroImageAttributesTrait;
    use HasIntroAttributeTrait;
    use HasOverviewAttributesTrait;
    use HasPageAttributesTrait;
    use HasSEOAttributesTrait;
    use HasSlugAttributeTrait;
    use HasImageEditor;

    public function getViewUrl(string $locale = null): string
    {
        //todo implement controller and add route:
        return route('pages.show', [
            'page' => $this,
        ]);
    }

    public function getPreviewUrl(string $locale = null): string
    {
        return $this->getViewUrl($locale);
    }

}
