<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate System</title>
    <link rel="stylesheet" href="./Assets/Css/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        header {
            -tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity, 1));
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav {
            background-color: #555;
            overflow: hidden;
            margin-top: -12px;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }

        nav a:hover {
            background-color: #777;
        }

        aside {
            float: left;
            width: 20%;
            background-color: #f4f4f4;
            padding: 10px;
            box-shadow: inset 0 0 5px #ccc;
            height: 130vh;
        }

        main {
            margin-left: 22%;
            padding: 10px;
        }

        footer {
            clear: both;
            position: relative;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Real Estate Management System</h1>
    </header>
    <nav>
        <div class="flex flex-1 justify-between">
            <div>
                <!-- <a href="index.php">Home</a> -->
            </div>
            <div>
                <a href="auth/login.php">Login</a>
                <a href="auth/register.php">Register</a>
            </div>
        </div>
    </nav>

    <aside>
        <nav>
            <a href="../index.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Main Page</a>
            <a href="./Main Page/Aboutus.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Aboutus</a>
            <a href="./Main Page/Properties.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Properties</a>
            <a href="ContactUs.php" class="block py-2 px-4 hover:bg-gray-700 rounded">Contact Us</a>
        </nav>
    </aside>

    <main>





        <!-- About us -->
        <section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
            <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="grid items-center grid-cols-1 gap-y-6 md:grid-cols-2 md:gap-x-20">
                    <div class="">
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Grow business with Celebration.</h2>
                        <p class="mt-4 text-base leading-relaxed text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                    </div>

                    <div class="relative pl-20 pr-6 sm:pl-6 md:px-0">
                        <div class="relative w-full max-w-xs mt-4 mb-10 ml-auto">
                            <img class="ml-auto" src="../Assets/Images/7.jpg" alt="" />

                            <img class="absolute -top-4 -left-12" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/1/wavey-lines.svg" alt="" />

                            <div class="absolute -bottom-10 -left-16">
                                <div class="bg-yellow-300">
                                    <div class="px-8 py-10">
                                        <span class="block text-4xl font-bold text-black lg:text-5xl"> 53% </span>
                                        <span class="block mt-2 text-base leading-tight text-black"> High Conversions<br />Everything </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        

    </main>

    <footer>
        <section class="py-10 bg-gray-900 sm:pt-16 lg:pt-24">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="grid grid-cols-2 gap-x-5 gap-y-12 md:grid-cols-4 md:gap-x-12">
                    <div>
                        <p class="text-base text-gray-500">Company</p>

                        <ul class="mt-8 space-y-4">
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> About </a>
                            </li>
                            <li>
                                <a href="#houses" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Features </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Works </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Career </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-base text-gray-500">Help</p>

                        <ul class="mt-8 space-y-4">
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Customer Support </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Delivery Details </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Terms & Conditions </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Privacy Policy </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-base text-gray-500">Resources</p>

                        <ul class="mt-8 space-y-4">
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Free eBooks </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Development Tutorial </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> How to - Blog </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> YouTube Playlist </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-base text-gray-500">Extra Links</p>

                        <ul class="mt-8 space-y-4">
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Customer Support </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Delivery Details </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Terms & Conditions </a>
                            </li>
                            <li>
                                <a href="#" title="" class="text-base text-white transition-all duration-200 hover:text-opacity-80 focus:text-opacity-80"> Privacy Policy </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="mt-16 mb-10 border-gray-800" />

                <div class="flex flex-wrap items-center justify-between">
                    <img class="h-8 auto md:order-1" src="https://cdn.rareblocks.xyz/collection/celebration/images/logo-alt.svg" alt="" />

                    <ul class="flex items-center space-x-3 md:order-3">
                        <li>
                            <a href="#" title="" class="flex items-center justify-center text-white transition-all duration-200 bg-transparent border border-gray-700 rounded-full w-7 h-7 focus:bg-blue-600 hover:bg-blue-600 hover:border-blue-600 focus:border-blue-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" title="" class="flex items-center justify-center text-white transition-all duration-200 bg-transparent border border-gray-700 rounded-full w-7 h-7 focus:bg-blue-600 hover:bg-blue-600 hover:border-blue-600 focus:border-blue-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" title="" class="flex items-center justify-center text-white transition-all duration-200 bg-transparent border border-gray-700 rounded-full w-7 h-7 focus:bg-blue-600 hover:bg-blue-600 hover:border-blue-600 focus:border-blue-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                                    <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                    <path
                                        d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#" title="" class="flex items-center justify-center text-white transition-all duration-200 bg-transparent border border-gray-700 rounded-full w-7 h-7 focus:bg-blue-600 hover:bg-blue-600 hover:border-blue-600 focus:border-blue-600">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <p class="w-full mt-8 text-sm text-center text-gray-100 md:mt-0 md:w-auto md:order-2">© Copyright 2025, All Rights Reserved by Postcraft</p>
                </div>
            </div>
        </section>

    </footer>
</body>

</html>