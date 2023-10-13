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
                <div class="content-wrapper" style="padding-top:100px;">





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
                                    <h1 class="card-title" style="text-align:center; font-size:40px;">All Comments</h1>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th> Comment ID </th>
                                            <th> Comment </th>
                                            <th> Comment By </th>
                                            <th> FeedBack Title </th>
                                            <th> Date </th>
                                            <th> Delete Comment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comment as $comment)
                                        <tr>
                                            <td> {{$comment->id}}</td>
                                            <td>
                                            <span class="pl-2">{{$comment->comment}}</span>
                                            </td>
                                            <td> {{$comment->name}}</td>
                                            <td> {{$comment->feedback_title}}</td>
                                            <td><a href="{{url('delete_comment', $comment->id)}}" class="btn btn-danger" 
                                                onclick="return confirm('Are you sure to Delete comment')">Delete</a></td>                                            
                                            <td> {{$comment->created_at}}</td>
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