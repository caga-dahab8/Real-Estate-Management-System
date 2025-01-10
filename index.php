<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate System</title>
    <link rel="stylesheet" href="./Assets/Css/Style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="https://dynamic.design.com/asset/logo/223af9e0-8de2-4baa-9b50-406cba87fa4c/logo-search-grid-2x?logoTemplateVersion=1&v=638253462490100000&text=Real+estate+" type="image/x-icon">
    <style>
        header {
            -tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity, 1));
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav a:hover {
            background-color: #777;
        }



        footer {
            clear: both;
            position: relative;
        }
    </style>
</head>

<body>
    <header class="">
        <div class="px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center h-16 lg:h-20">
                <div class="flex-shrink-0">
                    <a href="#" title="" class="flex">
                        <img class="w-100 h-8" src="https://dynamic.design.com/asset/logo/223af9e0-8de2-4baa-9b50-406cba87fa4c/logo-search-grid-2x?logoTemplateVersion=1&v=638253462490100000&text=Real+estate+" alt="" />
                        <span class="ml-5 mr-40">HaZul Real Estate </span>
                    </a>
                </div>

                <div class="flex justify-between">
                    <a href="index.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2 hover:text-white">Main Page</a>
                    <a href="#Properties" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2 hover:text-white">Properties</a>
                    <a href="#Aboutus" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2 hover:text-white">Aboutus</a>
                    <a href="#ContactUs" class="block py-2 px-4 hover:bg-gray-700 rounded hover:text-white">Contact Us</a>
                </div>

                <div class="hidden ml-auto lg:flex lg:items-center lg:justify-center lg:space-x-10">
                    <div class="w-px h-5 bg-black/20"></div>
                    <a href="auth/login.php" title="Login" class="inline-flex items-center justify-center rounded text-base font-semibold text-white py-2 px-3 bg-blue-700 transition-all duration-200 focus:bg-white focus:text-black "> Log in </a>
                    <a href="auth/register.php" title="Register" class="inline-flex items-center justify-center rounded px-3 py-2 text-base font-semibold text-white border-2 border-white hover:bg-blue-700 hover:text-white transition-all duration-200 focus:bg-blue-700 focus:text-white" role="button"> SignUp </a>
                </div>
            </div>
        </div>
    </header>

    <main>

        <!-- Home -->

        <div class="bg-gradient-to-b from-gray-50 to-gray-100">

            <section class="py-10 sm:py-16 lg:py-24">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                        <div>
                            <h1 class="text-4xl font-bold text-black sm:text-6xl lg:text-7xl">
                                Welcome to Your New Home.
                                <div class="relative inline-flex">
                                    <span class="absolute inset-x-0 bottom-0 border-b-[30px] border-[#4ADE80]"></span>
                                    <h1 class="relative text-4xl font-bold text-black sm:text-6xl lg:text-7xl">HaZul.</h1>
                                </div>
                            </h1>

                            <p class="mt-8 text-base text-black sm:text-xl">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.</p>

                            <div class="mt-10 sm:flex sm:items-center sm:space-x-8">
                                <a href="#" title="" class="inline-flex items-center justify-center px-10 py-4 text-base font-semibold text-white transition-all duration-200 bg-orange-500 hover:bg-orange-600 focus:bg-orange-600" role="button"> Start exploring </a>
                            </div>
                        </div>

                        <div>
                            <img class="w-full" src="./Assets/Images/2.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <!-- Properties -->
        <section class="py-10 bg-gray-50 sm:py-16 lg:py-24" id="Properties">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="flex items-end justify-between">
                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Featured Properties</h2>
                        <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-600 lg:mx-0">Welcome to our platform. Explore our featured properties.</p>
                    </div>


                </div>

                <div class="grid max-w-md grid-cols-1 gap-6 mx-auto mt-8 lg:mt-16 lg:grid-cols-3 lg:max-w-full">
                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/1.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> Bacadow </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> March 21, 2024 </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Ali-Kamin. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/2.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> Ha Ahato Tower </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> April 04, 2024 </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Darusalam. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/3.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> ArZona </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> Feb 29, 2024 </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Hamar-Weine. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/4.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> Best </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> Jun 6, 2024 </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Waberi. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/5.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> Sk </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> May 12, 2024 </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Talex. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="./Assets/Images/6.jpg" alt="" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> Suleiman Tower </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> DEC 12, 2024</span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="#" title="" class="text-black"> Bakaro. </a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            <a href="#" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continue Reading
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-8 space-x-3 lg:hidden">
                    <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>


        <!-- About us -->
        <section class="py-10 bg-white sm:py-16 lg:py-24" id="Aboutus">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl lg:leading-tight">People who made it successful</h2>
                    <p class="max-w-2xl mx-auto mt-4 text-xl text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-3 md:mt-16 lg:gap-x-12">
                    <div>
                        <img class="w-full" src="./Assets/Images/suleiman.jpg" alt="" />
                    </div>

                    <div>
                        <img class="w-full" src="./Assets/Images/abdullahi.jpg" alt="" />
                    </div>

                    <div>
                        <img class="w-full" src="./Assets/Images/Abas.jpg" alt="" />
                    </div>
                    <div>
                        <img class="w-full" src="./Assets/Images/Bakar.jpg" alt="" />
                    </div>
                </div>

                <div class="mt-8 text-center md:mt-16">
                    <a href="#" title="" class="inline-flex items-center justify-center py-4 font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md px-14 hover:bg-blue-700 focus:bg-blue-700" role="button"> Join our team </a>
                </div>
            </div>
        </section>


        <!-- Contact Us -->
        <section class="py-10 bg-gray-100 sm:py-16 lg:py-24" id="ContactUs">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-3xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl">Contact us</h2>
                    <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-500">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>
                </div>

                <div class="max-w-5xl mx-auto mt-12 sm:mt-16">
                    <div class="grid grid-cols-1 gap-6 px-8 text-center md:px-0 md:grid-cols-3">
                        <div class="overflow-hidden bg-white rounded-xl">
                            <div class="p-6">
                                <svg class="flex-shrink-0 w-10 h-10 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <p class="mt-6 text-lg font-medium text-gray-900">+252-619-577-614</p>
                                <p class="mt-1 text-lg font-medium text-gray-900">+252-615-362-846</p>
                            </div>
                        </div>

                        <div class="overflow-hidden bg-white rounded-xl">
                            <div class="p-6">
                                <svg class="flex-shrink-0 w-10 h-10 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-6 text-lg font-medium text-gray-900">RealState@gmail.com</p>
                                <p class="mt-1 text-lg font-medium text-gray-900">suleymaansaid9@gmail.com</p>
                            </div>
                        </div>

                        <div class="overflow-hidden bg-white rounded-xl">
                            <div class="p-6">
                                <svg class="flex-shrink-0 w-10 h-10 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mt-6 text-lg font-medium leading-relaxed text-gray-900">Hodan, Mogadishu, Somalia</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 overflow-hidden bg-white rounded-xl">
                        <div class="px-6 py-12 sm:p-12">
                            <h3 class="text-3xl font-semibold text-center text-gray-900">Send us a message</h3>

                            <form action="#" method="POST" class="mt-14">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4">
                                    <div>
                                        <label for="" class="text-base font-medium text-gray-900"> Your name </label>
                                        <div class="mt-2.5 relative">
                                            <input type="text" name="" id="" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="" class="text-base font-medium text-gray-900"> Email address </label>
                                        <div class="mt-2.5 relative">
                                            <input type="email" name="" id="" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="" class="text-base font-medium text-gray-900"> Phone number </label>
                                        <div class="mt-2.5 relative">
                                            <input type="tel" name="" id="" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="" class="text-base font-medium text-gray-900"> Company name </label>
                                        <div class="mt-2.5 relative">
                                            <input type="text" name="" id="" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="" class="text-base font-medium text-gray-900"> Message </label>
                                        <div class="mt-2.5 relative">
                                            <textarea name="" id="" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md resize-y focus:outline-none focus:border-blue-600 caret-blue-600" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </form>
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