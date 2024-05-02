{{-- resources/views/filament/resources/vehicle-resource/pages/interact-with-chatgpt.blade.php --}}

<x-filament::page>
    {{ $this->form }}

    @if ($response)
        <div>
            <p>Response from ChatGPT:</p>
            <p>{{ $response }}</p>
        </div>
    @endif
</x-filament::page>

