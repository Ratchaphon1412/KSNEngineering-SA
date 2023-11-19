<div class="w-full">    
    <form class="w-full max-w-lg" wire:submit.prevent="save">

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full mb-6 md:mb-0">
            <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Title <span class="text-red-500">*</span>
            </label>
            <input id="title" wire:model="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Repair Title">
            @error('title')
              <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full">
            <label for="details" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
              Details <span class="text-red-500">*</span>
            </label>

            <textarea id="details" wire:model="details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>
            @error('details')
              <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
         <label for="image" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
            Images <span class="text-red-500">*</span>
         </label>
         <div class="flex items-center justify-center w-full">
              <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
               <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
               </div>
               <input id="dropzone-file"   wire:model="image" type="file" class="hidden" />
            </label>
         </div> 
           @if($image)
              <img id="preview-image" class="w-full h-full mb-4 " src="{{$image->temporaryUrl()}}" alt="">
           @endif

           @error('image')
              <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
      </div>
      <div class="w-full mb-6 md:mb-0">
         <!-- <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
            Company
         </label> -->
            @livewire('search-company')
         <livewire:card-company :company="$selectedCompany" wire:key="{{$selectedCompany}}"/>
      </div>
   
      <div class="w-full mb-6 md:mb-0 mt-4">               
         <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Crane</label>
         @isset($selectedCompany->cranes)
            <select id="countries" wire:model.live="crane_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <option selected>Not Select Crane</option>
                  {{-- {{$selectedCompany->cranes}} --}}
               @foreach ($selectedCompany->cranes as $crane)
                  <option value="{{$crane->id}}">{{$crane->name}}</option>
               @endforeach
            </select>
         @else
         <p class="text-gray-700 text-md text-xs tracking-wide">No Crane</p>
         @error('crane_id')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
         @enderror

         @endisset
      </div>

      @if($selectedCrane)
         @foreach ($selectedCompany->cranes as $crane)
            @if($crane->id == $selectedCrane)
               
               @if($crane->waranty >= now())
                  <div class="w-full px-3 mb-6 md:mb-0 mt-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg">
                        <p class="text-center text-green-700 text-lg tracking-wide">
                           the crane has waranty
                        </p>
                  </div>
               @else
                  <div class="w-full px-3 mb-6 md:mb-0 mt-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg">
                        <p class="text-center text-red-700 text-lg tracking-wide">
                           the crane has not waranty
                        </p>
                        <p class="text-center text-lg tracking-wide">
                           Crane expired in <br> {{$crane->waranty}}
                        </p>
                  </div>
               @endif
               @break
            @endif
         @endforeach
      @endif
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5 text-center my-4">Submit</button>
   </form>
</div>