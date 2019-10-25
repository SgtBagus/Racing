<div class="row">
	<div class="col-xs-6">
		<h3>Event</h3>
	</div>
	<div class="col-xs-6" align="right">
		<h3><a href="<?= base_url('event') ?>">All Event</a></h3>
	</div>
</div>
<section id="">
	<div class="row">
		<div class="col-xs-12">
			<div class="large-12 columns">
				<div class="owl-carousel owl-theme" id="owl-event">
					<?php foreach ($tbl_event as $row) {
						$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event'));
						$rowteam = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $row['id'] . "'");
						$register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $row['id']));
						$rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $register_id['id'] . "'");
						?>
						<a href="<?= base_url('event/view/') . $row['id'] ?>">
							<div class="index-event mb">
								<div class="box">
									<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:125px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;">
										<?php
											if ($row['status'] == 'ENABLE') {
												echo '<span class="label bg-green round right" style="margin-left:5px">Dibuka</span>';
											} else {
												echo '<span class="label bg-red round right" style="margin-left:5px">Ditutup</span>';
											}
											?>
									</div>
									<div class="cards-text text-center" style="color: black">
										<p>
											<b class="title"><?= strlen($row["title"]) > 20 ? substr($row["title"], 0, 20) . "..." : $row["title"] ?></b>
											<br>
											<small><?= $row['kota'] ?> </small>
											<br>
											<small>
												<?= date('d-M', strtotime($row['tgleventStart'])) . " s/d " . date('d-M', strtotime($row['tgleventEnd'])) ?>
											</small>
										</p>
									</div>
									<div class="row">
										<div class="col-xs-12" align="center" style="color: black">
											<i class="fa fa-motorcycle"></i> <?= $rowraider[0]['rowraider'] ?>
											<i class="fa fa-users"></i> <?= $rowteam[0]['rowteam'] ?>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ($tbl_blog) { ?>
	<div class="row">
		<div class="col-xs-6">
			<h3>Blogs And News</h3>
		</div>
		<div class="col-xs-6" align="right">
			<h3><a href="<?= base_url('blogs') ?>">All Blogs And News</a></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="large-12 columns">
				<div class="owl-carousel owl-theme" id="owl-news">
					<?php foreach ($tbl_blog as $row) {
							$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_blog'));
							?>
						<a href="<?= base_url('blogs/view/') . $row['id'] ?>">
							<div class="index-event mb">
								<div class="box">
									<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:125px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;"></div>
									<div class="cards-text text-center" style="color: black">
										<p>
											<b class="title"><?= $row['title'] ?></b>
											<br>
											<small>
												<?= date('d-M-Y', strtotime($row['created_at'])) ?>
											</small>
										</p>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php if ($tbl_gallery) { ?>
	<div class="row">
		<div class="col-xs-6">
			<h3>Gallery</h3>
		</div>
		<div class="col-xs-6" align="right">
			<h3><a href="<?= base_url('gallery') ?>">All Gallery</a></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="large-12 columns">
				<div class="owl-carousel owl-theme" id="owl-gallery">
					<?php foreach ($tbl_gallery as $row) {
							$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'master_gallery'));
							?>
						<a href="<?= base_url('gallery/view/') . $row['id'] ?>">
							<div class="index-event mb">
								<div class="box">
									<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:225px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;"></div>
									<div class="cards-text text-center" style="color: black">
										<p>
											<b class="title"><?= $row['value'] ?></b>
											<br>
											<small>
												<?= date('d-M-Y', strtotime($row['created_at'])) ?>
											</small>
										</p>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="row">
	<div class="col-xs-6">
		<h3>Merch</h3>
	</div>
	<div class="col-xs-6" align="right">
		<h3><a href="<?= base_url('merchandise') ?>">All Merch</a></h3>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="large-12 columns">
			<div class="owl-carousel owl-theme" id="owl-merchandise">
				<?php foreach ($tbl_merchandise as $row) {
					$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_merchandise')); ?>
					<a href="<?= base_url('merchandise/view/') . $row['id'] ?>">
						<div class="index-event mb">
							<div class="box">
								<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:125px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;">
									<?php
										if ($row['status'] == 'ENABLE') {
											echo '<span class="label bg-green round right" style="margin-left:5px">Dibuka</span>';
										} else {
											echo '<span class="label bg-red round right" style="margin-left:5px">Ditutup</span>';
										}
										?>
								</div>
								<div class="cards-text text-center" style="color: black">
									<p>
										<b class="title"> <?= $row['title'] ?></b>
										<br>
										<span>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></span>
									</p>
								</div>
							</div>
						</div>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#back").remove();
		$('#owl-event').owlCarousel({
			center: true,
			items: 2,
			loop: true,
			margin: 10,
			responsive: {
				600: {
					items: 4
				}
			}
		})

		$('#owl-news').owlCarousel({
			center: false,
			items: 2,
			loop: true,
			margin: 10,
			responsive: {
				600: {
					items: 4
				}
			}
		})

		$('#owl-gallery').owlCarousel({
			center: false,
			items: 1,
			loop: true,
			margin: 10,
			responsive: {
				600: {
					items: 4
				}
			}
		})

		$('#owl-merchandise').owlCarousel({
			center: true,
			items: 2,
			loop: true,
			margin: 10,
			responsive: {
				600: {
					items: 4
				}
			}
		})
	})
</script>
