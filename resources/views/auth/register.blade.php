@extends('layouts.main')

@section('main-section')
<style>

    .required label::after{
        content: " *";
        color: red;
    }
</style>

<body style="background-color:#e1e1e1">

    <div class="container py-3 my-3 w-20" style="background-color: white; border-radius:15px; border:1px solid rgb(107, 107, 107);">
        <div class="heading text-center my-3">
                <h1 class="text-primary">User Registration</h1>
                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note:Your details must match with the following details</span>
        </div>


            {{-- Form Starts from here --}}

            @if(Session::has('error'))
            <p class="text-danger">{{Session::get('error')}}</p>
            @endif

            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="container-fluid" style="padding-bottom: 18px">
                    <div class="row" style="margin-left:20px; margin-right:20px">
                        <div class="form-group col-md-6 my-3 required" >
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name"  value="{{old('name')}}">
                            <span class="text-danger">
                                @error('name')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div>
                        <div class="form-group col-md-6 my-3 required" >
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{old('email')}}">
                            <span class="text-danger">
                                @error('email')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div>

                        
                        <div class="form-group col-md-6 my-3 required">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                            <span class="text-danger">
                                @error('password')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-6 my-3 required">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            <span class="text-danger">
                                @error('password_confirmation')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div>


                        <div class="form-group col-md-6 my-3 required">
                            <label class="form-label">Gender</label>
                            <select id="inputState" name="gender" class="form-control">
                                    <option>Default</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6 my-3 required" >
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="DD-MM-YYYY" value="{{old('dob')}}">
                            <span class="text-danger">
                                @error('dob')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div> 
                        
                        
                        <div class="form-group col my-3 required" >
                            <label class="form-label">Address</label>
                            <input type="address" name="address" class="form-control" placeholder="Address" value="{{old('address')}}">
                            <span class="text-danger">
                                @error('address')
                                 {{$message}}   
                                @enderror
                            </span>
                        </div>                                                 
                    </div>  
                <button class="btn btn-primary justify-center" style="display: flex;
                margin-left: auto;
                margin-right: auto;">Submit Now</button>                           
            </form>


    </div>

@endsection