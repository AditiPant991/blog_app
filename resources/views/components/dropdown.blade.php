@props(['triggers'])

<div x-data="{show: false}" @click.away="show = false">
                    
        <!-- triggers -->
             <div @click="show =! show">
                {{$triggers}}

             </div>

                    <!-- links -->
                    <div x-show="show" class="py-2 absolute bg-grey-100 nt-2 rounded-xl w-full rounded-xl z-50 overflow-auto max-h-52" style="display:none">
                    {{$slot}}
                    </div>
                </div> 