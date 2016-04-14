<!-- Full size image -->
@if($module->url_to && !$module->caption)
    <a href="{{ makeUrlToPage($module->url_to) }}">
@endif
        @if($module->caption)
        <div class="hovereffect">
        @endif
            <img src="{{ $module->images[0]->link() }}"
                 data-min-width-768="{{ $module->images[0]->link() }}"
                 data-min-width-0="{{ $module->images[0]->link() . '?w=768' }}"
                 class="img-responsive" alt="">
            @if($module->caption)
                <div class="overlay">
                    <h2>{{ $module->caption }}</h2>
                    @if($module->url_to)
                        <a class="info" href="{{ makeUrlToPage($module->url_to) }}">Ir para o Link</a>
                    @endif
                </div>
            </div>
            @endif

@if($module->url_to && !$module->caption)
    </a>
@endif
<!-- /Full size image -->