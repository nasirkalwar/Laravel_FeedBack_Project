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
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('feed_search')}}" method="get">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search Products By Title & Name & Category & " style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" style="width:10%; ">Search</button>
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
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All FeedBacks</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th> FeedBack Title </th>
                                            <th> Category </th>
                                            <th> Image </th>
                                            <th> Submit by</th>
                                            <th> Date </th>
                                            <th> Delete </th>
                                            <th> Edit </th>
                                            <th> FeedBack Description </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feed as $feed)
                                        <tr>
                                            <td>
                                            <span class="pl-2">{{$feed->title}}</span>
                                            </td>
                                            <td> {{$feed->category}}</td>
                                            <td>  <img class="img_size" src="/feedbackimage/{{$feed->image}}" alt="image"></td>
                                            <td> {{$feed->user_name}}</td>
                                            <td> {{$feed->created_at}}</td>
                                            <td><a href="{{url('delete_feedback', $feed->id)}}" class="btn btn-danger" 
                                                onclick="return confirm('Are you sure to Delete Feedback')">Delete</a></td>
                                            <td><a href="{{url('edit_feedback', $feed->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>{{$feed->description}}</td>
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