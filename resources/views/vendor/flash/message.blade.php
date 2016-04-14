@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal', 
            'title'      => session('flash_notification.title'), 
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert alert-{{ session('flash_notification.level') }}">
            @if(session('flash_notification.level') == 'info')
                <i class="fa fa-info"></i>&nbsp;
            @endif

            @if(session('flash_notification.level') == 'success')
                <i class="fa fa-check"></i>&nbsp;
            @endif

            @if(session('flash_notification.level') == 'warning' || session('flash_notification.level') == 'danger')
                <i class="fa fa-exclamation"></i>&nbsp;
            @endif
            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif

