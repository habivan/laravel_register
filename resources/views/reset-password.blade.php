<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/output.css" rel="stylesheet" />
        @vite('resources/css/app.css')
        <title>Security</title>
    </head>
    <body class="min-h-screen bg-gray-50 bg-[url('https://raw.githubusercontent.com/igorbabko/build-with-tailwindcss/870e29940fc3990a0ea36c1fa08129f08689c15c/wave.svg')] bg-fixed bg-bottom bg-no-repeat">
        <header class="flex items-center justify-between p-6">
            <a href="{{route('welcome')}}" class="flex items-center gap-2">
            <svg class="h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
                <span class="text-xl font-black">Security</span>
            </a>
        </header>
        <main class="flex flex-col justify-center p-6 pb-12">
            <div class="mx-auto max-w-md">
                <svg class="mx-auto h-12 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl">Reset Password</h2>
            </div>
            <div class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
                <form action="{{route('password.update')}}" method="POST" autocomplete="off"    class="mt-6 ">
                    @csrf
                    <input type="hidden" name="token" value="{{$request->token}}">
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 {{$errors->has('email') ? 'text-red-400' : 'text-gray-400'}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{old('email', $request->email)}}" class="w-full rounded-md pl-10 pr-10 text-sm {{$errors->has('email') ?  'border-red-300  text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' :  'border-gray-300  focus:border-green-500 focus:ring-green-500'}}" placeholder="john@example.com" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                @error('email')
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                @enderror
                            </div>
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 {{$errors->has('password') ? 'text-red-400' : 'text-gray-400'}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" minlength="8" class="w-full rounded-md pl-10 text-sm {{$errors->has('email') ?  'border-red-300  text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' :  'border-gray-300  focus:border-green-500 focus:ring-green-500'}}" placeholder="Minimum 8 characters" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                @error('password')
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                    @enderror
                            </div>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 {{$errors->has('password_confirmation') ? 'text-red-400' : 'text-gray-400'}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" class="w-full rounded-md pl-10 text-sm {{$errors->has('password_confirmation') ?  'border-red-300  text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' :  'border-gray-300  focus:border-green-500 focus:ring-green-500'}}" placeholder="Minimum 8 characters" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                @error('password_confirmation')
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                @enderror
                            </div>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                    <div >
                        <button type="submit" class="w-full flex items-center justify-center rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Reset Password</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
