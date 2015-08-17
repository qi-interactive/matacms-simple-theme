<?php 

use mata\user\models\User;
use matacms\theme\simple\assets\HistoryAsset;
use matacms\environment\models\ItemEnvironment;
use matacms\theme\simple\assets\ModuleIndexAsset;

HistoryAsset::register($this);

$returnUri = Yii::$app->request->get('returnURI');

$environmentModule = \Yii::$app->getModule("environment");

?>
<ol class="revisions overlay-list-container">
	
	<li>

		<a href="/mata-cms/post/post/update?id=1&amp;revision=4">
			<div class="text-container">
				<span class="author">
					Michal Fiedorowicz				</span>

					<span class="message">
						wrote this version				</span>


						<span title="2015-08-04 08:32:05" class="date">13 days ago</span>
					</div>


					<div class="small-list list-version-container live" style="margin-right: -40px;"> 
						<div class="fadding-container"> </div>
						<div class="list-version-inner-container">
							<div class="version-status"> 

								<span>
									LIVE						</span>
								</div>

							</div>
						</div>

					</a>
				</li>

				<li>

					<a href="/mata-cms/post/post/update?id=1&amp;revision=3">
						<div class="text-container">
							<span class="author">
								Michal Fiedorowicz				</span>

								<span class="message">
									wrote this version				</span>


									<span title="2015-08-04 08:31:44" class="date">13 days ago</span>
								</div>


								<div class="small-list list-version-container draft" style="margin-right: -54px;"> 
									<div class="fadding-container"> </div>
									<div class="list-version-inner-container">
										<div class="version-status"> 

											<span>
												DRAFT						</span>
											</div>

										</div>
									</div>

								</a>
							</li>

							<li>

								<a href="/mata-cms/post/post/update?id=1&amp;revision=2">
									<div class="text-container">
										<span class="author">
											Will Heaverman				</span>

											<span class="message">
												wrote this version				</span>


												<span title="2015-06-12 09:44:57" class="date">2 months ago</span>
											</div>


											<div class="small-list list-version-container superseded" style="margin-right: -92px;"> 
												<div class="fadding-container"> </div>
												<div class="list-version-inner-container">
													<div class="version-status"> 

														<span>
															SUPERSEDED						</span>
														</div>

													</div>
												</div>

											</a>
										</li>

										<li>

											<a href="/mata-cms/post/post/update?id=1&amp;revision=1">
												<div class="text-container">
													<span class="author">
														Michal Fiedorowicz				</span>

														<span class="message">
															created this document				</span>


															<span title="2015-06-05 10:33:17" class="date">2 months ago</span>
														</div>


														<div class="small-list list-version-container draft" style="margin-right: -54px;"> 
															<div class="fadding-container"> </div>
															<div class="list-version-inner-container">
																<div class="version-status"> 

																	<span>
																		DRAFT						</span>
																	</div>

																</div>
															</div>

														</a>
													</li>

													<li>

														<a href="/mata-cms/post/post/update?id=1&amp;revision=1">
															<div class="text-container">
																<span class="author">
																	Michal Fiedorowicz				</span>

																	<span class="message">
																		created this document				</span>


																		<span title="2015-06-05 10:33:17" class="date">2 months ago</span>
																	</div>

																	
																	<div class="small-list list-version-container scheduled" style="margin-right: -54px;"> 
																		<div class="fadding-container"> </div>
																		<div class="list-version-inner-container">
																			<div class="version-status"> 

																				<span>
																					SCHEDULED					</span>
																				</div>

																			</div>
																		</div>

																	</a>
																</li>

															</ol>