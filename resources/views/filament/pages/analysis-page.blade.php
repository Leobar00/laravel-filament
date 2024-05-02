{{-- resources/views/filament/pages/analysis-page.blade.php --}}

<x-filament::page>
    <form wire:submit.prevent="analyze" name="test">
        {{ $this->form }}
        <x-filament::button type="submit" class="mt-4">
            Analyze
        </x-filament::button>
    </form>
</x-filament::page>
