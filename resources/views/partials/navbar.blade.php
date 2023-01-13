<header>
    <nav class="px-hor-mob py-[1rem] flex flex-col justify-between items-center desktop-s:px-hor desktop-s:flex-row">
        <div class="mb-[1rem] flex flex-col gap-[1rem] items-center desktop-s:flex-row desktop-s:mb-0 desktop-s:gap-[2rem]">
            <img src="{{ asset('assets/Logo.svg') }}" alt="">

            <ul class="flex items-center gap-[2rem] text-label-m font-semibold desktop-s:px-[2rem]">
                <li><a href="/home">Home</a></li>
                <li><a href="/latest-news">Latest News</a></li>
                <li class="group relative">
                    <a href="#">
                        Categories
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4173 8L11.9191 12.5012L7.41439 8L6 9.41539L11.9201 15.33L17.8327 9.41489L16.4173 8Z" fill="currentColor"/>
                        </svg>
                    </a>

                    <div class="hidden absolute top-[100%] left-[-5px] w-fit pt-[1rem] z-10 group-hover:block">
                        <ul class="bg-white-100 border-[1px] border-neutrals-50">
                            @foreach($tags as $tag)
                                <li class="w-full flex flex-col capitalize"><a href="/tag/{{$tag->id}}" class="pl-[1rem] pr-[5rem] py-[1rem] transition-all duration-150 ease-in-out hover:bg-neutrals-25/5">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        @guest
            <div class="w-fit flex items-center text-label-s font-semibold">
                <a href="/login" class="mr-[0.5rem]">LOG IN</a>
                <a href="/register" class="px-[1rem] py-[0.5rem] bg-secondary-300 text-white-100 rounded-lg">SIGN UP</a>
            </div>
        @endguest

        @auth
            <div class="group relative flex items-center font-semibold cursor-pointer">
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="User Profile Picture" class="w-[2.5rem] aspect-square mr-[1rem]">

                <h2 class="text-body-l mr-[0.25rem]">{{ Auth::user()->name }}</h2>

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4173 8L11.9191 12.5012L7.41439 8L6 9.41539L11.9201 15.33L17.8327 9.41489L16.4173 8Z" fill="#003952" fill-opacity="0.25"/>
                </svg>

                <div class="hidden w-full absolute top-[100%] left-[-5px] pt-[1rem] group-hover:block">
                    <div class="flex flex-col bg-white-100 border-[1px] border-neutrals-50">
                        <a href="/profile" class="w-full pr-[1rem] py-[0.75rem] text-right transition-all duration-150 ease-in-out hover:bg-neutrals-25/5">Profile</a>

                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="w-full pr-[1rem] py-[0.75rem] text-right transition-all duration-150 ease-in-out hover:bg-neutrals-25/5">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
