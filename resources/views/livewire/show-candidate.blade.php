<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $candidate->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10 rounded-md">
            <p class="text-gray-800 uppercase font-bold text-sm my-3">
                Company:
                <span class="normal-case font-normal"> 
                    {{ $candidate->company_name }}
                </span>
            </p>

            <p class="text-gray-800 uppercase font-bold text-sm my-3">
                Last day to apply:
                <span class="normal-case font-normal"> 
                    {{ $candidate->expiring_day->toFormattedDateString() }}
                </span>
            </p>

            <p class="text-gray-800 uppercase font-bold text-sm my-3">
                Category:
                <span class="normal-case font-normal"> 
                    {{ $candidate->category->category }}
                </span>
            </p>

            <p class="text-gray-800 uppercase font-bold text-sm my-3">
                Salary:
                <span class="normal-case font-normal"> 
                    {{ $candidate->salary->salary }}
                </span>
            </p>
       </div>
       <div class="md:grid md:grid-cols-6 gap-3">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/candidates/' . $candidate->image) }}" alt="{{'Candidate offer image' . $candidate->title}}">
            </div>
            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold mb-5">Offer description</h2>
                <p>{{ $candidate->description}}</p>
            </div>
       </div>
    </div>
    @guest   
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>If you want to apply to this offer create an account
                <a class="text-indigo-600 font-bold" href="{{ route('register') }}">here</a>
            </p>
        </div>
    @endguest
</div>
