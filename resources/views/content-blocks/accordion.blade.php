@if($repeater_items)
    <aside class="py-12 section section--default max-w-4xl mx-auto {{ $getBackgroundColourClass() }}">
        <div class="container px-4 pb-4 mx-auto border border-gray-300">

            @if($main_title)
               <p class="text-2xl font-bold bg-gray-100 px-1 relative -top-5 inline-block">{{$replaceParameters($main_title)}}</p>
           @endif

           @if($summary)
               <div class="mb-2">
                   {!! $replaceParameters($summary)  !!}
               </div>
           @endif

            @foreach($repeater_items as $item)

                    <details class="border-b transition-colors hover:bg-gray-100 cursor-pointer open:bg-white
                    [&_svg]:open:-rotate-180
                    [&_svg]:open:transition-transform
                    [&_svg]:open:ease-out
                    [&_svg]:open:duration-300" title="Expand">

                        <summary class="flex items-center font-bold p-3 my-3 focus:outline-none focus:ring focus:bg-white">
                            @if($item['title'])
                                <h3>{{$replaceParameters($item['title'])}}</h3>
                            @endif
                            <button aria-disabled="true" tabindex="-1" class="ml-auto focus:outline-none">
                                <x-heroicon-o-chevron-down class="w-5 h-5" />
                            </button>
                        </summary>

                        <div class="-mt-2 p-4 prose max-w-none bg-white">
                            {!! $replaceParameters($item['content']) !!}</div>
                    </details>

            @endforeach
        </div>
    </aside>
@endif
