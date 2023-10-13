<!DOCTYPE html>
<html lang="en">
<base href="/public">
  <head>
    @include('home.css')
  </head>

  <body>
    <!-- ======= Header ======= -->
    @include('home.header')
    <!-- End Header -->

    <div class="container-fluid" style="padding-top:50px;">
            <div class="container">

            <section id="faq" class="faq section-bg">
              <div class="container" data-aos="fade-up">
              @foreach($feed as $feeds)
                                
                                <div class="section-title">
                                    <h1>{{$feeds->title}}</h1>
                                </div>
                            <div class="container">
                                <div class="col-lg-12">



                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">

                                                    <section id="contact" class="contact">

                                                        <div class="row" data-aos="fade-up" data-aos-delay="100">



                                                                <div class="desc">
                                                                    <h5></h5>
                                                                </div>
                                                                @if($feeds->image)
                                                                <div class="row" >
                                                                    <div class="col form-group" style="border:2px solid skyblue;">
                                                                        <p>{{$feeds->description}}</p>
                                                                    </div>
                                                                    <div class="col form-group" style="border:2px solid skyblue;">
                                                                        <img class="img_size" src="/feedbackimage/{{$feeds->image}}" alt="image">
                                                                    </div>
                                                                </div>
                                                                @else
                                                                    <div class="form-group" style="border:2px solid skyblue;">
                                                                            <p>{{$feeds->description}}</p>
                                                                    </div>
                                                                @endif
                                                                <div class="row" >
                                                                    <div class="col form-group">
                                                                        <h5><b>Category :</b> {{$feeds->category}}</h5>
                                                                    </div>
                                                                    <div class="col form-group">
                                                                    <h5><b>Submit By :</b> {{$feeds->user_name}}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            


                                                                                <form action="{{url('/upvote',$feeds->id)}}" method="post">
                                                                                    @csrf 
                                                                                    <button type="submit" class="btn btn-success">Upvote</button>      
                                                                                </form><br>
                                                                                <form action="{{url('/downvote',$feeds->id)}}" method="post">
                                                                                    @csrf
                                                                                
                                                                                    <button type="submit" class="btn btn-primary">downvote</button>      
                                                                                </form>

                                                                
                                                                                    

                                                        <span style="padding-top:20px;">
                                                            {!!$feed->withQueryString()->links('pagination::bootstrap-5')!!}
                                                        </span>
                                                

                                                                <div style="padding-top:50px;">   
                                                                    <div class="section-title">

                                                                    @if (session()->has('message'))
                                                                        <div class="alert alert-success">
                                                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                                                            {{session()->get('message')}}
                                                                        </div>

                                                                        @endif

                                                                        <h1  style="font-size:30px; color:skyblue;">Comments</h1>
                                                                        <form action="{{url('add_comment',$feeds->id)}}" method="post">
                                                                            @csrf
                                                                            <textarea style="height:150px; width:600px;" name="comment" placeholder="Comment here"></textarea>
                                                                            <br><button type="submit" class="btn btn-primary" style="color:blue;">Comment</button>
                                                                        </form>
                               
                                                                    </div>  
                                                                </div>
                                                                @foreach($comment as $comment)
                                                                @if($feeds->title==$comment->feedback_title)
                                                                <div style="padding-left:20%;">
                                                                    <h1 style="font-size:30px; padding-bottom:30px;">All Comments</h1>
                                                                    <div>
                                                                        <b>{{$comment->name}}</b>
                                                                        <p>{{$comment->comment}}</p>
                                                                        <sub>{{$comment->created_at}}</sub><br><br>
                                                                        <a href="javascript::void(0):" onClick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>
                                                                    </div>


                                                                            @foreach($reply as $reply)
                                                                               @if($comment->feedback_id==$reply->feedback_id)
                                                                                <div style="padding-left:40px; padding-bottom:10px;">
                                                                                        <b>{{$reply->name}}</b>
                                                                                        <p>{{$reply->reply}}</p>
                                                                                        <sub>{{$reply->created_at}}</sub>
                                                                                </div>
                                                                                @endif
                                                                            @endforeach


                                                                    @endif
                                                                 @endforeach

                                                                    <div style="display:none;" class="replydiv">

                                                                            <form action="{{url('reply',$feeds->id)}}" method="post">
                                                                               @csrf
                                                                            <Input type="text" id="commentId" name="commentId" hidden="">
                                                                            <textarea style="height:100px; width:500px;" name="reply" placeholder="write reply here"></textarea>
                                                                            <br><button typy="submit" class="btn btn-primary">Reply</button>
                                                                            <a href="javascript::void(0):" class="btn" onClick="reply_close(this)">Close</a>
                    
                                                                    </div>

                    @endforeach
                                                                </div>

                                                                
                                                                
                                                    </section>
                                                       
                                    
                                    
                                    </div>
                            </div>


                        </div>
                    </section>

            </div>
    </div>       
      <!-- Vendor JS Files -->
<script type="text/javascript">
    function reply(caller)
    {
        document.getElementById('commentId').value=$(caller).attr('data-commentid');
        $('.replydiv').insertAfter($(caller));
        $('.replydiv').show();
    }
    function reply_close(caller)
    {
        $('.replydiv').hide();
    }
</script>

    @include('home.js')
  </body>

</html>