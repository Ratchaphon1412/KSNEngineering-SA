<x-app-layout>
@if (session('error'))
    <div id="errorAlert" class="alert alert-danger bg-red-500 scrolling-alert">
        {{ session('error') }}
    </div>

    <script>
        // Set the animation duration (in milliseconds)
        const animationDuration = 5000; // 10 seconds

        // Add animation class
        document.getElementById('errorAlert').classList.add('scrolling-animation');

        // Set a timeout to remove the element after the animation duration
        setTimeout(function () {
            document.getElementById('errorAlert').remove();
        }, animationDuration);
    </script>
@endif


    <div class="flex justify-center items-center">
        <div class="min-h-screen bg-gray-200 my-20 w-3/4 rounded-3xl">
            <div class="flex">
                <div class="w-1/3 p-8">
                    <p class="text-4xl text-gray-900 dark:text-white bg-blue-400 p-3 rounded-xl">User</p>
                    <div>
                        @foreach ($users as $user)
                        <form action="{{ route('user.team.edit',['user'=>$user]) }}" method="POST" enctype="multipart/form-data">
                        @csrf        
                            <div class="flex py-5">
                                <p class="text-xl text-gray-900 pl-3 dark:text-white">{{ $user->name }}</p>
                                <select id="selected" name="selected" class="ml-auto my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="0">delete Team</option>
                                    @foreach ($teams as $team)
                                    @if($team == $user->team)
                                    <option selected value="{{ $team->id }}">{{ $team->name }}</option>
                                    @else
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="text-white bg-green-400 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 my-2 ">
                                    change
                                </button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
                <div class="w-2/3 p-8 ">
                    <p class="text-4xl text-gray-900 dark:text-white bg-blue-400 p-3 rounded-xl">Team 
                        <button  type="submit" data-modal-target="payModal" data-modal-toggle="payModal" class="relative inline-flex items-center justify-center overflow-hidden text-sm font-medium text-gray-900 rounded-3xl group bg-gradient-to-br from-blue-200 via-green-400 to-red-200 group-hover:from-blue-200 group-hover:via-green-400 group-hover:to-green-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-green-400">
                            <span class="w-full text-lg font-semibold relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-3xl group-hover:bg-opacity-0">
                                Add Team
                            </span>
                        </button>
                    </p>
                    
                    <div class="flex flex-wrap">
                        @foreach ($teams as $team)
                        <div class="w-1/2 mt-2 mb-2">
                            <div class="bg-amber-200 rounded-xl ml-2 p-2">
                                <p class="text-xl text-gray-900 dark:text-white p-2 rounded-xl bg-amber-300">Team:{{ $team->name }}</p>
                                @foreach ($team->users as $member)
                                <p class="text-xl text-gray-900 dark:text-white ml-2 p-2">{{ $member->name }}</p>
                                @endforeach
                            
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="payModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                             <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 via-sky-400 to-cyan-500">
                                    Create Team
                                </h1>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="payModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <div class="py-20 bg-white px-2">
                                    <div class="flex justify-center items-center">
                                        <div class="w-3/4">
                                            
                                        <form action="{{ route('create.team') }}" method="POST" enctype="multipart/form-data" class="w-10/12">
                                        @csrf
                                        
                                        <input type="text" name="name" id="name" required class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please enter a name">
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="payModal" type="button" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">close</button>
                                  
                                <button type="submit" class="right-5 absolute flex-2 rounded-full bg-green-600 text-white antialiased font-bold hover:bg-green-800 px-12 py-2">Add</button>
                               
                            </form>
                                
                            

                            </div>
                        </div>
                    </div>
                </div>


</x-app-layout>