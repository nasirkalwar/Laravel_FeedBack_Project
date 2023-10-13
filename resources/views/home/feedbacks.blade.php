<section id="feedback" class="feedback">
      <div class="container" data-aos="fade-up">

      <div style="padding-top:50px;">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('feed_user_search')}}" method="get">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search Feed By Title & Name & Category " style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" style="width:10%; ">Search</button>
                                </form>
                            </li>
                        </ul>
                    </div>


        <div class="section-title">
 
          <h3>Products<span> Feedbacks</span></h3>
        </div>

        <div class="row">
      @foreach($feed as $feeds)
      
      
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="box featured">
                  <h3>{{$feeds->title}}</h3>
                  <h4><sup>Submit By :</sup><br>{{$feeds->user_name}}<span><br>Date on :<br>{{$feeds->created_at}}</span></h4>
                  <ul>
                    <li>{{$feeds->category}}</li>
                  </ul>
                  <div class="btn-wrap">
                    <a href="{{url('view_feedback',$feeds->id)}}" class="btn-buy">View More</a>
                  </div>
                </div>
              </div>
      @endforeach
      <span style="padding-top:20px;">
               {!!$feed->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
      </div>
    </section>