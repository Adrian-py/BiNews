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
                        <a href="/profile" class="w-full pr-[1rem] py-[0.75rem] flex justify-end items-center gap-[0.75rem] text-right transition-all duration-150 ease-in-out hover:bg-neutrals-25/5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13C10.9391 13 9.92172 12.5786 9.17157 11.8284C8.42143 11.0783 8 10.0609 8 9C8 7.93913 8.42143 6.92172 9.17157 6.17157C9.92172 5.42143 10.9391 5 12 5C13.0609 5 14.0783 5.42143 14.8284 6.17157C15.5786 6.92172 16 7.93913 16 9ZM14 9C14 9.53043 13.7893 10.0391 13.4142 10.4142C13.0391 10.7893 12.5304 11 12 11C11.4696 11 10.9609 10.7893 10.5858 10.4142C10.2107 10.0391 10 9.53043 10 9C10 8.46957 10.2107 7.96086 10.5858 7.58579C10.9609 7.21071 11.4696 7 12 7C12.5304 7 13.0391 7.21071 13.4142 7.58579C13.7893 7.96086 14 8.46957 14 9Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12C1 18.075 5.925 23 12 23C18.075 23 23 18.075 23 12C23 5.925 18.075 1 12 1ZM3 12C3 14.09 3.713 16.014 4.908 17.542C5.74723 16.4399 6.8299 15.5467 8.07143 14.9323C9.31297 14.3179 10.6797 13.9988 12.065 14C13.4323 13.9987 14.7819 14.3095 16.0109 14.9088C17.2399 15.508 18.316 16.3799 19.157 17.458C20.0234 16.3216 20.6068 14.9952 20.8589 13.5886C21.111 12.182 21.0244 10.7355 20.6065 9.36898C20.1886 8.00243 19.4512 6.75505 18.4555 5.73004C17.4598 4.70503 16.2343 3.93186 14.8804 3.47451C13.5265 3.01716 12.0832 2.88877 10.6699 3.09997C9.25652 3.31117 7.91379 3.85589 6.75277 4.68905C5.59175 5.52222 4.64581 6.61987 3.99323 7.8912C3.34065 9.16252 3.00018 10.571 3 12ZM12 21C9.93395 21.0031 7.93027 20.2923 6.328 18.988C6.97293 18.0647 7.83134 17.3109 8.83019 16.7907C9.82905 16.2705 10.9388 15.9992 12.065 16C13.1772 15.9991 14.2735 16.2636 15.2629 16.7714C16.2524 17.2793 17.1064 18.0159 17.754 18.92C16.1393 20.2667 14.1026 21.0029 12 21Z" fill="currentColor"/>
                            </svg>

                            Profile
                        </a>

                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="w-full pr-[1rem] py-[0.75rem] flex justify-end items-center gap-[0.75rem] transition-all duration-150 ease-in-out hover:bg-neutrals-25/5">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 5H11C11.55 5 12 4.55 12 4C12 3.45 11.55 3 11 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H11C11.55 21 12 20.55 12 20C12 19.45 11.55 19 11 19H5V5Z" fill="currentColor"/>
                                    <path d="M20.65 11.65L17.86 8.86004C17.7905 8.78859 17.7012 8.73952 17.6036 8.71911C17.506 8.69869 17.4045 8.70787 17.3121 8.74545C17.2198 8.78304 17.1408 8.84733 17.0851 8.93009C17.0295 9.01286 16.9999 9.11033 17 9.21004V11H10C9.45 11 9 11.45 9 12C9 12.55 9.45 13 10 13H17V14.79C17 15.24 17.54 15.46 17.85 15.14L20.64 12.35C20.84 12.16 20.84 11.84 20.65 11.65Z" fill="currentColor"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
