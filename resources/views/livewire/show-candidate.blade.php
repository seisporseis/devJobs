<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $candidate->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10">
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
       
    </div>
</div>
