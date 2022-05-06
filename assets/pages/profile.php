<?php
global $user;
global $profile;
global $profilePost;
?>
<div class="bg-gray d-lg-block">

  <!-- =================================== -->

  <!-- profile  -->
  <div class="container-fluid ">
    <div class="row d-flex justify-content-center align-items-center">



      <!-- post section -->

      <div class="col-12 col-lg-6 pb-5">
        <div class="d-flex flex-column justify-content-center w-100 mx-auto" style="padding-top: 56px; max-width: 680px">

          <!-- profile view/change -->
          <div class="bg-white mt-5 p-4 d-flex flex-column justify-content-between rounded-corner border shadow position-relative">

            <!-- for avatar and name and edit button -->
            <div class="d-flex flex-row">
              <!-- avatar -->
              <div class="d-flex">
                <div class="p-1 me-2">
                  <img src="assets/images/profiles/<?= $profile['pfp'] ?>" alt="avatar" class="rounded-circle me-2" style="width: 80px; height: 80px; object-fit: cover" />
                </div>
              </div>
              <!-- name -->
              <div class="d-flex align-items-center justify-content-center">
                <div class="d-flex">
                  <h3><?= $profile['f_name'] ?> <?= $profile['l_name'] ?></h3>
                </div>
              </div>

              <!-- edit profile button -->
              <div class="d-flex ms-3">
                <?php
                if ($_SESSION['userdata']['f_name'] == $profile['f_name'] and $_SESSION['userdata']['l_name'] == $profile['l_name']) {
                ?>
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="?editprofile">
                      <button class="btn rounded btn-outline-primary">
                        <i class="fa-solid fa-pen me-3"></i>Edit Profile
                      </button>
                    </a>
                  </div>
                <?php
                } else {
                ?>
                  <div class="d-flex justify-content-center align-items-center">
                    <?php
                    if (checkSubscribeStatus($profile['user_id'])) {
                    ?>
                      <button class="btn rounded btn-outline-primary unsubbtn" data-user-id="<?= $profile['user_id'] ?>">
                        <i class="bi bi-check-circle-fill"></i> Unsubscribe
                      <?php
                    } else {
                      ?>
                        <button class="btn rounded btn-outline-primary subbtn" data-user-id="<?= $profile['user_id'] ?>">
                          <i class="bi bi-person-plus-fill me-3"></i>Subscribe
                        <?php
                      }
                        ?>
                        </button>
                  </div>
                <?php
                }
                ?>

              </div>

            </div>

            <!-- number of post, followers, following -->
            <div class="d-flex flex-row align-items-center justify-content-center">
              <div class="d-flex flex-column flex-lg-row mt-3">
                <!-- number of post-->
                <div class="
                      dropdown-item
                      rounded
                      border
                      d-flex 
                      me-2
                      px-3
                      bg-gray
                      align-items-center
                      justify-content-center
                    " type="button">
                  <a class="m-0 text-muted text-decoration-none"><span><?= count($profilePost) ?></span> Posts</a>
                </div>
                <!-- number of followers-->
                <div class="
                      dropdown-item
                      rounded
                      border
                      d-flex
                      me-2
                      px-3
                      bg-gray
                      align-items-center
                      justify-content-center
                    " type="button">
                  <a class="m-0 text-muted text-decoration-none" data-bs-toggle="modal" data-bs-target="#sub_list"><span><?= count($profile['subscribers']) ?></span> subscribers</a>
                </div>
                <!-- number of following-->
                <div class="
                      dropdown-item
                      rounded
                      border
                      d-flex
                      me-2
                      px-3
                      bg-gray
                      align-items-center
                      justify-content-center
                    " type="button">
                  <a class="m-0 text-muted text-decoration-none" data-bs-toggle="modal" data-bs-target="#subbed_list"><span class="font-weight-bold"><?= count($profile['subscribed']) ?></span> subscribed</a>
                </div>
              </div>

            </div>

            <!-- description -->
            <div class="d-flex mt-2">
              <p><?= $profile['about'] ?></p>

            </div>

          </div>

          <?php
          if ($_SESSION['userdata']['user_id'] == $profile['user_id']) {
          ?>
            <!-- create post -->
            <div class="bg-white p-3 mt-3 rounded-corner border shadow">
              <!-- avatar -->
              <div class="d-flex" type="button">
                <div class="p-1">
                  <img src="assets/images/profiles/<?= $profile['pfp'] ?>" alt="avatar" class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                </div>
                <input type="text" class="form-control rounded-pill border-1 bg-gray cursor-pointer" disabled placeholder="What news have you got, <?= $profile['f_name'] ?>?" data-bs-toggle="modal" data-bs-target="#modalForPost" />
              </div>
              <!-- create modal -->
              <div class="modal fade" id="modalForPost" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class=" modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <!-- head -->
                    <div class="modal-header align-items-center">
                      <h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
                        Create Post
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- here form start -->

                    <form action="" method="post">
                      <!-- body -->
                      <div class="modal-body">
                        <div class="my-1 p-1">
                          <div class="d-flex flex-column">
                            <!-- name -->
                            <div class="d-flex align-items-center">
                              <div class="p-2">
                                <img src="https://source.unsplash.com/collection/happy-people" alt="from fb" class="rounded-circle" style="
                                            width: 38px;
                                            height: 38px;
                                            object-fit: cover;
                                          " />
                              </div>
                              <div>
                                <p class="m-0 fw-bold">Rohit</p>
                              </div>
                            </div>
                            <!-- text -->
                            <div>
                              <textarea cols="30" rows="2" placeholder="heading for your news ..." class="form-control border-1 " required></textarea>
                            </div>

                            <label class="mt-1">Upload images/videos</label>
                            <!-- drag and drop -->
                            <div class="d-flex my-2 py-4 border rounded d-flex-row align-items-center justify-content-center bg-gray">

                              <div class="d-block align-items-center justify-content-center">


                                <input type="file" multiple>
                                <!-- media icon -->

                              </div>
                            </div>
                            <!-- location -->
                            <div>
                              <div class="form-floating">

                                <input type="text" class="form-control my-3 " id="city" name="dgsh" placeholder="Select City" autocomplete="city" required>
                                <label name="djkldsl" for="city">Select City</label>
                              </div>

                            </div>
                          </div>
                        </div>

                        <!-- end -->
                      </div>
                      <!-- footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">
                          Post
                        </button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
            <hr />
            <!-- actions -->
            <div class="d-flex flex-column flex-lg-row mt-3">
              <!-- a 1 -->
              <div class="
                          dropdown-item
                          rounded
                          d-flex
                          align-items-center
                          justify-content-center
                        " data-bs-toggle="modal" data-bs-target="#modalForPost" type="button">
                <i class="fas fa-video me-2 text-danger"></i>
                <p class="m-0 text-muted"> Video</p>
              </div>
              <!-- a 2 -->
              <div class="
                          dropdown-item
                          rounded
                          d-flex
                          align-items-center
                          justify-content-center
                        " data-bs-toggle="modal" data-bs-target="#modalForPost" type="button">
                <i class="fas fa-photo-video me-2 text-success"></i>
                <p class="m-0 text-muted">Photo/Video</p>
              </div>

            </div>
        </div>
      <?php
          }
      ?>

      <?php
      foreach ($profilePost as $post) {
      ?>
        <!-- posts -->
        <div class="bg-white p-4 rounded-corner shadow mt-3">
          <!-- author -->
          <div class="d-flex justify-content-between">
            <!-- avatar -->
            <div class="d-flex">
              <img src="assets/images/profiles/<?= $profile['pfp'] ?>" alt="avatar" class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
              <div>
                <p class="m-0 fw-bold"><?= $profile['f_name'] ?> <?= $profile['l_name'] ?>
                  <?php
                  if ($profile['verified'] == 1) {
                  ?>
                    <i class="bi bi-patch-check-fill mx-2 text-primary"></i>
                  <?php
                  }
                  ?>
                </p>
                <span class="text-muted fs-7"><?= $post['posted_on'] ?> | <?= $post['post_location'] ?></span>
              </div>
            </div>
            <!-- edit -->
            <i class="fas fa-ellipsis-h" type="button" id="post1Menu" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <!-- edit menu -->
            <ul class="dropdown-menu border-0 shadow" aria-labelledby="post1Menu">
              <?php
              if ($_SESSION['userdata']['user_id'] == $profile['user_id']) {
              ?>
                <li class="d-flex align-items-center">
                  <a class="
                              dropdown-item
                              d-flex
                              justify-content-around
                              align-items-center
                              fs-7
                            " href="#">
                    Edit Post</a>
                </li>
                <li class="d-flex align-items-center">
                  <a class="
                              dropdown-item
                              d-flex
                              justify-content-around
                              align-items-center
                              fs-7
                            " href="#">
                    Delete Post</a>
                </li>
              <?php
              } else {
              ?>
                <li class="d-flex align-items-center">
                  <a class="
                              dropdown-item
                              d-flex
                              justify-content-around
                              align-items-center
                              fs-7
                            " href="#">
                    Report</a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <!-- description -->
          <div class="d-flex mt-2">
            <p><?= $post['post_header'] ?></p>

          </div>

          <!-- post content -->
          <div class="mt-3">
            <!-- content -->
            <div>

              <!-- carousel of posts images -->
              <div id="carouselExampleInterval2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded">
                  <div class="carousel-item active">
                    <div class=" position-absolute top-0 end-0 m-1 text-white bg-black p-1 rounded">1/3</div>
                    <?php
                    $hasalpha = false;
                    $img = $post['images'];
                    for ($i = 0; $i < strlen($img); $i++) {
                      if (ctype_alpha($img[$i])) {
                        $hasalpha = true;
                        break;
                      }
                    }
                    if ($hasalpha) {
                    ?>
                      <img src="assets/images/posts/<?= $post['images'] ?>" class="d-block w-100" alt="post1">
                    <?php
                    }
                    ?>

                  </div>
                  <!-- <div class="carousel-item">
                        <div class=" position-absolute top-0 end-0 m-1 text-white bg-black p-1 rounded">2/3</div>
                        <img src="https://source.unsplash.com/random/13" class="d-block w-100" alt="post2">
                      </div>
                      <div class="carousel-item">
                        <div class="ratio ratio-4x3">
                          <video class="rounded" controls>
                            <source src="sample_video.mp4" type="video/mp4">
                            Your browser does not supports video
                          </video>
                        </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

              <!-- carousel end -->

            </div>
            <!-- likes & comments -->
            <div class="post__comment mt-3 position-relative">
              <!-- likes -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item border-0">
                  <!-- comment collapse -->
                  <h2 class="accordion-header" id="headingTwo">
                    <div class="
                            accordion-button
                            collapsed
                            pointer
                            d-flex
                            justify-content-end
                          " data-bs-toggle="collapse" data-bs-target="#collapsePost1" aria-expanded="false" aria-controls="collapsePost1">
                      <p class="m-0">2 Comments</p>
                    </div>
                  </h2>
                  <hr />
                  <!-- real,fake, share comment-->
                  <div class="d-flex justify-content-around">
                    <!-- real icon -->
                    <div class="
                            dropdown-item
                            rounded
                            d-flex
                            justify-content-center
                            align-items-center
                            pointer
                            text-muted
                            p-1
                          ">
                      <i class="fas fa-thumbs-up me-3"></i>
                      <p class="m-0">Real</p>
                    </div>
                    <!-- real icon -->
                    <div class="
                            dropdown-item
                            rounded
                            d-flex
                            justify-content-center
                            align-items-center
                            pointer
                            text-muted
                            p-1
                          ">
                      <i class="fa-solid fa-thumbs-down me-3"></i>
                      <p class="m-0">Fake</p>
                    </div>
                    <!-- real icon -->
                    <div class="
                            dropdown-item
                            rounded
                            d-flex
                            justify-content-center
                            align-items-center
                            pointer
                            text-muted
                            p-1
                          ">
                      <i class="fa-solid fa-share me-3"></i>
                      <p class="m-0">Share</p>
                    </div>
                    <!-- comment icon -->
                    <div class="
                            dropdown-item
                            rounded
                            d-flex
                            justify-content-center
                            align-items-center
                            pointer
                            text-muted
                            p-1
                          " data-bs-toggle="collapse" data-bs-target="#collapsePost1" aria-expanded="false" aria-controls="collapsePost1">
                      <i class="fas fa-comment-alt me-3"></i>
                      <p class="m-0">Comment</p>
                    </div>
                  </div>
                  <!-- comment expand -->
                  <div id="collapsePost1" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <hr />
                    <div class="accordion-body">
                      <!-- comment 1 -->
                      <div class="d-flex align-items-center my-1">
                        <!-- avatar -->
                        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar" class="rounded-circle me-2" style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                        <!-- comment text -->
                        <div class="p-3 rounded comment__input w-100">
                          <!-- comment menu of author -->
                          <div class="d-flex justify-content-end">
                            <!-- icon -->
                            <i class="fas fa-ellipsis-h text-blue pointer" id="post1CommentMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <!-- menu -->
                            <ul class="dropdown-menu border-0 shadow" aria-labelledby="post1CommentMenuButton">
                              <li class="d-flex align-items-center">
                                <a class="
                                        dropdown-item
                                        d-flex
                                        justify-content-around
                                        align-items-center
                                        fs-7
                                      " href="#">
                                  Edit Comment</a>
                              </li>
                              <li class="d-flex align-items-center">
                                <a class="
                                        dropdown-item
                                        d-flex
                                        justify-content-around
                                        align-items-center
                                        fs-7
                                      " href="#">
                                  Delete Comment</a>
                              </li>
                            </ul>
                          </div>
                          <p class="fw-bold m-0">Rohit</p>
                          <p class="m-0 fs-7 bg-gray p-2 rounded">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.
                          </p>
                        </div>
                      </div>
                      <!-- comment 2 -->
                      <div class="d-flex align-items-center my-1">
                        <!-- avatar -->
                        <img src="https://source.unsplash.com/random/2" alt="avatar" class="rounded-circle me-2" style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                        <!-- comment text -->
                        <div class="p-3 rounded comment__input w-100">
                          <p class="fw-bold m-0">Jerry</p>
                          <p class="m-0 fs-7 bg-gray p-2 rounded">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.
                          </p>
                        </div>
                      </div>
                      <!-- create comment -->
                      <form class="d-flex my-1">
                        <!-- avatar -->
                        <div>
                          <img src="https://source.unsplash.com/collection/happy-people" alt="avatar" class="rounded-circle me-2" style="
                                  width: 38px;
                                  height: 38px;
                                  object-fit: cover;
                                " />
                        </div>
                        <!-- input -->
                        <input type="text" class="form-control border-0 rounded-pill bg-gray" placeholder="Write a comment" />
                      </form>
                      <!-- end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- end -->
            </div>
          </div>
        </div>

      <?php
      }
      ?>


      </div>

    </div>

    <!-- post section end -->

  </div>
</div>
<!-- profile  -->

  <!-- subscribers list modal -->
  <div class="modal fade" id="sub_list" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- head -->
        <div class="modal-header align-items-center">
          <h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
            Subscribers
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
            foreach ($profile['subscribers'] as $sub) {
              $sub_user = getUser($sub['subscriber_id']);
              $sub_btn = '';
              if (checkSubscribeStatus($sub['subscriber_id'])) {
                $sub_btn = '<button class="btn rounded btn-outline-primary unsubbtn" data-user-id="'.$sub_user['user_id'].'">
                <i class="bi bi-check-circle-fill me-3"></i>Unsubscribe';
              }elseif ($user['user_id'] == $sub['subscriber_id']) {
                $sub_btn = '';
              } else {
                $sub_btn = '<button class="btn rounded btn-outline-primary subbtn" data-user-id="'.$sub_user['user_id'].'">
                <i class="bi bi-person-plus-fill me-3"></i>Subscribe';
              }
              ?>
              <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profiles/<?=$sub_user['pfp']?>" alt="" height="40" width="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href='?u=<?=$sub_user['f_name']?>_<?=$sub_user['l_name']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?=$sub_user['f_name']?> <?=$sub_user['l_name']?></h6></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <?=$sub_btn?>              
                    </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- subscribed users list modal -->
  <div class="modal fade" id="subbed_list" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- head -->
        <div class="modal-header align-items-center">
          <h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
            This user has subscribed these accounts
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
            foreach ($profile['subscribed'] as $sub) {
              $sub_user = getUser($sub['user_id']);
              $sub_btn = '';
              if (checkSubscribeStatus($sub['user_id'])) {
                $sub_btn = '<button class="btn rounded btn-outline-primary unsubbtn" data-user-id="'.$sub_user['user_id'].'">
                <i class="bi bi-check-circle-fill me-3"></i>Unsubscribe';
              }elseif ($user['user_id'] == $sub['user_id']) {
                $sub_btn = '';
              } else {
                $sub_btn = '<button class="btn rounded btn-outline-primary subbtn" data-user-id="'.$sub_user['user_id'].'">
                <i class="bi bi-person-plus-fill me-3"></i>Subscribe';
              }
              ?>
              <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profiles/<?=$sub_user['pfp']?>" alt="" height="40" width="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href='?u=<?=$sub_user['f_name']?>_<?=$sub_user['l_name']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?=$sub_user['f_name']?> <?=$sub_user['l_name']?></h6></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <?=$sub_btn?>              
                    </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>  
</div>