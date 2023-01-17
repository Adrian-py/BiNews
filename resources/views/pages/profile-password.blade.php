@extends('layout.layout')

@section('title', 'Register')

@section('content')
    @include('partials.navbar')

    <main
        class="w-full h-screen px-hor-mob flex flex-col items-start justify-start desktop-s:px-[28.125vw] desktop-s:pt-[12vh] desktop:justify-start">
        <h1 class="mb-[4.88vh] text-headline-m font-bold text-center desktop-s:text-headline-l desktop-s:text-left">Change
            Passowrd</h1>

        <form action="/password-profile" method="POST" class="w-full flex flex-col">
            @csrf

            <div class="mb-[0.75rem]">
                <input type="password" name="password"
                    class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('password') border-warning-100 @enderror"
                    placeholder="Password">

                @error('password')
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-[0.75rem]">
                <input type="password" name="password_confirmation"
                    class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('password-confirmation') border-warning-100 @enderror"
                    placeholder="Confirm Password">

                @error('password-confirmation')
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Submit"
                class="w-full mb-[1.5rem] py-[0.75rem] bg-primary-600 text-white-100 cursor-pointer">
        </form>

    </main>
@endsection
