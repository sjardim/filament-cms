@php
    /* @var \App\Models\Page $page */
@endphp

<div class="bg-yellow-400 py-1 text-center uppercase text-xs font-bold">Preview</div>
<x-guest-layout title="{{ $page->title }}" wide="true">
    <x-flexible-hero :page="$page" />

    <div class="content">
        <x-flexible-content-blocks :page="$page"/>
    </div>
</x-guest-layout>
