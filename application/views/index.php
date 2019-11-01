<div class="row">
	<div class="cover">
	</div>
</div>
<div class="row">
	<div class="col-xs-12" align="center">
		<h3 class="box-title">Home</h3>
	</div>
</div>
<div class="row" align="center">
	<a href="<?= base_url('event') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/event.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
	<a href="<?= base_url('wisata') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/wisata.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
	<a href="<?= base_url('blogs') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/text-lines.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
	<a href="<?= base_url('merchandise') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/box.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
	<a href="<?= base_url('verifteam') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/team.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
	<a href="<?= base_url('verifraider') ?>" class="a_black">
		<div class="col-xs-4" style="padding-right: 0px; padding-left: 0px">
			<div class="box" style=" width: 100px; height: 100px;">
				<div class="box-body" align="center">
					<img src="<?= base_url('assets/flaticon/rider.png') ?>" style=" width: 80px; height: 80px; ">
				</div>
			</div>
		</div>
	</a>
</div>
<div class="row">
	<div class="col-xs-6">
		<h3 class="box-title">Event</h3>
	</div>
	<div class="col-xs-6" align="right">
		<h3><a href="<?= base_url('event') ?>">All Event</a></h3>
	</div>
	<section id="">
		<div class="col-xs-12">
			<div class="large-12 columns">
				<div class="owl-carousel owl-theme" id="owl-event">
					<?php foreach ($tbl_event as $row) {
						$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event'));
						$rowteam = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $row['id'] . "'");
						$register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $row['id']));
						$rowraider = $this->mymodel->selectWithQuery("SELECT count(a.id) as rowraider from tbl_event_register_raider a INNER JOIN tbl_event_register b ON a.event_register_id = b.id WHERE b.event_id = " . $row['id']);
						?>
						<a href="<?= base_url('event/view/') . $row['id'] ?>">
							<div class="index-event mb">
								<div class="box">
									<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:125px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;">
										<?php
											if ($row['statusEvent'] == 'BERJALAN') {
												echo '<span class="label bg-yellow round right" style="margin-left:5px">BERJALAN</span>';
											} else if ($row['statusEvent'] == 'SELESAI') {
												echo '<span class="label bg-green round right" style="margin-left:5px">SELESAI</span>';
											} else if ($row['statusEvent'] == 'BATAL') {
												echo '<span class="label bg-red round right" style="margin-left:5px">DIBATALKAN</span>';
											} else {
												echo '<span class="label bg-blue round right" style="margin-left:5px">DIBUKA</span>';
											}
											?>
									</div>
									<div class="cards-text text-center" style="color: black">
										<p>
											<b class="title"><?= strlen($row["title"]) > 10 ? substr($row["title"], 0, 10) . "..." : $row["title"] ?></b>
											<br>
											<small> <?= $row['alamat'] ?></small>
											<br>
											<small>
												<?= date('d M Y', strtotime($row['tgleventStart'])) . "<b> s/d </b>" . date('d M Y', strtotime($row['tgleventEnd'])) ?>
											</small>
										</p>
									</div>
									<div class="row">
										<div class="col-xs-12" align="center" style="color: black">
											<b>
												<img src="<?= base_url('assets/flaticon/icon_rider.png') ?>" style="display: unset; width: 15px; height: 15px; margin-bottom: 5px;" /><?= $rowraider[0]['rowraider'] ?>
												<img src="<?= base_url('assets/flaticon/icon_team.png') ?>" style="display: unset; width: 15px; height: 15px; margin-bottom: 5px;" /><?= $rowteam[0]['rowteam'] ?>
											</b>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php if ($tbl_blog) { ?>
		<div class="col-xs-6">
			<h3 class="box-title">News</h3>
		</div>
		<div class="col-xs-6" align="right">
			<h3><a href="<?= base_url('blogs') ?>">All News</a></h3>
		</div>
		<section id="">
			<div class="col-xs-12">
				<div class="large-12 columns">
					<div class="owl-carousel owl-theme" id="owl-news">
						<?php foreach ($tbl_blog as $row) {
								$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_blog'));
								?>
							<a href="<?= base_url('blogs/view/') . $row['id'] ?>">
								<div class="index-event mb">
									<div class="box">
										<div class="cards-image" style="border-top-left-radius: 10px;border-top-right-radius: 10px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; height:225px;background: url(<?= $photo['url'] ?>);width:100%;background-position: center;background-size: cover;"></div>
										<div class="cards-text text-center" style="color: black">
											<p>
												<b class="title"><?= $row['title'] ?></b>
											</p>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php if ($tbl_gallery) { ?>
		<div class="col-xs-6">
			<h3 class="box-title">Gallery</h3>
		</div>
		<div class="col-xs-6" align="right">
			<h3><a href="<?= base_url('gallery') ?>">All Gallery</a></h3>
		</div>
		<section id="">
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
											</p>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	<div class="col-xs-6">
		<h3 class="box-title">Merch</h3>
	</div>
	<div class="col-xs-6" align="right">
		<h3><a href="<?= base_url('merchandise') ?>">All Merch</a></h3>
	</div>
	<section id="">
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
												echo '<span class="label bg-green round right" style="margin-left:5px">Stok Tersedia</span>';
											} else {
												echo '<span class="label bg-red round right" style="margin-left:5px">Stok Habis</span>';
											}
											?>
									</div>
									<div class="cards-text text-center" style="color: black">
										<p>
											<b class="title"> <?= substr($row['title'], 0, 10) ?></b>
											<br>
                                            <small><b>Rp. <?= number_format($row['harga'], 0, ',', '.') ?>,- </b></small>
										</p>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#owl-event').owlCarousel({
			center: false,
			items: 2,
			loop: false,
			margin: 10,
			responsive: {
				600: {
					items: 5
				}
			}
		})

		$('#owl-news').owlCarousel({
			center: false,
			items: 1,
			loop: false,
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
			loop: false,
			margin: 10,
			responsive: {
				600: {
					items: 5
				}
			}
		})

		$('#owl-merchandise').owlCarousel({
			center: false,
			items: 2,
			loop: false,
			margin: 10,
			responsive: {
				600: {
					items: 5
				}
			}
		})
	})
</script>