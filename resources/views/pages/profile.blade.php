@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main class="relatiw-full flex flex-col items-center px-hor desktop-s:py-[2.5rem]">
        <h1 class="text-headline-m font-bold text-center desktop-s:text-headline-l">Profile</h1>
        <div class="w-full flex px-10 py-5">
            <img class="aspect-square w-1/4 mr-[4vw] object-fit rounded-full" src="{{ asset('storage/images/' . $user->image) }}">

            <div class="flex flex-col grow">
                <div class="flex items-center">
                    <p class="max-w-[3/4] mr-[2vw] text-headline-m font-bold line desktop-s:text-headline-l">{{ $user->name }}</p>

                    <a href="/update-profile" class="p-[0.5rem] text-neutrals-400/[.4] rounded-full transition-all duration-150 ease-in-out hover:bg-neutrals-400/[.05]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM4 21C3.71667 21 3.47933 20.904 3.288 20.712C3.096 20.5207 3 20.2833 3 20V17.175C3 17.0417 3.025 16.9127 3.075 16.788C3.125 16.6627 3.2 16.55 3.3 16.45L13.6 6.15L17.85 10.4L7.55 20.7C7.45 20.8 7.33767 20.875 7.213 20.925C7.08767 20.975 6.95833 21 6.825 21H4Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>

                <p class="mb-[2rem] text-headline-s font-bold capitalize">{{ $user->role }}</p>

                <a href="/password-profile" class="w-fit px-5 py-2 text-white-100 bg-secondary-600 rounded-lg font-bold">
                    Change Password
                </a>
            </div>
        </div>
    </main>

@endsection
