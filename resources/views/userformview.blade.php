
@extends('layouts.main')
@section('main-section')

    <hr>
<div class="container my-4">    
    <h2 class="text-success">Hello: {{Auth::user()->name}}</h2>
</div>
<hr>

    <div class="container">

        <form action="{{route('userform.view')}}" method="POST">
            @csrf
            <div class="container-fluid" style="padding-bottom: 18px; border:2px solid black; margin-top:40px">
                <div class="row" style="margin-left:20px; margin-right:20px">
                    <div class="form-group col-md-6 my-3 required" >
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name"  value="{{Auth::user()->name}}">
                        {{-- Here userform is used for table --}}
                        <span class="text-danger">
                            @error('name')
                             {{$message}}   
                            @enderror
                        </span>
                    </div>
                    <div class="form-group col-md-6 my-3 required" >
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{Auth::user()->email}}">
                        <span class="text-danger">
                            @error('email')
                             {{$message}}   
                            @enderror
                        </span>
                    </div>
                    <div class="form-group col-md-6 my-3 required">
                        <label class="form-label">Gender</label>
                        <select id="inputState" name="gender" class="form-control">
                                <option {{Auth::user()->gender == "Defaults" ? "selected" : ""}}>Default</option>
                                <option {{Auth::user()->gender == "Male" ? "selected" : ""}}>Male</option>
                                <option {{Auth::user()->gender == "Female" ? "selected" : ""}}>Female</option>
                                <option {{Auth::user()->gender == "Others" ? "selected" : ""}}>Others</option>
                          </select>
                            @error('password_confirmation')
                             {{$message}}   
                            @enderror
                        </span>
                    </div>
                    <div class="form-group col-md-6 my-3 required" >
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" placeholder="DD-MM-YYYY" value="{{Auth::user()->dob}}">
                        <span class="text-danger">
                            @error('dob')
                             {{$message}}   
                            @enderror
                        </span>
                    </div>  
                    <div class="form-group col  my-3" >
                        <label class="form-label">Address</label>
                        <input type="address" name="address" class="form-control" placeholder="Address" value="{{Auth::user()->address}}">
                        <span class="text-danger">
                            @error('address')
                             {{$message}}   
                            @enderror
                        </span>
                    </div>                                          
            </div>  
        </form>

        <div class="row" style="margin-left:20px; margin-right:20px">
            <div class="form-group col-md-6 my-3" style="display: flex; justify-content:center">
                <a href="{{route('userform.view')}}">
                    <button class="btn btn-success mx-3">Update</button>
                </a>
                <a href="">
                    <button class="btn btn-danger mx-3">Delete</button>
                </a>
            </div>
        </div>
            
    </div>
    </div>
</div>

{{-- Completion of Profile --}}


<div class="container">

    <hr>
<div class="container my-4">    
    <h2 class="text-primary">Hey: {{Auth::user()->name}} : Please, Complete Your Profile</h2>
</div>
<hr>

    <form action="{{route('userform.upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid" style="padding-bottom: 18px; border:2px solid black; margin-top:40px">
            <div class="row" style="margin-left:20px; margin-right:20px">
                <div class="form-group col-md-6 my-3 required" >
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile" class="form-control">
                    {{-- Here userform is used for table --}}
                    <span class="text-danger">
                        @error('profile')
                         {{$message}}   
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6 my-3 required" >
                    <label class="form-label">Video</label>
                    <input type="File" name="video" class="form-control">
                    <span class="text-danger">
                        @error('video')
                         {{$message}}   
                        @enderror
                    </span>
                </div>
                                    
        </div>  
        <div class="row" style="display: flex; justify-content:center">
                <a href="">
                    <button class="btn btn-primary mx-3">Save</button>
            </a>
    </form>


    </div>
        
</div>
</div>
</div>
        
  <hr>      
    
    <div class="heading text-center mt-3">   
            <h1 class="text-danger">The Data of all the user feeeded </h1>
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note:These are the details of all Users</span>
            <hr>
        </div>
<hr>
 
<div class="container">
        

    
    <div class="table-responsive">
        <table class="table table-bordered yajra-datatable" id="myTable">
            <thead>
                    <tr class="text-center">
                        <th scope="col">Id</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Video</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
{{-- Userdata as uservalue is assigned only for the loop purpose --}}


                {{-- @foreach ($usersdata as $uservalue)
                <tr class="text-center">
                            <td>{{$uservalue->userform_id}}</td>
                            <td>{{$uservalue->name}}</td>
                            <td>{{$uservalue->email}}</td>
                            <td>{{$uservalue->gender}}</td>
                            <td>{{$uservalue->dob}}</td>
                            <td >{{$uservalue->address}}</td>
                            <td>
                                @if($uservalue->status==1)
                                <button class="btn">
                                    <span class="badge bg-success">Active</span>
                                </button>
                            @else
                            <button class="btn">
                                <span class="badge bg-danger">Inactive</span>
                            </button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('userform.edit',['id' =>$uservalue->userform_id])}}">
                                <button class="btn btn-primary">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('userform.delete',['id' =>$uservalue->userform_id])}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr> 
                    @endforeach
                    --}}
                    </tbody>
                </table>
            </div>
<a href="{{route('register')}}">
    <button class="btn btn-primary mt-2" style="display:flex; margin-left:auto ; margin-right:auto">Add User</button>
</a>           
</div>

@endsection