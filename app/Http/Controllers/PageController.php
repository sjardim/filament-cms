<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{

    public function index(Page $page)
    {
        if (! $page->isPublished()) {
            return abort(404);
        }

        SEOTools::setTitle($page->getSEOTitle());
        SEOTools::setDescription($page->getSEODescription());
        SEOTools::jsonLd()->addImage($page->getSEOImageUrl());
        SEOTools::opengraph()->addImage($page->getSEOImageUrl());


        return view('pages.show', [
            'page' => $page,
            'title' => $page->title,
        ]);
    }

    public function childIndex(Page $parent, Page $page) {

        if(!$parent->isParentOf($page)){
            abort(404);
        }

        return $this->index($page);
    }
}
