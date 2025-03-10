 <div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($candidates as $candidate)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{ route('candidates.show', $candidate->id) }}" class="font-bold text-xl hover:text-blue-600">
                    {{$candidate->title}}
                </a>
                <p class="text-gray-500 font-bold text-sm">
                    {{$candidate->company_name}}
                </p>
                <p class="text-gray-500 text-sm">Last day to apply: {{ $candidate->expiring_day->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidates</a>
                <a 
                    href="{{ route('candidates.edit', $candidate->id) }}" 
                    class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Edit
                </a>
                <button 
                    type="button" 
                    wire:click="$dispatch('showAlert', {{ $candidate->id }})" 
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Delete
                </button>
            </div>
        </div> 
        @empty
            <p class="p-3 text-center text-sm text-gray-600">There's no candidates yet!</p>   
        @endforelse
        
        <div class="mt-10">
            {{ $candidates->links() }}
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('showAlert', (candidateId) => {
                    Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteCandidate',candidateId);
                        Swal.fire({
                        title: "Deleted!",
                        text: "Candidate has been deleted.",
                        icon: "success"
                        });
                    }
                    });
                });
            });    
        </script>
    @endpush
</div>   
   