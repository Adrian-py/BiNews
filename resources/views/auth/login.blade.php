@extends("layout.layout")

@section("title", "Login")

@section("content")
    <header class="absolute top-0 left-0 w-screen px-hor-mob py-[1rem] desktop-s:px-hor">
        <svg width="120" height="40" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_204_7851)">
            <path d="M29.3405 30.3089C30.2889 30.3089 30.9264 29.6713 30.9264 28.7229V7.70893C30.9264 7.60377 30.8847 7.50292 30.8103 7.42857C30.7359 7.35421 30.6351 7.31244 30.5299 7.31244C30.4248 7.31244 30.3239 7.35421 30.2496 7.42857C30.1752 7.50292 30.1334 7.60377 30.1334 7.70893V28.7229C30.1334 29.4128 29.6362 29.5159 29.3405 29.5159C29.2588 29.5159 28.5475 29.4937 28.5475 28.7229V7.70893C28.5475 7.60377 28.5057 7.50292 28.4314 7.42857C28.357 7.35421 28.2561 7.31244 28.151 7.31244C28.0458 7.31244 27.945 7.35421 27.8706 7.42857C27.7963 7.50292 27.7545 7.60377 27.7545 7.70893V28.7229C27.7545 29.7641 28.5522 30.3089 29.3405 30.3089ZM3.56861 23.965H11.4984C11.6036 23.965 11.7044 23.9232 11.7788 23.8489C11.8531 23.7745 11.8949 23.6737 11.8949 23.5685V16.4317C11.8949 16.3266 11.8531 16.2257 11.7788 16.1514C11.7044 16.077 11.6036 16.0352 11.4984 16.0352H3.56861C3.46345 16.0352 3.3626 16.077 3.28825 16.1514C3.21389 16.2257 3.17212 16.3266 3.17212 16.4317V23.5685C3.17212 23.6737 3.21389 23.7745 3.28825 23.8489C3.3626 23.9232 3.46345 23.965 3.56861 23.965ZM3.9651 16.8282H11.1019V23.172H3.9651V16.8282ZM3.56861 13.6563H22.6001C22.7053 13.6563 22.8061 13.6145 22.8805 13.5402C22.9548 13.4658 22.9966 13.3649 22.9966 13.2598V10.0879C22.9966 9.98271 22.9548 9.88187 22.8805 9.80751C22.8061 9.73315 22.7053 9.69138 22.6001 9.69138H3.56861C3.46345 9.69138 3.3626 9.73315 3.28825 9.80751C3.21389 9.88187 3.17212 9.98271 3.17212 10.0879V13.2598C3.17212 13.3649 3.21389 13.4658 3.28825 13.5402C3.3626 13.6145 3.46345 13.6563 3.56861 13.6563ZM3.9651 10.4844H22.2036V12.8633H3.9651V10.4844ZM22.6001 16.0352H14.6703C14.5652 16.0352 14.4643 16.077 14.39 16.1514C14.3156 16.2257 14.2738 16.3266 14.2738 16.4317C14.2738 16.5369 14.3156 16.6377 14.39 16.7121C14.4643 16.7864 14.5652 16.8282 14.6703 16.8282H22.6001C22.7053 16.8282 22.8061 16.7864 22.8805 16.7121C22.9548 16.6377 22.9966 16.5369 22.9966 16.4317C22.9966 16.3266 22.9548 16.2257 22.8805 16.1514C22.8061 16.077 22.7053 16.0352 22.6001 16.0352ZM22.6001 18.4142H14.6703C14.5652 18.4142 14.4643 18.4559 14.39 18.5303C14.3156 18.6046 14.2738 18.7055 14.2738 18.8107C14.2738 18.9158 14.3156 19.0167 14.39 19.091C14.4643 19.1654 14.5652 19.2071 14.6703 19.2071H22.6001C22.7053 19.2071 22.8061 19.1654 22.8805 19.091C22.9548 19.0167 22.9966 18.9158 22.9966 18.8107C22.9966 18.7055 22.9548 18.6046 22.8805 18.5303C22.8061 18.4559 22.7053 18.4142 22.6001 18.4142ZM22.6001 20.7931H14.6703C14.5652 20.7931 14.4643 20.8349 14.39 20.9092C14.3156 20.9836 14.2738 21.0844 14.2738 21.1896C14.2738 21.2947 14.3156 21.3956 14.39 21.47C14.4643 21.5443 14.5652 21.5861 14.6703 21.5861H22.6001C22.7053 21.5861 22.8061 21.5443 22.8805 21.47C22.9548 21.3956 22.9966 21.2947 22.9966 21.1896C22.9966 21.0844 22.9548 20.9836 22.8805 20.9092C22.8061 20.8349 22.7053 20.7931 22.6001 20.7931ZM22.6001 23.172H14.6703C14.5652 23.172 14.4643 23.2138 14.39 23.2882C14.3156 23.3625 14.2738 23.4634 14.2738 23.5685C14.2738 23.6737 14.3156 23.7745 14.39 23.8489C14.4643 23.9232 14.5652 23.965 14.6703 23.965H22.6001C22.7053 23.965 22.8061 23.9232 22.8805 23.8489C22.9548 23.7745 22.9966 23.6737 22.9966 23.5685C22.9966 23.4634 22.9548 23.3625 22.8805 23.2882C22.8061 23.2138 22.7053 23.172 22.6001 23.172ZM22.6001 25.551H14.6703C14.5652 25.551 14.4643 25.5928 14.39 25.6671C14.3156 25.7415 14.2738 25.8423 14.2738 25.9475C14.2738 26.0526 14.3156 26.1535 14.39 26.2278C14.4643 26.3022 14.5652 26.344 14.6703 26.344H22.6001C22.7053 26.344 22.8061 26.3022 22.8805 26.2278C22.9548 26.1535 22.9966 26.0526 22.9966 25.9475C22.9966 25.8423 22.9548 25.7415 22.8805 25.6671C22.8061 25.5928 22.7053 25.551 22.6001 25.551ZM3.56861 26.344H11.4984C11.6036 26.344 11.7044 26.3022 11.7788 26.2278C11.8531 26.1535 11.8949 26.0526 11.8949 25.9475C11.8949 25.8423 11.8531 25.7415 11.7788 25.6671C11.7044 25.5928 11.6036 25.551 11.4984 25.551H3.56861C3.46345 25.551 3.3626 25.5928 3.28825 25.6671C3.21389 25.7415 3.17212 25.8423 3.17212 25.9475C3.17212 26.0526 3.21389 26.1535 3.28825 26.2278C3.3626 26.3022 3.46345 26.344 3.56861 26.344ZM22.6001 27.9299H14.6703C14.5652 27.9299 14.4643 27.9717 14.39 28.0461C14.3156 28.1204 14.2738 28.2213 14.2738 28.3264C14.2738 28.4316 14.3156 28.5324 14.39 28.6068C14.4643 28.6811 14.5652 28.7229 14.6703 28.7229H22.6001C22.7053 28.7229 22.8061 28.6811 22.8805 28.6068C22.9548 28.5324 22.9966 28.4316 22.9966 28.3264C22.9966 28.2213 22.9548 28.1204 22.8805 28.0461C22.8061 27.9717 22.7053 27.9299 22.6001 27.9299ZM3.56861 28.7229H11.4984C11.6036 28.7229 11.7044 28.6811 11.7788 28.6068C11.8531 28.5324 11.8949 28.4316 11.8949 28.3264C11.8949 28.2213 11.8531 28.1204 11.7788 28.0461C11.7044 27.9717 11.6036 27.9299 11.4984 27.9299H3.56861C3.46345 27.9299 3.3626 27.9717 3.28825 28.0461C3.21389 28.1204 3.17212 28.2213 3.17212 28.3264C3.17212 28.4316 3.21389 28.5324 3.28825 28.6068C3.3626 28.6811 3.46345 28.7229 3.56861 28.7229Z" fill="#0097DA"/>
            <path d="M3.96487 32.6456H29.3561C29.3616 32.6456 29.3664 32.6424 29.372 32.6424C30.4062 32.6334 31.3951 32.2167 32.1238 31.4828C32.8526 30.7488 33.2623 29.757 33.2639 28.7227V7.70874C33.2639 7.61473 33.2266 7.52457 33.1601 7.4581C33.0936 7.39162 33.0034 7.35428 32.9094 7.35428C32.8154 7.35428 32.7253 7.39162 32.6588 7.4581C32.5923 7.52457 32.555 7.61473 32.555 7.70874V28.7227C32.555 30.495 31.1133 31.9367 29.341 31.9367C27.5687 31.9367 26.1263 30.495 26.1263 28.7227V7.70874C26.1263 7.51287 25.9677 7.35428 25.7718 7.35428H0.396454C0.200588 7.35428 0.0419922 7.51287 0.0419922 7.70874V28.7227C0.0430418 29.7628 0.45668 30.76 1.19213 31.4954C1.92759 32.2309 2.92478 32.6445 3.96487 32.6456ZM0.750917 8.0632H25.4166V28.7227C25.4166 28.9654 25.4459 29.2009 25.4879 29.4324C25.4967 29.4784 25.5038 29.5244 25.5141 29.5696C25.5633 29.7901 25.6283 30.0034 25.7131 30.2088C25.7282 30.246 25.7464 30.2809 25.7631 30.3174C25.8487 30.5093 25.9479 30.6941 26.0628 30.8685C26.0763 30.8883 26.0866 30.9098 26.1001 30.9296C26.2254 31.112 26.3681 31.2809 26.5212 31.4395C26.5545 31.4736 26.587 31.5069 26.6219 31.5402C26.7694 31.6829 26.9248 31.8185 27.0929 31.9367H3.96487C3.1128 31.9356 2.29592 31.5967 1.69342 30.9942C1.09091 30.3917 0.751966 29.5748 0.750917 28.7227V8.0632Z" fill="#0097DA"/>
            </g>
            <path d="M41.0103 27V26.627L42.992 25.6711V12.9419L41.0103 11.986V11.613H48.4707C49.5897 11.613 50.5844 11.7451 51.4548 12.0093C52.3407 12.258 53.0324 12.6388 53.5297 13.1517C54.0426 13.6491 54.2991 14.2863 54.2991 15.0634C54.2991 15.8561 53.996 16.5866 53.3898 17.2549C52.7992 17.9232 51.9444 18.3895 50.8253 18.6537C52.3329 18.8558 53.5142 19.2987 54.369 19.9826C55.2394 20.6509 55.6746 21.498 55.6746 22.5238C55.6746 23.3786 55.387 24.148 54.812 24.8318C54.2369 25.5002 53.4442 26.0286 52.434 26.4172C51.4393 26.8057 50.3047 27 49.0302 27H41.0103ZM47.305 12.8953H46.5123V18.4905H47.4449C48.4707 18.4905 49.2711 18.2496 49.8462 17.7678C50.4212 17.2705 50.7088 16.6021 50.7088 15.7628C50.7088 13.8511 49.5742 12.8953 47.305 12.8953ZM48.121 19.6329H46.5123V25.7178H48.2841C49.4343 25.7178 50.328 25.4302 50.9652 24.8551C51.618 24.2801 51.9444 23.5418 51.9444 22.6404C51.9444 21.6146 51.6102 20.8607 50.9419 20.3789C50.2891 19.8816 49.3488 19.6329 48.121 19.6329ZM59.9622 13.8278C59.4649 13.8278 59.053 13.6724 58.7266 13.3615C58.4157 13.0351 58.2603 12.631 58.2603 12.1492C58.2603 11.6519 58.4157 11.2478 58.7266 10.9369C59.053 10.6105 59.4649 10.4473 59.9622 10.4473C60.4596 10.4473 60.8637 10.6105 61.1745 10.9369C61.5009 11.2478 61.6641 11.6519 61.6641 12.1492C61.6641 12.631 61.5009 13.0351 61.1745 13.3615C60.8637 13.6724 60.4596 13.8278 59.9622 13.8278ZM56.8149 27V26.627L58.3769 25.8809V18.7936L56.8848 17.6979V17.4181L61.3843 16.1359H61.6641V25.8809L63.0396 26.627V27H56.8149Z" fill="#0097DA"/>
            <path d="M64.3887 27V26.627L66.3703 25.6711V12.9652L64.3887 11.986V11.613H68.8182L77.8639 21.8244V12.9186L75.2062 11.986V11.613H81.4542V11.986L79.4959 12.9419V27.1166H78.0504L68.0023 15.8794V25.6711L70.66 26.627V27H64.3887ZM87.9681 27.2331C86.3673 27.2331 85.1006 26.7746 84.168 25.8576C83.251 24.9251 82.7925 23.6972 82.7925 22.1741C82.7925 20.9929 83.049 19.9515 83.5619 19.0501C84.0748 18.1331 84.7664 17.4181 85.6368 16.9052C86.5071 16.3923 87.4785 16.1359 88.551 16.1359C89.8099 16.1359 90.7891 16.5555 91.4885 17.3948C92.1879 18.2341 92.5454 19.4231 92.5609 20.9618L92.4677 21.0783H85.9398V21.1949C85.9398 21.8477 86.0642 22.4461 86.3129 22.9901C86.5615 23.5185 86.9501 23.9381 87.4785 24.249C88.0225 24.5598 88.7219 24.7153 89.5768 24.7153C90.0275 24.7153 90.4938 24.6609 90.9756 24.5521C91.4729 24.4433 91.9858 24.2568 92.5143 23.9925H92.5842V24.3656C92.1957 25.1893 91.5973 25.8732 90.7891 26.4172C89.9964 26.9611 89.0561 27.2331 87.9681 27.2331ZM88.0148 17.185C87.4708 17.185 87.02 17.4336 86.6626 17.931C86.3206 18.4284 86.103 19.1278 86.0098 20.0292H89.9498C89.841 18.9568 89.6156 18.2185 89.2737 17.8144C88.9473 17.3948 88.5277 17.185 88.0148 17.185ZM97.6622 27L93.8154 17.3715L92.37 16.742V16.369H98.9677V16.742L97.3591 17.4181V17.488L99.3174 22.687H99.434L102.115 16.369H103.001L105.799 22.6637H105.892L107.897 17.5813V17.488L106.428 16.742V16.369H110.998V16.742L109.366 17.5347L105.262 27H104.376L101.509 20.682L98.5481 27H97.6622ZM114.644 27.2331C113.882 27.2331 113.214 27.1554 112.639 27C112.079 26.8601 111.527 26.6581 110.983 26.3938V23.6895H111.333L112.149 24.9018C112.724 25.7721 113.525 26.2073 114.55 26.2073C115.763 26.2073 116.369 25.7644 116.369 24.8785C116.369 24.5521 116.283 24.2878 116.112 24.0858C115.942 23.8837 115.662 23.6895 115.273 23.503C114.9 23.3164 114.38 23.0833 113.711 22.8035C112.841 22.4461 112.196 22.0264 111.776 21.5446C111.357 21.0628 111.147 20.4644 111.147 19.7495C111.147 19.0811 111.318 18.475 111.66 17.931C112.017 17.387 112.499 16.9518 113.105 16.6254C113.711 16.2991 114.395 16.1359 115.157 16.1359C115.685 16.1359 116.198 16.1903 116.695 16.2991C117.208 16.4078 117.706 16.5866 118.187 16.8353V19.6096H117.838L117.115 18.5138C116.82 18.0631 116.517 17.729 116.206 17.5114C115.895 17.2938 115.522 17.185 115.087 17.185C114.62 17.185 114.24 17.3015 113.944 17.5347C113.665 17.7678 113.525 18.0942 113.525 18.5138C113.525 18.7936 113.587 19.0345 113.711 19.2366C113.851 19.4231 114.092 19.6096 114.434 19.7961C114.776 19.9826 115.265 20.2002 115.903 20.4489C116.338 20.6198 116.765 20.8219 117.185 21.055C117.62 21.2726 117.978 21.5912 118.257 22.0109C118.553 22.415 118.7 22.9823 118.7 23.7128C118.7 24.4433 118.506 25.0727 118.117 25.6012C117.729 26.1296 117.224 26.5337 116.602 26.8135C115.996 27.0933 115.343 27.2331 114.644 27.2331Z" fill="#F77F00"/>
            <defs>
            <clipPath id="clip0_204_7851">
            <rect width="33.3052" height="25.3754" fill="white" transform="translate(0 7.31232)"/>
            </clipPath>
            </defs>
        </svg>
    </header>
    <main class="w-full h-screen px-hor-mob flex flex-col items-start justify-center desktop-s:px-[28.125vw] desktop-s:py-[23.4375vh] desktop-s:justify-start">
        <h1 class="w-full mb-[2vh] text-headline-m font-bold text-center desktop-s:text-headline-l desktop-s:text-left">Sign in to an<br> existing account!</h1>

        @if(Session::get("no-match"))
            <h2 class="w-full mb-[2.88vh] text-headline-xs text-warning-100 font-bold text-center desktop-s:text-left">{{ Session::get("no-match") }}</h2>
        @endif

        <form action="{{ route("auth-login") }}" method="POST" class="w-full flex flex-col">
            @csrf

            <div class="mb-[0.75rem]">
                <input type="email" name="email" class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('email') border-warning-100 @enderror" placeholder="Email">

                @error("email")
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-[0.75rem]">
                <input type="password" name="password" class="w-full mb-[0.5rem] px-[1rem] py-[0.5rem] border-2 border-neutrals-200 desktop-s:py-[0.75rem] @error('password') border-warning-100 @enderror" placeholder="Password">

                @error("password")
                    <span class="text-warning-100">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" value="Log In" class="w-full mb-[1.5rem] py-[0.75rem] bg-primary-600 text-white-100 cursor-pointer transition-all hover:scale-[1.025]">
        </form>

        <a class="w-full text-body-l text-primary-600 text-center hover:underline" href="/register">Don't have an account?</a>
    </main>
@endsection
