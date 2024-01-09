<?php
/*
Template Name: Talent Author Page
*/
get_header();
$talent = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$profile_image = (get_user_meta($talent->ID, 'profile_image_url', true)) ? get_user_meta($talent->ID, 'profile_image_url', true) : get_avatar_url($talent->ID);
$cover_image = get_user_meta($talent->ID, 'cover_image_url', true);
$description = get_user_meta($talent->ID, 'bio_description', true); 
$country = get_user_meta($talent->ID, 'country', true);
$city = get_user_meta($talent->ID, 'city', true);

$portfolio = !empty(get_user_meta($talent->ID, 'portfolio_links', true)) ? get_user_meta($talent->ID, 'portfolio_links', true) : [];
$requirements = get_user_meta($talent->ID, 'requirement_for_performing', true);
$available_days = (get_user_meta($talent->ID, 'available_days', true)) ? get_user_meta($talent->ID, 'available_days', true) : [];
$expected_days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
$missing_days = implode(',', array_keys(array_diff($expected_days, $available_days)));


$allowed_videos_link = 5;
$portfolio_video_links = get_user_meta($talent->ID, 'portfolio_video_links', true);
$values = [];
for($i = 0; $i < $allowed_videos_link; $i++){
    $values[] = (isset($portfolio_video_links['_meta_portfolio_video_link_' . $i])) ? $portfolio_video_links['_meta_portfolio_video_link_' . $i] : null;
}
$values_filtered = array_filter($values);
$merged_portfolio = array_merge($values_filtered, $portfolio);
?>

<section class="wrapper-author-page-title stc2 d-flex align-item-center" style="background-image:url(<?php echo $cover_image; ?>)">
  <div class="tf-container">
    <div class="wd-author-page-title">
      <div class="author-archive-header d-flex align-item-center">
        <img src="<?php echo $profile_image ?>" alt="images/user/avatar/avt-author-1.jpg" class="logo-company">
        <div class="content">
          <h3 class="text-white"><a><?php echo $talent->first_name . ' ' . $talent->last_name ?></a></h3>
          <ul class="author-list">
            <li class="ms-0 map"> <span class="icon-map-pin"></span>&nbsp; <?php echo $city ?>, <?php echo $country ?> </li>
          </ul>
        </div>
      </div>
      <div class="author-archive-footer">
        <div class="group-btn">
          <?php if ($talent->ID === get_current_user_id()) :  ?>
            <a href="/gotalent-dashboard/manage-profile" class="tf-btn btn-author">Edit Profile</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="author-archive-footer">
        <div class="group-btn">
          <?php if(!is_user_logged_in()): ?>
              <button class="btn-gt-default" data-bs-toggle="modal" data-bs-target="#registration-modal">Login to Book Talent</button>
          <?php endif; ?>
        
          <?php if ($talent->ID !== get_current_user_id() && is_user_logged_in()) :  ?>
            <a href="/book-talent?talent_id=<?php echo $talent->ID ?>" class="tf-btn btn-author">Book Me</a>
          <?php endif; ?>
            
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
            <li class="ct-tab active">Description</li>
            <li class="ct-tab">Media</li>
            <li class="ct-tab">Requirements</li>
            <li class="ct-tab">Packages</li>
          </ul>
          <div class="content-tab">
            <div class="inner-content mt-5">
              <h5>About me</h5>
              <p>
                <?php echo $description; ?>
              </p>

            </div>
            <div class="inner-content mt-4">
              <div class="current-portfolio d-flex justify-content-space-between flex-wrap align-items-start">
                <div class="swiper portfolio">
                  <div class="swiper-wrapper">
                    <?php if (is_array($portfolio) && !empty($portfolio)) : foreach ($merged_portfolio as $key => $ps) : ?>
                        <div class="swiper-slide">
                          <?php if(GTHelpers::gt_is_url($ps)): ?>
                            <img class="portfolio-item-single"  src="<?php echo $ps ?>" alt="<?php echo $ps ?>">
                          <?php else: ?>
                            <iframe id="ytplayer" type="text/html" width="100%" height="500"
                            src="https://www.youtube.com/embed/<?php echo $ps ?>?autoplay=1&origin=<?php echo home_url() ?>"
                            frameborder="0"></iframe>
                          <?php endif; ?>
                        </div>
                    <?php endforeach;
                    endif; ?>
                  </div>
                </div>
                <div class="portfolio-thumbs swiper">
                    <div class="swiper-wrapper">
                    <?php if (is_array($portfolio) && !empty($portfolio)) : foreach ($merged_portfolio as $key => $ps) : ?>
                        <div class="swiper-slide">
                        <?php if(GTHelpers::gt_is_url($ps)): ?>
                            <img class="portfolio-thumb-single" width="100" height="100"  src="<?php echo $ps ?>" alt="<?php echo $ps ?>">
                          <?php else: ?>
                            <img class="portfolio-thumb-single" src="http://img.youtube.com/vi/<?php echo $ps ?>/mqdefault.jpg" alt="">
                          <?php endif; ?>
                        </div>
                    <?php endforeach;
                    endif; ?>
                    </div>
                </div>
              </div>
            </div>

            <div class="inner-content mt-4">
              <?php echo $requirements; ?>
            </div>
            <div class="inner-content mt-4">
              <?php do_action('gt_talent_packages', $talent->ID); ?>
            </div>
          </div>
        </article>
      </div>
      <div class="col-lg-4 ">
        <form action="">
          <div class="cv-form-details stc2 po-sticky">
            <div id="calendar" data-blocked-days="<?php echo $missing_days; ?>"></div>
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
              <?php if (get_user_meta($talent->ID, 'accept_custom_offers', true) == 'on') : ?>
                <div class="gt-form-control mt-3 w-100">
                  <label for="last_name" class="form-label">Custom Budget</label>
                  <input type="number" id="number_of_guests" class="form-control" placeholder="Your Budget" min="1" required>
                  <span>* Note: It is upto the talent to honor this request.</span>
                </div>
              <?php endif; ?>
              <a href="#" class="btn-dowload mt-3"><i class="fa-solid fa-arrow-up-right-from-square"></i>Send Query</a>
              <p class="text-start mt-3 leading-0"><strong>*</strong> Booking will only be confirmed once the talent
                accepts your request.</p>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>