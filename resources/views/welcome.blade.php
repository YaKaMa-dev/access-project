<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
    <link href="./designweb/design.css" rel="stylesheet">
    <title> @yield('pageTitle')</title>
</head>
<body class="bg-slate-200 ">

    <div class="flex flex-col lg:flex-row">
        

        <aside class=" bg-gray-800  p-4   h-auto lg:h-screen w-full  lg:w-1/6 sm:flex-shrink-0 ">
            <nav class="text-white">
                <ul>
                    <li><h1 class="  text-teal-500  p-2 font-bold text-2xl  mb-2 pb-8">LOGO</h1></li>
                    <li class="p-4 hover:text-orange-600 font-semibold lg:block sm:inline"><a class="text-xl pr-12" href="#"><i class="fa fa-fw fa-home" aria-hidden="true"></i><span>Home</span></a></li>
                    <li class="p-4 hover:text-orange-600 font-semibold lg:block sm:inline"><a class="text-xl pr-12" href="{{route('projets.index')}}" class=""><i class="fa fa-industry" aria-hidden="true"></i> <span>Project</span></a></li>
                    <li class="p-4 hover:text-orange-600 font-semibold lg:block sm:inline"><a class="text-xl pr-12" href="{{route('profile.show')}}" class=""><i class="fa fa-fw fa-user" aria-hidden="true"></i><span>Profile</span></a></li>
                               
                </ul>
            </nav>
        </aside>
        <div class="flex flex-col flex-1">
            <header class="  p-4  text-teal-800   bg-white ">
                <h2 class="text-left p-4   text-3xl   font-extrabold ">
                  <i class="fa fa-fw fa-industry" aria-hidden="true"></i> @yield('pageTitle')
                </h2>
              </header>
            <main class="mt-15">
                @yield('content')
                @show
           </main>  
        </div>
        
    </div>
    

</body>
</html>