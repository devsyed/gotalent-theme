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
for ($i = 0; $i < $allowed_videos_link; $i++) {
  $values[] = (isset($portfolio_video_links['_meta_portfolio_video_link_' . $i])) ? $portfolio_video_links['_meta_portfolio_video_link_' . $i] : null;
}
$values_filtered = array_filter($values);
$merged_portfolio = array_merge($values_filtered, $portfolio);
?>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    lightGallery(document.getElementById('lightgallery'), {
      speed: 500,
    });
  })
</script>
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
          <?php if (!is_user_logged_in()) : ?>
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
        <div class="single-section-author">
          <h6>Overview</h6>
          <?php echo $description; ?>
        </div>
        <div class="single-section-author">
          <h6>Requirements</h6>
          <?php echo $requirements; ?>
        </div>

        <div class="single-section-author">
          <h6>Portfolio Images</h6>


          <div class="portfolio-images" id="lightgallery">
            <?php if (!empty($portfolio)) : foreach ($portfolio as $ps) : ?>
                <a href="<?php echo $ps ?>">
                  <img class="portfolio-item-single" src="<?php echo $ps ?>" alt="<?php echo $ps ?>">
                </a>
            <?php endforeach;
            endif; ?>
          </div>
        </div>
        <div class="single-section-author">
          <h6 class="mb-3">Portfolio Videos</h6>
          <div class="content-inside">
            <?php if (empty($portfolio)) : ?>
              <p>Talent does not have any media right now.</p>
              <?php else : ?>
                <hr>
              <div class="swiper portfolio">

                <div class="swiper-wrapper">
                  <?php if (is_array($portfolio) && !empty($portfolio)) : foreach ($merged_portfolio as $key => $ps) : ?>
                      <div class="swiper-slide">
                        <?php if (GTHelpers::gt_is_url($ps)) : ?>
                        <?php else : ?>
                          <iframe id="ytplayer" type="text/html" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $ps ?>?autoplay=1&origin=<?php echo home_url() ?>" frameborder="0"></iframe>
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
                        <?php if (GTHelpers::gt_is_url($ps)) : ?>

                        <?php else : ?>
                          <img class="portfolio-thumb-single" src="http://img.youtube.com/vi/<?php echo $ps ?>/mqdefault.jpg" alt="">
                        <?php endif; ?>
                      </div>
                  <?php endforeach;
                  endif; ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
        </div>
        <div class="single-section-author border-none">
          <h6 class="mb-3">Packages</h6>
          <div class="content-inside">
            <?php do_action('gt_talent_packages', $talent->ID); ?>
          </div>
        </div>
      </div>
      <?php if (current_user_can('can_manage_recruiter_and_talent')) : ?>
        <div class="col-lg-4">
          <div class="talent-confidential">
            <h6 class="text-end">Talent Confidential Information</h6>
            <p class="text-end"><small>This information is only visible to admin. </small></p>
            <p class="confidential-details-title">Bank Details</p>
            <ul>
              <li><strong>Bank Name:</strong> <?php echo get_user_meta($talent->ID, 'bank_name', true); ?></li>
              <li><strong>Account Number:</strong> <?php echo get_user_meta($talent->ID, 'account_number', true); ?></li>
              <li><strong>Swift Code</strong> <?php echo get_user_meta($talent->ID, 'swift_code', true); ?></li>
              <li><strong>IBAN Number</strong> <?php echo get_user_meta($talent->ID, 'iban_number', true); ?></li>
            </ul>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>