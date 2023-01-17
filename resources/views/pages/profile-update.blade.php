@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main
        class="w-full h-screen px-hor-mob flex flex-col items-start justify-center desktop-s:px-[28.125vw] desktop-s:py-[23.4375vh] desktop:justify-start">
        <h1 class="mb-[4.88vh] text-headline-m font-bold text-center desktop-s:text-headline-l desktop-s:text-left">Update
            Your Account</h1>

        <form action="/update-profile" method="POST" class="w-full flex flex-col" enctype="multipart/form-data">
            @csrf
            <div class="mb-[0.75rem]">
                <input type="text" name="name"
                    class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('name') border-warning-100 @enderror"
                    placeholder="Name" value="{{ old('name') }}">

                @error('name')
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-[0.75rem]">
                <input type="email" name="email"
                    class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('email') border-warning-100 @enderror"
                    placeholder="Email" value="{{ old('email') }}">

                @error('email')
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-[0.75rem]">
                <input type="file" name="image"
                    class="mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('email') border-warning-100 @enderror">

                @error('image')
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Submit"
                class="w-full mb-[1.5rem] py-[0.75rem] bg-primary-600 text-white-100 cursor-pointer">
        </form>

    </main>

@endsection
