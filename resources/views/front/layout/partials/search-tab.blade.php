<div class="header-bottom">
	<div class="container ">
		<div class="row">
			<div class="header-bottom-left col-lg-3 col-md-2 col-3">
				
			</div>
			<div class="header-bottom-right col-lg-9 col-md-10 col-9">
				<div class="row">
					<div class="header-bottom__search collapsed-block col-xl-9 col-lg-8 col-sm-8 col-4">
						<h5 class="search-info-heading  d-sm-none d-xl-none">
							<span class="expander btn btn-outline-secondary"> <i class="fa fa-search"></i> </span>
						</h5>
						<div class="sb-quickSearch search-info-content" aria-hidden="true" tabindex="-1" data-prevent-quick-search-close>
							<form class="sb-searchpro" method="GET">
								<fieldset class="form-fieldset">
									<div class="input-group">
										<input class="form-control form-input" value="{{@request()->keyword}}" data-search-quick name="keyword" id="search_query" data-error-message="Search field cannot be empty." placeholder="Search" autocomplete="off">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" id="btn-quickSearch" type="submit"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</fieldset>
							</form>
							<div class="dropdown dropdown--quickSearch">
								<section class="quickSearchResults " data-bind="html: results"></section>
							</div>
						</div>
					</div>
					<div class="header-bottom__cart col-xl-3 col-lg-4 col-sm-4 col-8 text-right">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>