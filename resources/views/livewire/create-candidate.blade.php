<form action="" class="w-full md:w-1/2 mx-auto space-y-5">
    <div>
        <x-input-label for="title" :value="__('Offer title')"/>

        <x-text-input 
            id="title"
            class="block mt-1 w-full"
            type="text"
            name="title"
            :value="old('title')"
            placeholder="Offer title"
            />  
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly salary')"/>

        <select 
            id="salary" 
            name="salary" 
            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="" disabled selected>--Choose an option--</option>
            @foreach ($salaries as  $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option> 
            @endforeach

        </select>
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')"/>

        <select 
            id="category" 
            name="category" 
            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="" disabled selected>--Choose an option--</option>
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-input-label for="company_name" :value="__('Company name')"/>

        <x-text-input 
            id="company_name"
            class="block mt-1 w-full"
            type="text"
            name="company_name"
            :value="old('company_name')"
            placeholder="Write the Company name"
            />  
    </div>

    <div>
        <x-input-label for="expiring_day" :value="__('Last day to apply')"/>

        <x-text-input 
            id="expiring_day"
            class="block mt-1 w-full"
            type="date"
            name="expiring_day"
            :value="old('expiring_day')"
            placeholder="Choose the last day to apply to this offer"
            />  
    </div>

    <div>
        <x-input-label for="description" :value="__('Last day to apply')"/>

        <textarea 
            id="description"
            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-72"
            name="description"
            :value="old('description')"
            placeholder="Describe the offer with details, try to be clear to your candidates, they will appreciate it!">
        </textarea>  
    </div>
    <div>
        <x-input-label for="image" :value="__('Imagen')"/>
        <x-text-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            name="image"
            />
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Create new offer') }}
    </x-primary-button>
</form>