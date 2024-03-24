    
    @extends('layouts.guest')
    
    @section('content')
    <div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url(assets/images/all-img/page-bg.png);">
        <div class="lg-inner-column">
          <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
              <a heref="index.html" class="">
                <img src="assets/images/logo/logo-white.svg" alt="">
              </a>
            </div>
          </div>
          <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
            <div class="auth-box-3">
              <div class="mobile-logo text-center mb-6 lg:hidden block">
                
                  <img src="assets/images/logo/logo.svg" alt="">
                 
              </div>
              <div class="text-center 2xl:mb-10 mb-5">
                <h4 class="font-medium text-center"><center><img src="{{asset('public/sites/img/logo-toyota.png')}}" width="50%" alt=""></center></h4>
                <div class="text-slate-500 dark:text-slate-400 text-base">
                  Traceability Dashboard
                </div>
              </div>
    
              <!-- BEGIN: Registration Form -->
              <form class="space-y-4" action="{{route('login-action')}}" method="POST">
                @if(request()->has('regist'))
                    <div class="alert alert-info">
                        {{ request()->get('regist') }}
                    </div>
                @endif
                @csrf
                <div class="fromGroup">
                  <label class="block capitalize form-label">Username</label>
                  <div class="relative ">
                    <input type="text" name="username" class="  form-control py-2" placeholder="Enter your username" required>
                  </div>
                </div>
                <div class="fromGroup       ">
                  <label class="block capitalize form-label  ">password</label>
                  <div class="relative "><input type="password" name="password" class="  form-control py-2   " placeholder="Enter your password" required>
                  </div>
                </div>
                
                <button class="btn btn-dark block w-full text-center">Login</button>
              </form>
              <!-- END: Registration Form -->
              
              <div class="max-w-[242px] mx-auto mt-8 w-full">

              </div>
             
            </div>
          </div>
          <div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
            Unlock your Project performance
          </div>
        </div>
      </div>
    @endsection