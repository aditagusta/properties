@extends('layouts.master')
@section('title', 'Detail Property')
@section('content')

    <x-nav-property :about="$about" />
    <div class="mt-[164px] flex flex-col gap-5 text-center items-center">
            {{-- <p class="flex items-center gap-[6px] rounded-full py-[6px] px-3 bg-white border border-tedja-border">
                 <img src="{{ asset('assets/images/icons/crown.svg') }}" class="flex shrink-0 size-5" alt="icon">
                 <span class="font-semibold text-sm">Top Well-Designed House by Anggga Ark</span>
            </p> --}}
            <h1 class="font-bold text-4xl leading-[54px]">{{ $property->name }}</h1>
            <div class="flex items-center justify-center gap-5">
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/location.svg') }}" class="size-6 flex shrink-0" alt="icon">
                    <p class="font-semibold">{{ $property->city->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/security-user.svg') }}" class="size-6 flex shrink-0" alt="icon">
                    <p class="font-semibold">Certified Developer</p>
                </div>
            </div>
        </div>
        <section id="Gallery" class="flex gap-5 w-full max-w-[1280px] h-[450px] px-[75px] mt-[50px] mx-auto">
            <button class="show-modal-btn relative group flex w-full h-[450px] rounded-[30px] overflow-hidden">
                <img  src="{{ Storage::url($property->thumbnail) }}" class="w-full h-full object-cover" alt="house thumbnail">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <img src="{{ asset('assets/images/icons/eye-white-fill.svg') }}" class="size-[50px]" alt="icon">
                </div>
            </button>
            <div class="grid grid-cols-2 gap-5 w-[450px] shrink-0">
                @foreach ($property->photos as $photo)
                    <button class="show-modal-btn relative group flex size-[215px] shrink-0 rounded-[22px] overflow-hidden">
                        <img src="{{ Storage::url($photo->photo) }}" class="w-full h-full object-cover" alt="house details">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <img src="{{ asset('assets/images/icons/eye-white-fill.svg') }}" class="size-[50px]" alt="icon">
                        </div>
                    </button>
                @endforeach


            </div>
        </section>
        <section id="specs" class="w-full max-w-[1280px] px-[75px] mt-[30px] mx-auto">
            <div class="flex items-center justify-between rounded-[20px] border border-tedja-border py-5 px-[30px] bg-white">
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Bedroom</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/slider-vertical.svg') }}" class="size-6 flex shrink-0" alt="icon">
                        <p class="font-semibold">{{ $property->bedrooms }} Bedroom</p>
                    </div>
                </div>
                <div class="h-[60px] border border-tedja-border"></div>
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Bathroom</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/slider-vertical.svg') }}" class="size-6 flex shrink-0" alt="icon">
                        <p class="font-semibold">{{ $property->bathrooms }} Bathroom</p>
                    </div>
                </div>
                <div class="h-[60px] border border-tedja-border"></div>
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Certificate</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="size-6 flex shrink-0" alt="icon">
                        <p class="font-semibold">{{ $property->certificate }}</p>
                    </div>
                </div>
                <div class="h-[60px] border border-tedja-border"></div>
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Land of Area</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/maximize-3.svg') }}" class="size-6 flex shrink-0" alt="icon">
                    <p class="font-semibold">{{ $property->land_area }} M²</p>
                    </div>
                </div>
                <div class="h-[60px] border border-tedja-border"></div>
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Land of Building</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/building-3.svg') }}" class="size-6 flex shrink-0" alt="icon">
                        <p class="font-semibold">{{ $property->building_area }} M²</p>
                    </div>
                </div>
                <div class="h-[60px] border border-tedja-border"></div>
                <div class="flex flex-col w-fit gap-3">
                    <p class="text-sm text-tedja-secondary">Electric Power</p>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/flash.svg') }}" class="size-6 flex shrink-0" alt="icon">
                        <p class="font-semibold">{{ $property->electric_power }} Watt</p>
                    </div>
                </div>
            </div>
        </section>


        <section id="Details" class="w-full flex gap-[70px] max-w-[1280px] px-[75px] my-[50px] mx-auto">
            <div class="flex flex-col gap-[30px]">
                <div id="About" class="flex flex-col gap-[14px]">
                    <h2 class="font-semibold text-[22px] leading-[33px]">About Project</h2>
                    <p class="leading-8">{{ $property->about }}</p>
                </div>
                <div id="Nerby-Facilities" class="flex flex-col gap-[14px]">
                    <h2 class="font-semibold text-[22px] leading-[33px]">Nearby Facilities</h2>
                    <div class="grid grid-cols-4 gap-5">
                        @foreach ($property->facilities as $facility)
                            <div class="flex flex-col min-h-[140px] rounded-[20px] border border-tedja-border p-5 gap-5 bg-white">
                                <img src="{{ Storage::url($facility->facility->photo) }}" class="size-8 flex shrink-0" alt="icon">
                                <p class="font-semibold">{{ $facility->facility->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="Location" class="flex flex-col gap-[14px]">
                    <h2 class="font-semibold text-[22px] leading-[33px]">Strategic Location</h2>
                    <div class="overflow-hidden w-full h-[320px]">
                        <div id="my-map-display" class="h-full w-full max-w-[none] bg-none">
                            <iframe class="h-full w-full border-0" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=jakarta&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-[400px] shrink-0 h-fit rounded-[30px] border border-tedja-border p-5 gap-5 bg-white">
                <p class="font-bold text-[38px] leading-[57px] text-center text-tedja-blue">Rp {{ number_format($property->price, 0, ',', '.') }}</p>
                <hr class="border-tedja-border">

                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-[6px]">
                        <!-- Foto Agen -->
                        <div class="flex rounded-full size-[50px] overflow-hidden">
                            <img src="{{ Storage::url($agen->photo) }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <!-- Nama & Nomor -->
                        <p class="font-semibold flex items-center gap-2">
                            {{ $agen->name }}
                            <span class="flex items-center gap-1 text-gray-600">
                                <img src="{{ asset('assets/images/icons/telephone.png') }}" class="size-5 flex shrink-0" alt="icon">
                                {{ $agen->phone }}
                            </span>
                        </p>
                    </div>
                </div>

                <hr class="border-tedja-border">

                <!-- Contact Form -->
               <form method="POST" action="{{ route('front.customer.store') }}" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                    <div class="group rounded-[20px] ring-1 ring-tedja-border bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <input
                            type="text"
                            placeholder="Your Name *"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full p-4 bg-transparent border-none outline-none rounded-[20px] placeholder-gray-500 @error('name') ring-2 ring-red-500 @enderror"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1 px-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group rounded-[20px] ring-1 ring-tedja-border bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <input
                            type="tel"
                            placeholder="Your Phone *"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full p-4 bg-transparent border-none outline-none rounded-[20px] placeholder-gray-500 @error('phone') ring-2 ring-red-500 @enderror"
                            required
                        >
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1 px-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group rounded-[20px] ring-1 ring-tedja-border bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <input
                            type="email"
                            placeholder="Email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full p-4 bg-transparent border-none outline-none rounded-[20px] placeholder-gray-500 @error('email') ring-2 ring-red-500 @enderror"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1 px-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group rounded-[20px] ring-1 ring-tedja-border bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <input
                            value="{{ $property->name }}"
                            readonly
                            class="w-full p-4 bg-gray-100 border-none outline-none rounded-[20px] placeholder-gray-500"
                        >
                    </div>

                    <div class="group rounded-[20px] ring-1 ring-tedja-border bg-white hover:ring-2 hover:ring-tedja-blue transition-all duration-300">
                        <textarea
                            name="message"
                            placeholder="Message"
                            rows="4"
                            class="w-full p-4 bg-transparent border-none outline-none rounded-[20px] placeholder-gray-500 resize-none @error('message') ring-2 ring-red-500 @enderror"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1 px-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="border-tedja-border">

                    <!-- Alert Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-[20px]">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-[20px]">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="flex items-center justify-center">
                        <button
                            type="submit"
                            class="px-8 py-5 bg-tedja-blue text-white rounded-full font-semibold hover:bg-blue-700 transition-colors duration-300 w-full text-lg disabled:opacity-50"
                        >
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Modal -->
        <div id="Gallery-Modal" class="fixed inset-0 items-center justify-center bg-tedja-black/50 flex z-30 hidden">
            <div id="Modal-Content" class="rounded-[50px] flex flex-col gap-5 py-[40px]">
                <div class="flex max-w-[900px] max-h-[600px] overflow-hidden">
                    <img src="{{ asset('assets/images/thumbnails/thumbnails-6.png') }}" class="object-contain" alt="thumbnail">
                </div>
                <button id="closeModal" class="px-5 mx-auto py-[14px] !w-fit bg-tedja-red rounded-full font-semibold text-white">
                    Close
                </button>
            </div>
        </div>


@endsection

@push('after-style')
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush

@push('after-script')
      <script src="{{ asset('js/gallery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
@endpush
