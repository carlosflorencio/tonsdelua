<div class="slide-container">
    <ul class="slide">
        @foreach($module->images as $image)
            <li>
                @if($module->url_to)
                    <a href="{{ makeUrlToPage($module->url_to) }}">
                @endif
                    <img src="{{ $image->link()  }}"
                         data-min-width-768="{{ $image->link() }}"
                         data-min-width-0="{{ $image->link() . '?w=768' }}"
                         alt="">
                @if($module->url_to)
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>