<?php 
	$imgSrc = $UPLOAD_WDIR_BOARD . '/' . $data['thumb_image'];
?>

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-review">
                        <section class="no-view-default no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-pd-48--b">
										<?php
											if ($board_no == 11) {
										?>
											<h2 class="no-heading-sm">치료후기</h2>
										<?php
											}
										?>

										<?php
											if ($board_no == 12) {
										?>
											<h2 class="no-heading-sm">면역채널</h2>
										<?php
											}
										?>

										<?php
											if ($board_no == 13) {
										?>
											<h2 class="no-heading-sm">면역소식</h2>
										<?php
											}
										?>
                                </hgroup>

                                <div class="view-wrap no-mg-24--t fade-up">
                                    <div class="view-top">
                                        <?php
											if ($board_no == 11) {
										?>
                                        <a href="/pages/board/board.list.php?board_no=<?=$board_no?>&category_no=<?=$data['category_no']?>"
                                            class="no-body-lg fw600 blue category"><?=$data['category_name']?> <i
                                                class="fa-solid fa-angle-up fa-rotate-90"></i></a>
                                        <?php
											}
										?>

                                        <?php
											if ($board_no == 12) {
										?>
                                        <p class="no-body-lg fw300"><?=$data['extra1']?></p>
                                        <?php
											}
										?>

                                        <?php
											if ($board_no == 13) {
										?>
                                        <p class="no-body-lg fw300">[<?=$data['category_name']?>]</p>
                                        <?php
											}
										?>

                                        <?php
											$backUrl = "/pages/board/board.list.php?board_no={$board_no}";
											if (!empty($data['category_no'])) {
												$backUrl .= "&category_no={$data['category_no']}";
											}
										?>
                                        <a href="<?=$backUrl?>" class="no-body-md fw300 back">뒤로가기</a>

                                    </div>

                                    <div class="view-title no-mg-12--t">
                                        <h3 class="no-body-xxl fw600 no-mg-8--b"><?=$data['title']?></h3>
                                        <p class="no-body-lg fw300 wgray">
                                            <?= date("Y.m.d", strtotime($data['regdate'])) ?></p>
                                    </div>

                                    <!---- 11,12의 경우 영상 업로드 요청하셔서 summernote에서 영상 업로드 예정입니다. css 수정 필요.
                                    <figure class="view-thumnail no-mg-24--y">
                                        <?php if ($board_no == 13): ?>
                                        <img src="/uploads/board/<?=$data['file_attach_1']?>" alt="<?=$data['title']?>"
                                            class="no-radius-sm">
                                        <?php endif; ?>
                                    </figure>---->

                                    <div class="view-content">

									<?php if ($board_no == 11 && !empty($data['direct_url'])): ?> 
										<iframe 
											src="https://www.youtube.com/embed/<?= htmlspecialchars($data['direct_url'], ENT_QUOTES, 'UTF-8') ?>" 
											title="YouTube video player" 
											frameborder="0" 
											allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
											referrerpolicy="strict-origin-when-cross-origin" 
											allowfullscreen>
										</iframe>
									<?php endif; ?>
                                        <?=htmlspecialchars_decode($data['contents'])?>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>

                    <?php include_once $STATIC_ROOT."/pages/board/components/prevnext.php"; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>