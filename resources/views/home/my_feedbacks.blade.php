<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
  </head>

  <body>
    <!-- ======= Header ======= -->
    @include('home.header')
    <!-- End Header -->

                        
    @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>

                            @endif  

        <div class="container-fluid">
            <div class="container">
                <h1 style="text-align:center; padding:40px; font-size:30px;">My Feedbacks</h1>
                <table class="table table-striped table table-hover table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th> Date </th>
                        <th>Image</th>
                        <th>Delete</th>

                    </tr>
                    @foreach($feed as $feed)
                    <tr>
                        <td>{{$feed->title}}</td>
                        <td>{{$feed->description}}</td>
                        <td>{{$feed->category}}</td>
                        <td>{{$feed->created_at}}</td>
                        <td> <img class="img_size" src="/feedbackimage/{{$feed->image}}" alt="image"></td>
                        <td><a href="{{url('delete_my_feedback', $feed->id)}}" class="btn btn-danger" 
                                                onclick="return confirm('Are you sure to Delete Feedback')">Delete</a></td>                    </tr>
                    @endforeach
                </table>

            </div>

        </div>

    


       
      <!-- Vendor JS Files -->
    @include('home.js')
  </body>

</html>