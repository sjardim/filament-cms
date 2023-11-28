@if($repeater_items)
    <aside class="py-12 section section--default max-w-4xl mx-auto {{ $getBackgroundColourClass() }}">
        <div class="mx-auto">

            @if($main_title)
               <p class="text-3xl text-center font-light text-gray-700 px-3 relative -top-5">{{$replaceParameters($main_title)}}</p>
           @endif

           @if($summary)
               <div class="mb-10 px-3 text-center md:text-lg text-gray-700 [text-wrap:balance]">
                   {!! $replaceParameters($summary)  !!}
               </div>
           @endif

            @foreach($repeater_items as $item)

                    <details class="border-b transition-colors hover:bg-white cursor-pointer open:bg-white
                    [&_summary]:open:mb-5
                    [&_svg]:open:-rotate-180
                    [&_svg]:open:transition-transform
                    [&_svg]:open:ease-out
                    [&_svg]:open:duration-300" title="Expand">

                        <summary class="flex items-center font-bold px-3 py-5 focus:outline-none focus:ring focus:bg-white transition-margin duration-200 ease-in-out">
                            @if($item['title'])
                                <h3>{{$replaceParameters($item['title'])}}</h3>
                            @endif
                            <button aria-disabled="true" tabindex="-1" class="ml-auto focus:outline-none">
                                <x-heroicon-o-chevron-down class="w-5 h-5" />
                            </button>
                        </summary>

                        <div class="-mt-2 px-3 pb-3 prose max-w-none bg-white">
                            {!! $replaceParameters($item['content']) !!}</div>
                    </details>

            @endforeach
        </div>
    </aside>
@endif
