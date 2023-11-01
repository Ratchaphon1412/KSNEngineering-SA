<x-app-layout>

    <main class="flex-col justify-center items-center">

        <section id="coverImage" class="justify-center items-center h-[88vh] overflow-x-hidden bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat ">

            <div class="main-wrapper">
                <div class="container">
                    <div class="product-div">
                        <div class="product-div-left">
                            <div class="img-container">
                                @if(Str::contains($images->first()->imageUrl, 'https:') != 1)
                                    <figure id="magnifying_area" class="mx-auto">
                                        <img src="{{ asset('storage/product/' . $images->first()->imageUrl) }}" alt="watch" id="magnifying_img">
                                    </figure>
                                @else
                                {{-- link https --}}
                                    <figure id="magnifying_area" class="mx-auto">
                                        <img src="{{ $images->first()->imageUrl }}" alt="watch" id="magnifying_img">
                                    </figure>
                                @endif
                            </div>
                            <div class="hover-container">
                                @foreach($images as $image)
                                    @if(Str::contains($image->imageUrl, 'https:') != 1)
                                        <div>
                                            <img src="{{ asset('storage/product/' . $image->imageUrl) }}" alt="">
                                        </div>
                                    @else
                                        {{-- link https --}}
                                        <div>
                                            <img src="{{ $image->imageUrl }}" alt="">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="product-div-right">
                            <div class="flex justify-between">
                                <span class="product-name underline underline-offset-8">{{ $product->name }}</span>
                                @if(Auth::user()->name == 'admin')
                                    <a href="{{ route('product.update', ['product' => $product]) }}" 
                                       class="mb-5 tracking-wide rounded-xl bg-amber-500 p-2 text-lg text-white">แก้ไข</a>
                                @endif
                            </div>

                            
                            <span class="product-price">จำนวนสินค้าที่มีอยู่ {{ $product->amount }} ชิ้น</span>
                            <span class="product-price">ชิ้นละ {{ $product->price }} บาท</span><br>
                            <p class="product-price">คำอธิบาย :</p>
                            <p class="mt-3 px-4 product-price">{{ $product->description }}</p>
                            <div class="btn-groups">
                                <button type="button" class="add-cart-btn"><i class="fas fa-shopping-cart"></i>add to cart</button>
                                <button type="button" class="buy-now-btn"><i class="fas fa-wallet"></i>buy now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="flex flex-col justify-center items-center  bg-black rounded-lg relative p-12   w-auto overflow-hidden backdrop-filter backdrop-blur-sm bg-opacity-10 ">
                <div class="grid grid-cols-1 md:grid-cols-2 backdrop-filter backdrop-blur-sm bg-opacity-80 -m-8 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-3/4  drop-shadow-lg">
                    <div class=""></div>
                    <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146"  alt=""
                    class="w-full h-full object-cover">
                    <div class="hover-container">
                        <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146"  alt=""
                        class="">
                        <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146"  alt=""
                        class="">
                        <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146"  alt=""
                        class="">
                    </div>
                    <div class="div-right">
                        <div id="text Title" class="flex justify-center items-center ">
                            <div id="text" class="p-6 flex-col  justify-center items-center space-y-4  gap-4">
                                <div>
                                    <p class="text-base"></p>
                                    <h2 class="text-3xl font-black">รอกโซ่ไฟฟ้า รุ่น ER2</h2>
                                </div>
                                <div class="flex flex-row ">
                                    <i class="bi bi-calendar-week font-bold mr-2"></i>
                                    <p class="product-price">
                                    ฿100000
                                    </p>
                                </div>
                                <div class="flex flex-row mb-4">
                                    <i class="bi bi-geo-alt-fill mr-2"></i>
                                    <p class="w-3/4">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea voluptas blanditiis adipisci autem repellat commodi magnam cupiditate vel eum itaque reiciendis officia dolore maiores, voluptate eius magni accusamus non suscipit!

                                    </p>
                                </div>
                                
                                <button id="joinButton"  class="py-2.5 px-5 mr-2 mb-2  text-sm font-medium  focus:outline-none text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Join

                                </button>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- <div class="container mx-auto">
            <div id="myTabContent">
                <div class="hidden" id="detail" role="tabpanel" aria-labelledby="detail-tab">

                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approve" role="tabpanel" aria-labelledby="approve-tab">

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem optio, molestias, neque natus quas eius voluptate adipisci quaerat iste reprehenderit a consequuntur, repudiandae quidem fuga error. Earum eum maxime reprehenderit

                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="manage" role="tabpanel" aria-labelledby="manage-tab">



                </div>


                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="payment" role="tabpanel" aria-labelledby="payment-tab">

                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="kanban" role="tabpanel" aria-labelledby="kanban-tab">

                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="question" role="tabpanel" aria-labelledby="question-tab">

                </div>


            </div>

        </div>

        <div>
            <section id="Title" class="w-full text-center py-10 space-y-4">
                <h1 class="mt-5 text-2xl md:text-4xl lg:text-5xl"></h1>
                <div class="flex flex-row justify-center">
                    <i class="bi bi-calendar-week font-bold mr-2"></i>
                    <p class=" leading-tight  text-base ">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sit assumenda tenetur voluptate dolor doloribus porro sunt suscipit eveniet vel placeat, distinctio, atque deleniti! Delectus ipsa tempora dicta ut in.
                    </p>
                </div>
                <div class="flex flex-row  justify-center">
                    <i class="bi bi-geo-alt-fill mr-2"></i>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius optio quod quae ducimus, inventore repudiandae vero incidunt fuga magnam nostrum nisi sint officiis sapiente ullam laborum eligendi in eos.
                    </p>
                </div>

                <hr class="mt-5">
            </section>
            <section id="Image" class="flex flex-col justify-center items-center  first-letter w-full">
                <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146" alt="Mountain" class="w-1/2 h-1/2 object-cover">

            </section>
            <section id="Detail">
                <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
                <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dolorem fugit ullam culpa? Nulla velit alias libero officiis delectus facere blanditiis ea commodi minima, tempore ullam, non iusto officia et!
                </p>
            </section>

            <section class="flex flex-col justify-center items-center gap-4  mt-4">

                <img src="https://down-th.img.susercontent.com/file/9d6122f071e4a758678bc6579a658146" class="w-3/4 h-full object-cover" alt="">

            </section>




            <section id="Contact" class="flex flex-col justify-center w-full space-y-4">
                <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Service</h1>
                <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio amet consequuntur quibusdam sint mollitia reiciendis perferendis perspiciatis repellat modi dignissimos. Exercitationem ipsum adipisci quam enim libero rerum vel, molestiae corrupti.
                </p>
            </section>


        </div> -->
    </main>





</x-app-layout>
<script>
    const allHoverImages = document.querySelectorAll('.hover-container div img');
    const imgContainer = document.querySelector('.img-container');

    window.addEventListener('DOMContentLoaded', () => {
        allHoverImages[0].parentElement.classList.add('active');
    });

    allHoverImages.forEach((image) => {
        image.addEventListener('mouseover', () => {
            imgContainer.querySelector('img').src = image.src;
            resetActiveImg();
            image.parentElement.classList.add('active');
        });
    });

    function resetActiveImg() {
        allHoverImages.forEach((img) => {
            img.parentElement.classList.remove('active');
        });
    }
    // zoom image

    var magnifying_area = document.getElementById("magnifying_area");
    var magnifying_img = document.getElementById("magnifying_img");

    magnifying_area.addEventListener("mousemove", (e) => {
        
        const x = e.clientX - e.target.offsetLeft;
        const y = e.clientY - e.target.offsetTop;

        magnifying_img.style.transformOrigin = `${x}px ${y}px`;
        magnifying_img.style.transform = "scale(2)"
    });

    magnifying_area.addEventListener("mouseleave", function(){
        magnifying_img.style.transformOrigin = "center";
        magnifying_img.style.transform = "scale(1)";
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');
    #magnifying_area{
        display: flex;
        height: fit-content;
        width: fit-content;
        overflow:hidden;
    }
    #manifying_img{
        transform-origin: center;
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    html,
    body {
        font-family: 'Roboto', sans-serif;
    }

    img {
        width: 100%;
        display: block;
    }

    .main-wrapper {
        min-height: 100%;
        background-color: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        max-width: 1200px;
        padding: 0 1rem;
        margin: 0 auto;
    }

    .product-div {
        margin: 1rem 0;
        padding: 2rem 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        background-color: #fff;
        border-radius: 3px;
        column-gap: 10px;
    }

    .product-div-left {
        padding: 20px;
    }

    .product-div-right {
        padding: 20px;
    }

    .img-container img {
        width: 200px;
        margin: 0 auto;
    }

    .hover-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-top: 32px;
    }

    .hover-container div {
        border: 2px solid rgba(252, 160, 175, 0.7);
        padding: 1rem;
        border-radius: 3px;
        margin: 0 4px 8px 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .active {
        border-color: rgb(255, 145, 163) !important;
    }

    .hover-container div:hover {
        border-color: rgb(255, 145, 163);
    }

    .hover-container div img {
        width: 50px;
        cursor: pointer;
    }

    .product-div-right span {
        display: block;
    }

    .product-name {
        font-size: 26px;
        margin-bottom: 22px;
        font-weight: 700;
        letter-spacing: 1px;
        opacity: 0.9;
    }

    .product-price {
        font-weight: 700;
        font-size: 24px;
        opacity: 0.9;
        font-weight: 500;
    }

    .product-rating {
        display: flex;
        align-items: center;
        margin-top: 12px;
    }

    .product-rating span {
        margin-right: 6px;
    }

    .product-description {
        font-weight: 18px;
        line-height: 1.6;
        font-weight: 300;
        opacity: 0.9;
        margin-top: 22px;
    }

    .btn-groups {
        margin-top: 22px;
    }

    .btn-groups button {
        display: inline-block;
        font-size: 16px;
        font-family: inherit;
        text-transform: uppercase;
        padding: 15px 16px;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-groups button .fas {
        margin-right: 8px;
    }

    .add-cart-btn {
        background-color: #FF9F00;
        border: 2px solid #FF9F00;
        margin-right: 8px;
    }

    .add-cart-btn:hover {
        background-color: #fff;
        color: #FF9F00;
    }

    .buy-now-btn {
        background-color: #000;
        border: 2px solid #000;
    }

    .buy-now-btn:hover {
        background-color: #fff;
        color: #000;
    }

    @media screen and (max-width: 992px) {
        .product-div {
            grid-template-columns: 100%;
        }

        .product-div-right {
            text-align: center;
        }

        .product-rating {
            justify-content: center;
        }

        .product-description {
            max-width: 400px;
            margin-right: auto;
            margin-left: auto;
        }
    }

    @media screen and (max-width: 400px) {
        .btn-groups button {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>