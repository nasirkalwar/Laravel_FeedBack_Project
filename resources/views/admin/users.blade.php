<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
        @include('admin.slider')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
        
                @include('admin.navbar')
                <div class="content-wrapper">

                    <div style="padding-top:50px;">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="search" placeholder="Search Users by Name & Email" style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" style="width:10%;">Search</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                


                    @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>

                            @endif 


                      <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All Users</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th> User Name </th>
                                            <th> Email </th>
                                            <th> Delete </th>
                                            <th> Date </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $user)
                                        <tr>
                                            <td>
                                            <span class="pl-2">{{$user->name}}</span>
                                            </td>
                                            <td> {{$user->email}}</td>
                                            <td><a href="{{url('delete_user', $user->id)}}" class="btn btn-danger" 
                                                onclick="return confirm('Are you sure to Delete User')">Delete</a></td>                                            
                                            <td> {{$user->created_at}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                
                
                
                
                
                
                
                
                
                
            
                </div>
                


            <!-- partial -->
            <!-- content-wrapper ends -->
        </div>  
        <!-- container-scroller -->
        <!-- plugins:js -->
    </div>

@include('admin.footer')

    <!-- End custom js for this page -->
  </body>
</html>