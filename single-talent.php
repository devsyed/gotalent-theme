<?php 
/** 
 * Template Name: Single Talent
 */
get_header();
$user_id = get_post_meta(get_the_ID(), 'talent_user_id', true);
$user = get_user_by('id', $user_id);
?>

<section class="wrapper-author-page-title stc2 d-flex align-item-center"
    style="background-image:url(images/bg-cover.jpeg)">
    <div class="tf-container">
      <div class="wd-author-page-title">
        <div class="author-archive-header d-flex align-item-center">
          <img src="<?php echo get_avatar_url($user->ID) ?>" alt="images/user/avatar/avt-author-1.jpg" class="logo-company">
          <div class="content">
            <h3><a href="#"><?php echo $user->first_name . ' ' . $user->last_name ?></a> <span class="icon-bolt"></span></h3>
            <ul class="author-list">
              <li class="ms-0 map"> <span class="icon-map-pin"></span>&nbsp; Tokyo, Japan </li>
              <li class="price"><span class="icon-dolar1"></span>&nbsp; $300/day </li>
            </ul>
          </div>
        </div>
        <div class="author-archive-footer">
          <div class="group-btn">
            <button class="tf-btn">Follow</button>
            <button class="tf-btn btn-author">Message</button>
          </div>
        </div>

      </div>
    </div>
  </section>
  <section class="candidates-section">
    <div class="tf-container">
      <div class="row">
        <div class="col-lg-8">
          <article class="job-article tf-tab single-job stc2">
            <ul class="menu-tab">
              <li class="ct-tab active">Resumes</li>
              <li class="ct-tab">Portfolio</li>
              <li class="ct-tab">Contact</li>
            </ul>
            <div class="content-tab">
              <div class="inner-content mt-5">
                <h5>About me</h5>
                <p>Are you a User Experience Designer with a track record of delivering intuitive digital experiences
                  that
                  drive results? Are you a strategic storyteller and systems thinker who can concept and craft smart,
                  world-class campaigns across a variety of mediums?
                </p>
                <p class="mg-39">Deloitte's Green Dot Agency is looking to add a Lead User Experience Designer to our
                  experience design team. We want a passionate creative who's inspired by new trends and emerging
                  technologies, and is able to integrate them into memorable user experiences. A problem solver who is
                  entrepreneurial, collaborative, hungry, and humble; can deliver beautifully designed, leading-edge
                  experiences under tight deadlines; and who has demonstrated proven expertise.
                </p>


                <h5>Portfolio</h5>
                <div class="video-thumb">
                  <div class="content-tab2">
                    <div class="inner">
                      <div class="thumb">
                        <img src="images/review/thumbv3.jpg" alt="images">
                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI" class="lightbox-image">
                          <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M27.5795 50.5623C40.2726 50.5623 50.5624 40.2725 50.5624 27.5794C50.5624 14.8863 40.2726 4.59656 27.5795 4.59656C14.8865 4.59656 4.59668 14.8863 4.59668 27.5794C4.59668 40.2725 14.8865 50.5623 27.5795 50.5623Z"
                              fill="#EB4D4D"></path>
                            <path
                              d="M20.9141 27.5794V24.1779C20.9141 19.7882 24.0167 18.0185 27.8089 20.2019L30.7507 21.9026L33.6925 23.6034C37.4847 25.7867 37.4847 29.3721 33.6925 31.5554L30.7507 33.2562L27.8089 34.9569C24.0167 37.1403 20.9141 35.3476 20.9141 30.9809V27.5794Z"
                              fill="white"></path>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <ul class="thumb-menu menu-tab2">
                    <li class="ct-tab2"> <a class="lightbox-gallery" href="images/review/thumbv4.jpg"><img
                          src="images/review/thumbv4.jpg" alt="images"></a> </li>
                    <li class="ct-tab2"> <a class="lightbox-gallery" href="images/review/thumbv1.jpg"><img
                          src="images/review/thumbv1.jpg" alt="images"></a></li>
                    <li class="ct-tab2"><a class="lightbox-gallery" href="images/review/thumbv2.jpg"><img
                          src="images/review/thumbv2.jpg" alt="images"></a></li>
                  </ul>
                </div>

              </div>
              <div class="inner-content mt-4">
                <h5>About me</h5>
                <p>Are you a User Experience Designer with a track record of delivering intuitive digital experiences
                  that
                  drive results? Are you a strategic storyteller and systems thinker who can concept and craft smart,
                  world-class campaigns across a variety of mediums?
                </p>
              </div>
              <div class="inner-content mt-4">
                <h5>About Company</h5>
                <p>Are you a User Experience Designer with a track record of delivering intuitive digital experiences
                  that
                  drive results? Are you a strategic storyteller and systems thinker who can concept and craft smart.
                </p>
              </div>
            </div>
          </article>
        </div>
        <div class="col-lg-4 ">
          <form action="">
            <div class="cv-form-details stc2 po-sticky">
              <div id="calendar"></div>
              <div class="gt-booking-details">
                <div class="gt-form-control mt-3 w-100">
                  <label for="last_name" class="form-label">Event Description</label>
                  <textarea id="event_description" class="form-control" placeholder="Describe Your Event, eg: Birthday Party" required></textarea>
                </div>
                <div class="d-flex justify-content-between gap-3">
                  
                  <div class="gt-form-control mt-3 w-50">
                    <label for="last_name" class="form-label">Number of Hours Required</label>
                    <input type="number" id="number_of_hours" class="form-control" placeholder="Min: 1 Hour" min="1" required>
                  </div>
                  <div class="gt-form-control mt-3 w-50">
                    <label for="last_name" class="form-label">Event Starts at:</label>
                    <input type="time" id="starting_time" class="form-control" required>
                  </div>
                </div>
                <div class="d-flex justify-content-between gap-3">
                  <div class="gt-form-control mt-3 w-50">
                    <label for="last_name" class="form-label">City of Event:</label>
                    <select name="city" id="city">
                      <option value="dubai">Dubai</option>
                      <option value="dubai">Sharjah</option>
                      <option value="dubai">Ras Al Khaimah</option>
                    </select>
                  </div>
                  <div class="gt-form-control mt-3 w-50">
                    <label for="last_name" class="form-label">Number of Expected Guests</label>
                    <input type="number" id="number_of_guests" class="form-control" placeholder="Guests you are expecting" min="1" required>
                  </div>
                  
                </div>
                <hr>
                <div class="gt-form-control">
                  <p class="d-flex justify-content-between mt-3 align-item-center">
                    <span class="d-flex flex-column justify-content-start"><strong>Pricing: </strong>Per Hour Rate x Total Booked Hours</span>
                    <span class="text-lg pricing" data-hourly-rate="100">AED 1000</span>
                  </p>
                  
                </div>
                <hr>
                <div class="gt-form-control mt-3 w-100">
                  <label for="last_name" class="form-label">Custom Budget</label>
                  <input type="number" id="number_of_guests" class="form-control" placeholder="Your Budget" min="1" required>
                  <span>* Note: It is upto the talent to honor this request.</span>
                </div>
                <a href="#" class="btn-dowload mt-3"><i class="fa-solid fa-arrow-up-right-from-square"></i>Send Query</a>
                <p class="text-start mt-3 leading-0"><strong>*</strong> Booking will only be confirmed once the talent
                  accepts your request.</p>
              </div>
              <button class="btn-gt-default w-100 mt-4" id="show_booking_details">Book Talent</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>