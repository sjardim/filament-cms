@php
    /* @var \App\Models\Page $page */
@endphp

<x-guest-layout title="{{ $page->title }}" wide="true">
    <x-flexible-hero :page="$page" />

    <div class="content">
        <x-flexible-content-blocks :page="$page"/>
    </div>
</x-guest-layout>
