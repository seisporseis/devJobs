<div class="bg-gray-100 p-5 mt-10 flex flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to this offer</h3>
    @if(session()->has('message'))
        <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3">
            {{ session('message') }}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent="apply">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Your resume in PDF')" />
                <x-text-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model="cv" />
            </div>
            @error('cv')
                <livewire:show-alert :message="$message"/>
            @enderror

            <x-primary-button class="mt-5">
                {{ __('Apply') }}
            </x-primary-button>
        </form>
    @endif
    
</div>
