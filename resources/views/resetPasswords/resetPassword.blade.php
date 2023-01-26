<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Sankapo.com - Reset Password</title>
     @include('admin-template.css')
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">     
            <div class="login-card">
              <div>
                <div><a class="logo"  href="https://Sankapo.com"><img class="img-fluid for-light"  src="{{url('assets/images/logo/logo-sankapo.png')}}" alt="looginpage"></a></div>
                <div class="login-main"> 
                  <form class="theme-form" action="{{ route('password.reset') }}" method="POST" autocomplete="off">
                    @csrf
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <h4>Create Your Password</h4>
                    <div class="form-group">
                      <label class="col-form-label">New Password</label>
                      <input type="hidden" name="token" value="{{ $token }}">
                      <div class="form-input position-relative">
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ $email ?? old('email') }}">
                        <span class="text-danger">
                          @error('email')
                              {{ $message }}
                          @enderror
                      </span>
                        <div class="show-hide"><span class="show"></span></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Retype Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter password"
                      value="{{ old('password') }}">
                      <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Retype Password</label>
                      <input  type="password" class="form-control" name="password_confirmation"
                      placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                      <span class="text-danger">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group mb-0">
                      <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">Remember password</label>
                      </div>
                      <button class="btn btn-primary btn-block w-100" type="submit">Reset Password</button>
                    </div>
                    <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="https://Sankapo.com/signin">Create Account</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin-template.script')
  </body>
</html>