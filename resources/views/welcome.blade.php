@extends('layouts.base')
@section('title', 'home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item" data-bs-interval="10000">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555"
                        dy=".3em">First slide</text>
                </svg>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444"
                        dy=".3em">Second slide</text>
                </svg>
            </div>
            <div class="carousel-item active">
                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333"
                        dy=".3em">Third slide</text>
                </svg>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="products mw-968 ml-auto mr-auto" id="products">
        <div class="heading d-flex justify-content-around mt-5 ">
            <h1 style="font-family: 'Montserrat';font-weight:bold;">Our Populars<span> products</h1>
            <a href="{{ route('products.index') }}" class="btn btn-success border-0 border rounded-pill w-5 h-25 mt-3">Shop
                Now <i class="bi bi-arrow-right"></i></a>
        </div>
        <br><br>
        <!-- products content -->
        <div class="products-conatiner d-grid gap-3" style="grid-template-columns: repeat(auto-fit,minmax(260px,auto));">
            <!-- box1 -->
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card"
                        style="width: 18rem;box-shadow: 1px 2px 11px 4px rgb(14 55 54 / 15%);background-color: #e3f2fd;">
                        <img src="{{ isset($product->image) ? asset('storage/' . $product->image) : '' }}"
                            class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            {{-- <p class="card-text">{{ $product->description }}</p> --}}
                            <p class="card-text"><strong>Address:</strong> {{ $product->address }}</p>
                            <!-- Assuming address is a field in the product table -->
                            <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p><strong>Price:</strong> {{ $product->price }} DH</p>
                        </div>

                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('orders.create', $product) }}" class="btn btn-success">create order</a>
                        <i class="bi bi-cart" style="background-color: #ddead1 ;color: #000000; " ></i>

                    </div>
                </div>
            @endforeach
        </div>


    </section>

    <section>
        <div class="categories mt-5 z-2">
            <div class="list">
                <div class="item" style="background-image: url(/images/photorealistic-view-cow-grazing-outdoors.jpg);">
                    <div class="content">
                        <div class="title">Animal</div>
                        <div class="name">Products</div>
                        <div class="des">Here you can find everything related to animal products, essential for
                            nutrition and various industries. Explore a wide range of high-quality meats, dairy products,
                            eggs, and fish. Whether you are looking for fresh, organic, or specialty items, we have it all
                            to meet your needs..</div>
                        <div class="btn">
                            <button>See More</button>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image: url(images/snowdrops-coming-out-ground.jpg);">
                    <div class="content">
                        <div class="title">Plant</div>
                        <div class="name">Products</div>
                        <div class="des">Discover an extensive selection of plant products, perfect for a balanced diet
                            and various applications. From fresh fruits and vegetables to nutritious cereals, aromatic
                            herbs, seeds, and legumes, we provide top-quality produce that supports healthy living and
                            culinary creativity.</div>
                        <div class="btn">
                            <button>See More</button>
                        </div>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(/images/end-road-with-beautiful-rainbow-after-rainy-weather.jpg);">
                    <div class="content">
                        <div class="title">Agricultural</div>
                        <div class="name">Machines</div>
                        <div class="des">Equip your farm with state-of-the-art agricultural machines, designed to boost
                            efficiency and productivity. The range includes versatile tractors, efficient combine
                            harvesters, precise sprayers, reliable spreaders, and powerful agricultural mowers. Find the
                            right machinery to streamline your farming operations.</div>
                        <div class="btn">
                            <button>See More</button>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image: url(images/snowdrops-coming-out-ground.jpg);">
                    <div class="content">
                        <div class="title">Agricultural</div>
                        <div class="name">Services</div>
                        <div class="des">Benefit from comprehensive agricultural services tailored to support your
                            farming endeavors. We offer expert advice, soil testing, crop management, and equipment
                            maintenance to ensure your farm operates at its best. Let us help you achieve higher yields and
                            sustainable farming practices.</div>
                        <div class="btn">
                            <button>See More</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--next prev button-->
            <div class="arrows">
                <button class="prev">&lt;</button>
                <button class="next">&gt;</button>
            </div>
            <!-- time running -->
            <div class="timeRunning"></div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const nextBtn = document.querySelector('.next'),
                    prevBtn = document.querySelector('.prev'),
                    categories = document.querySelector('.categories'),
                    list = document.querySelector('.list'),
                    runningTime = document.querySelector('.categories .timeRunning');

                let timeRunning = 3000;
                let timeAutoNext = 7000;
                let isAnimating = false;

                function resetTimeAnimation() {
                    runningTime.style.animation = 'none';
                    runningTime.offsetHeight; /* trigger reflow */
                    runningTime.style.animation = 'runningTime 7s linear 1 forwards';
                }

                function showSlider(type) {
                    if (isAnimating) return;
                    isAnimating = true;

                    const sliderItemsDom = list.querySelectorAll('.item');
                    if (type === 'next') {
                        list.appendChild(sliderItemsDom[0]);
                        categories.classList.add('next');
                    } else {
                        list.prepend(sliderItemsDom[sliderItemsDom.length - 1]);
                        categories.classList.add('prev');
                    }

                    setTimeout(() => {
                        categories.classList.remove('next', 'prev');
                        isAnimating = false;
                    }, timeRunning);

                    clearTimeout(runNextAuto);
                    runNextAuto = setTimeout(() => {
                        nextBtn.click();
                    }, timeAutoNext);

                    resetTimeAnimation();
                }

                nextBtn.addEventListener('click', () => showSlider('next'));
                prevBtn.addEventListener('click', () => showSlider('prev'));

                let runNextAuto = setTimeout(() => {
                    nextBtn.click();
                }, timeAutoNext);

                resetTimeAnimation();
            });
        </script>
    </section>



@endsection
