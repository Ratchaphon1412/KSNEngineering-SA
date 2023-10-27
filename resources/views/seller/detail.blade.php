<x-app-layout>

    <div class="flex justify-center">
        <div class="flex justify-between w-9/12">
            <div class="w-full mb-16">
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4 place-items-center">
                
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                    </div>
                
                    
                    
                </div>
            </div>
            <div class="flex flex-col w-1/2 ml-16">
                <div class="flex flex-col w-full p-4 rounded-lg bg-white outline outline-blue-400">
                    <div class="text-xl font-semibold my-2">{{ $repair->name }}</div>
                    <div class="text-lg font-medium my-2">Company: <div class="font-normal bg-blue-200 rounded-lg px-4">{{ $repair->company()->get()[0]->name }}</div></div>
                    <div class="text-lg font-medium my-2">Detail: <div class="font-normal bg-blue-200 rounded-lg px-4 py-2">{{ $repair->description }}</div></div>
                    
                    <div class="outline-blue-600 outline outline-2 p-4 mt-4 rounded-md">
                        <div class="my-2"><div class="font-medium">Todo date</div>
                        <div class="text-sm"><i class="fa-solid fa-circle" style="color: green"></i> {{$repair->task()->get()[0]->todo_date}}</div></div>
                        
                    </div>
                </div>
                <a href="{{ route('task.edit.view',['repair'=>$repair]) }}" class="font-bold w-full outline outline outline-1 py-3 px-4 flex items-center justify-center mt-5 mb-2 rounded-full text-white" style="background: #227f">technician</a>
                <a href="" class="font-bold w-full outline outline outline-1 py-3 px-4 flex items-center justify-center my-2 rounded-full text-white bg-orange-500" >Quataion</a>

                <form action="#" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="event" value=`{{ $repair->id }}` >
                    <button type="submit" class="font-bold  w-full outline outline outline-1 py-3 px-4 flex items-center justify-center my-2 rounded-full text-white bg-green-500">Approve</button>
                </form>
                <form action="" method="POST" class="w-full">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="delete_event" value="true">
                    <button type="submit" class="font-bold  w-full outline outline outline-1 p-3 flex items-center justify-center my-2 rounded-full text-white" style="background: red">Delete Event</button>
                </form>



            </div>
        </div>
    </div>


</x-app-layout>
