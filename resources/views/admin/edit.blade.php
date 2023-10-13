<!DOCTYPE html>
<html lang="en">
  <head>
<base href="/public">
  <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
    .container h1
    {
        font-size:40px;
        padding:20px;
    }
    hr 
    {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }
    form
    {
        padding-top:50px;
        text-align:center;
    }
    label
    {
        display:inline-block;
        width:200px;
        font-size:20px;
        color:white;
    }
    .div_center
    {
        padding-top:30px;
        color:black;
    }
</style>

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

                    
                   
                
                      <div class="row " style="padding-top:50px;">
                            <div class="col-12 grid-margin">
                                
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>

                            @endif  
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title" style="text-align:center;">Update FeedBack</h1>
                                            <hr>                                
                                


                                        <form action="{{url('update_feedback',$feed->id)}}" method="Post" enctype="multipart/form-data">
                                            @csrf  
                                                <div class="div_center">
                                                    <label>Title</label>
                                                    <Input type="text" name="title" value="{{$feed->title}}" Required="">
                                                </div>
                                                <div class="div_center">
                                                    <label>Category</label>
                                                    <Select name="category"style="color:black; width:215px;">
                                                        <option vlaue="{{$feed->category}}">{{$feed->category}}</option>
                                                        <option vlaue="Bug Report">Bug Report</option>
                                                        <option vlaue="Improvement">Improvement</option>
                                                        <option vlaue="Features">Featuers</option>

                                                    </Select>
                                                </div>
                                                <div class="div_center">
                                                    <label>Description</label>
                                                    <Input type="text" name="description" value="{{$feed->description}}" Required="">
                                                </div>
                                                <div class="div_center">
                                                    <label>Image</label>
                                                    <Input type="file" name="image" value="{{$feed->image}}">
                                                </div>
                                                <div class="div_center">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                            </form>

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