@php
    $type = $type ?? 'note';
    $title = $title ?? (
        $type === 'warning' ? 'Advertencia' : (
        $type === 'danger' ? 'Importante' : (
        $type === 'success' ? 'Hecho' : (
        $type === 'info' ? 'Info' : 'Nota')))
    );
@endphp

<div class="callout {{ $type }}" role="note" aria-label="{{ $title }}">
    <div class="callout__icon" aria-hidden="true">
        @switch($type)
            @case('warning')
            @case('danger')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.721-1.36 3.486 0l6.518 11.596c.75 1.336-.213 3.005-1.743 3.005H3.482c-1.53 0-2.494-1.67-1.743-3.005L8.257 3.1zM11 14a1 1 0 10-2 0 1 1 0 002 0zm-1-2a1 1 0 01-1-1V8a1 1 0 112 0v3a1 1 0 01-1 1z" clip-rule="evenodd"/>
                </svg>
                @break
            @case('success')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.172 7.707 8.879a1 1 0 10-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                @break
            @case('info')
            @case('note')
            @default
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 11.001 10 8 8 0 0118 10zM9 7a1 1 0 112 0 1 1 0 01-2 0zm0 3a1 1 0 000 2h1v3a1 1 0 102 0v-4a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
        @endswitch
    </div>
    <div class="callout__body">
        <div class="title">{{ $title }}</div>
        <div class="content">{!! $slot ?? ($body ?? '') !!}</div>
    </div>
    
</div>
