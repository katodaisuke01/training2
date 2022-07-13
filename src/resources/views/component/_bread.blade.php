<section class="p-bread">
	<div class="p-bread__body">
		<ul class="p-list__bread" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="{{ route('index') }}" class="ico" itemscope itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name">トップ</span>
				</a>
				<meta itemprop="position" content="1"../>
			</li>
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="#">
					<span itemprop="name">@yield('title')</span>
				</a>
				<meta itemprop="position" content="">
			</li>
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="on">
				<p itemprop="name">現在のページ</p>
				<meta itemprop="position" content="">
			</li>
		</ul>
	</div>
</section>