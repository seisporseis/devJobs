<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($candidates as $candidate)
    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
        <div class="leading-10">
            <a href="#" class="font-bold text-xl hover:text-blue-600">
                {{$candidate->title}}
            </a>
            <p class="text-gray-500 font-bold text-sm">
                {{$candidate->company_name}}
            </p>
            <p class="text-gray-500 text-sm">Last day to apply: {{ $candidate->expiring_day->format('d/m/Y') }}</p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidates</a>
            <a href="{{ route('candidates.edit', $candidate->id) }}" class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Edit</a>
            <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Delete</a>
        </div>
    </div> 
    @empty
        <p class="p-3 text-center text-sm text-gray-600">There's no candidates yet!</p>   
    @endforelse
    
    <div class="mt-10">
        {{ $candidates->links() }}
    </div>
</div>