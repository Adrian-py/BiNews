@extends('layout.layout')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')

    <main class="w-full flex flex-col items-center px-hor">
        <h1 class="text-headline-l font-bold text-center">Profile</h1>
        <div class="w-2/4 flex px-10 py-5 border-2 border-black">
            <img class="px-5 aspect-square w-1/4" src="{{ asset('storage/images/' . $user->image) }}">
            <div class="flex flex-col grow">
                <p class="text-[1.5rem] font-bold line">{{ $user->name }}</p>
                <p class="text-[1.5rem]">{{ $user->email }}</p>
                <p class="text-[1.5rem]">{{ $user->role }}</p>
                <div class="flex gap-5 mt-5">
                    <a href="/update-profile">
                        <div class="px-5 py-2 border-2 border-black">
                            Edit Profile
                        </div>
                    </a>
                    <a href="/password-profile">
                        <div class="px-5 py-2 border-2 border-black">
                            Change Password
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

@endsection
