<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
  </head>

  <body>
    <!-- ======= Header ======= -->
    @include('home.header')
    <!-- End Header -->

      <!-- ======= Hero Section ======= -->
      @include('home.herosection')
      <!-- End Hero -->

      <main id="main">

        <!-- ======= Feedbacks Section ======= -->
        @include('home.feedbacks')
        <!-- End Feedbacks Services Section -->
    
        <!-- ======= Form Section ======= -->
        <section id="faq" class="faq section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Form</h2>
              <h3>Send Products <span>FeedBacks</span></h3>
            </div>

            <div class="row justify-content-center">
              <div class="col-xl-10">          
              
                      <section id="contact" class="contact">

                        <div class="row" data-aos="fade-up" data-aos-delay="100">

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{session()->get('message')}}
                            </div>

                            @endif  

                          <div class="col-lg-12">
                                
                          <form action="{{url('send_feedback')}}" method="post" role="form" >
                              @csrf
                              <div class="form-group">
                                <input  type="text" class="form-control" name="title" id="subject" placeholder="Write Title" required>
                              </div>
                              <div class="form-group">
                                <textarea style="margin-top:20px;" class="form-control" name="description" rows="5" placeholder="Description" required></textarea>
                              </div>
                              <div class="row" >
                                <div class="col form-group">
                                    <label>Feedback Category</label>
                                    <Select name="category"style="color:black; width:200px;">
                                        <option vlaue="select">--Select--</option>
                                        <option vlaue="Bug Report">Bug Report</option>
                                        <option vlaue="Feature Request">Feature Request</option>
                                        <option vlaue="Improvement">Improvement</option>
                                     </Select>
                                </div>
                                <div class="col form-group">
                                  <input type="file" class="form-control" name="image">
                                </div>
                              </div>
                              <div class="text-center"><button type="submit">Send FeedBack</button></div>
                            </form>
                          </div>

                        </div>

                        </div>
                    </section>

              </div>
            </div>

          </div>
        </section>
        <!-- End Form Section -->

      </main>
      <!-- End #main -->
    
       
      <!-- Vendor JS Files -->
    @include('home.js')
  </body>

</html>