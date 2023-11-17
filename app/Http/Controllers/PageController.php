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


        return view('page.index', [
            'page' => $page,
            'title' => $page->title,
        ]);
    }

    public function childIndex(Page $parent, Page $page) {
        //check if the page is a child of the parent
        if(!$parent->isParentOf($page)){
            abort(404);
        }

        //render the page with the regular page index function of the controller, or invoke the correct controller here:
        return $this->index($page);
    }
}
