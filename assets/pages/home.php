<?php
global $user;
global $posts;
?>
<div class="bg-gray d-lg-block">
	<!-- =================================== -->

	<!-- profile  -->
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<!-- post section -->

			<div class="col-12 col-lg-6 pb-5">
				<div class="d-flex flex-column justify-content-center w-100 mx-auto" style="padding-top: 56px; max-width: 680px">
					<!-- posts -->
					<?= showError("post_img") ?>
					<?php
					foreach ($posts as $post) {
						$likes = getLikes($post['post_id']);
					?>
						<div class="bg-white p-4 rounded-corner shadow mt-3">
							<!-- author -->
							<div class="d-flex justify-content-between">
								<!-- avatar -->
								<div class="d-flex">
									<img src="assets/images/profiles/<?= $post['pfp'] ?>" alt="avatar" class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
									<div>
										<a href="?u=<?= $post['f_name'] . '_' . $post['l_name'] ?>" class="text-decoration-none cursor-pointer text-dark">
											<p class="m-0 fw-bold"><?= $post['f_name'] . ' ' . $post['l_name'] ?></p>
										</a>
										<span class="text-muted fs-7"><?= $post['posted_on'] ?> | <?= $post['post_location'] ?></span>
									</div>
								</div>
								<!-- edit -->
								<i class="fas fa-ellipsis-h" type="button" id="post1Menu" data-bs-toggle="dropdown" aria-expanded="false"></i>
								<!-- edit menu -->
								<ul class="dropdown-menu border-0 shadow" aria-labelledby="post1Menu">
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
								</ul>
							</div>
							<!-- post content -->
							<div class="mt-3">
								<!-- content -->
								<div>
									<p>
										<?= $post['post_header'] ?>
									</p>
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
										<img src="assets/images/posts/<?= $post['images'] ?>" alt="post image" class="img-fluid rounded" width="100%" />
									<?php
									}
									?>


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
											<span class="p-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#likes<?=$post['post_id']?>"><?= count($likes) ?> likes</span>
											<hr />
											<!-- real,fake, share comment-->
											<div class="d-flex justify-content-around">
												<!-- real icon -->
												<span>
													<?php
													if (checkLikeStatus($post['post_id'])) {
														$like_btn_display = 'none';
														$unlike_btn_display = '';
													} else {
														$like_btn_display = '';
														$unlike_btn_display = 'none';
													}
													?>
													<i class="bi bi-hand-thumbs-up-fill me-3 unlike_btn" data-post-id="<?= $post['post_id'] ?>" style="display:<?= $unlike_btn_display ?>"></i>
													<i class="bi bi-hand-thumbs-up me-3 like_btn" data-post-id="<?= $post['post_id'] ?>" style="display:<?= $like_btn_display ?>"></i>
												</span>
												<!-- fake icon -->
												<div class="
									dropdown-item
									rounded
									d-flex
									justify-content-center
									align-items-center
									cursor-pointer
									text-muted
									p-1
								">
													<i class="bi bi-hand-thumbs-down me-3"></i>
													<p class="m-0">Fake</p>
												</div>
												<!-- real icon -->
												<div class="
									dropdown-item
									rounded
									d-flex
									justify-content-center
									align-items-center
									cursor-pointer
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
									cursor-pointer
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
						<div class="modal fade" id="likes<?=$post['post_id']?>" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
						<div class=" modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<!-- head -->
								<div class="modal-header align-items-center">
									<h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
										Liked by
									</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?php
									if (count($likes)<1) {
										?>
											<p>No likes currently</p>
										<?php
									}
									foreach ($likes as $like) {
										$sub_user = getUser($like['user_id']);
										$sub_btn = '';
										if (checkSubscribeStatus($like['user_id'])) {
											$sub_btn = '<button class="btn rounded btn-outline-primary unsubbtn" data-user-id="' . $sub_user['user_id'] . '">
											<i class="bi bi-check-circle-fill me-3"></i>Unsubscribe';
										} elseif ($user['user_id'] == $like['user_id']) {
											$sub_btn = '';
										} else {
											$sub_btn = '<button class="btn rounded btn-outline-primary subbtn" data-user-id="' . $sub_user['user_id'] . '">
											<i class="bi bi-person-plus-fill me-3"></i>Subscribe';
										}
									?>
										<div class="d-flex justify-content-between">
											<div class="d-flex align-items-center p-2">
												<div><img src="assets/images/profiles/<?= $sub_user['pfp'] ?>" alt="" height="40" width="40" class="rounded-circle border">
												</div>
												<div>&nbsp;&nbsp;</div>
												<div class="d-flex flex-column justify-content-center">
													<a href='?u=<?= $sub_user['f_name'] ?>_<?= $sub_user['l_name'] ?>' class="text-decoration-none text-dark">
														<h6 style="margin: 0px;font-size: small;"><?= $sub_user['f_name'] ?> <?= $sub_user['l_name'] ?></h6>
													</a>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<?= $sub_btn ?>
											</div>
										</div>
									<?php
									}
									?>
								</div>
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

</div>