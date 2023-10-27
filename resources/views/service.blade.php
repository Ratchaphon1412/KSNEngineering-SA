<x-app-layout>
    <div class="w-full md:h-[50vh] bg-cover bg-fixed bg-bottom bg-no-repeat shadow-xl" 
        style="background-image: url('assets/images/crane-hero.jpg')">
        <div class="bg-black bg-opacity-20 w-full h-full py-[25%] md:py-0">
            <div class="container mx-auto flex flex-col md:justify-center md:items-center text-center h-full space-y-4">
                <div class="uppercase font-extrabold text-4xl text-transparent bg-clip-text bg-[#03045E]">
                    services & MAINTENANCE
                </div>
                <div class="text-white text-xl md:px-64" id="intro">
                    การตรวจเช็คเครนและอุปกรณ์ช่วยยกอย่างสม่ำเสมอจะทำให้การปฏิบัติงานเป็นไปอย่างราบรื่น และ สร้างความปลอดภัยในการทำงาน
                </div>
            </div>
        </div>
    </div>

    <div class="text-center text-4xl font-extrabold my-20">
        <span>“พวกเรา</span>
        <span class="text-amber-400">เต็มใจ</span>
        <p class="text-amber-400">เต็มที่</p>
        <span class="text-amber-400">เต็มคุณภาพ</span>
        <span>“</span>
    </div>
    
    <div class="bg-white">
        <div class="container mx-auto">
            <div class="flex justify-between py-12">
                <p class="text-3xl font-extrabold indent-10">Prepare</p>
            </div>
            <hr class="border border-2 border-black rounded-full">
            <!-- content -->
            <div class="flex flex-col md:flex-row justify-between py-12">
                <img src="assets/slide/crane.jpg" alt="" class="object-cover rounded-lg md:w-96">
                <div class="p-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi iure illo cumque eius, odit aliquid unde eum esse. Quidem incidunt, illo itaque et cupiditate nesciunt. Deserunt, ab. Iure enim repellendus, perspiciatis velit facilis nulla eum, officia delectus tempora quia voluptas.
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between py-10">
                <div class="p-10 order-last md:order-none">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi iure illo cumque eius, odit aliquid unde eum esse. Quidem incidunt, illo itaque et cupiditate nesciunt. Deserunt, ab. Iure enim repellendus, perspiciatis velit facilis nulla eum, officia delectus tempora quia voluptas.
                </div>
                <img src="assets/slide/keeping.jpg" alt="" class="object-cover rounded-lg md:w-96">
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="container mx-auto">
        <div class="flex justify-between my-12">
            <p class="text-3xl font-extrabold indent-10">Working</p>
        </div>
        <hr class="border border-2 border-black rounded-full">
        <p class="text-center my-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quam labore fugit soluta beatae harum, nostrum laborum quis animi necessitatibus.</p>
        <div class="flex flex-col md:flex-row justify-center md:space-x-3 space-y-5">
            <img src="assets/slide/prepare.jpg" alt="" class="rounded-lg md:w-96">
            <img src="assets/slide/sendingProduct.jpg" alt="" class="rounded-lg md:w-96">
            <img src="assets/slide/product.jpg" alt="" class="rounded-lg md:w-96">
        </div>
    </div>
    

    <style scoped>

    #type{
        width: 22ch;
        animation: typing 2s steps(8), blink .5s step-end infinite alternate;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid;
    }

    @keyframes typing{
        from {
            width: 0
        }
    }

    @keyframes blink {
        50%{
            border-color: transparent
        }
    }

    #intro{
        animation: intro 1.5s;
    }

    @keyframes intro{
        0% {
        transform: translateY(25%);
    }
    100% {
        transform: translateY(0);
    }
    }

    </style>
</x-app-layout>