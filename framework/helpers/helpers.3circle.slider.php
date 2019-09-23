<?php
function three_circle() {
	global $tpl;
	$style= get_option($tpl->name . "_three_circle_style");
	if ($style == 'circle1') :
	?>
    
    <div class="circle1">
	<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">				
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-1"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>	
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-2"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                         <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-3">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-3"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                         <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
                </div>
<?php elseif ($style == 'circle2') : ?>
    <div class="circle2">
    <ul class="ch-grid">
                        <li>
                            <div class="ch-item ch-img-1">
                                <div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item ch-img-2">
                                <div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item ch-img-3">
                                <div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
                                </div>
                            </div>
                        </li>
                    </ul>
     </div>
<?php elseif ($style == 'circle3') : ?>
			<div class="circle3">
				<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-3">
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
						</div>
					</li>
				</ul>
			</div>
<?php elseif ($style == 'circle4') : ?>
		<div class="circle4">
				<ul class="ch-grid">
					<li>
						<div class="ch-item">	
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
							<div class="ch-thumb ch-img-1"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
							<div class="ch-thumb ch-img-2"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
							</div>
							<div class="ch-thumb ch-img-3"></div>
						</div>
					</li>
				</ul>
			</div>
<?php elseif ($style == 'circle5') : ?>
		<div class="circle5">
				<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">				
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-1"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>	
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-2"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-3">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-3"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
		</div>
<?php elseif ($style == 'circle6') : ?>
		<div class="circle6">
				<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">				
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-1"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>	
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-2"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-3">
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front ch-img-3"></div>
									<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
		</div>
<?php elseif ($style == 'circle7') : ?>
		<div class="circle7">
				<ul class="ch-grid">
					<li>
						<div class="ch-item">				
							<div class="ch-info">
								<div class="ch-info-front ch-img-1"></div>
								<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_1") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_1") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_1") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_1") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<div class="ch-info-front ch-img-2"></div>
								<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_2") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_2") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_2") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_2") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<div class="ch-info-front ch-img-3"></div>
								<div class="ch-info-back">
										<h3><?php echo get_option($tpl->name . "_three_circle_title_3") ?></h3>
										<p><?php echo get_option($tpl->name . "_three_circle_text_3") ?></p>
                                        <?php if (get_option($tpl->name . "_three_circle_link_3") != '') :?>
                                        <a  href="<?php echo get_option($tpl->name . "_three_circle_link_3") ?>"><?php _e( 'read more', DPTPLNAME); ?></a>
                                        <?php endif ?>
								</div>
							</div>
						</div>
					</li>
				</ul>
</div>

<?php endif; } 
?>