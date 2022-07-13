<section class="p-bread">
	<div class="p-bread__body">
		<a href="javascript:history.back()" class="c-icon__w16 c-icon--back"></a>
		<ul class="p-list__bread" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="{{ route('admin') }}" class="ico" itemscope itemtype="http://schema.org/Thing" itemprop="item">
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
				<p itemprop="name">@yield('page_title')</p>
				<meta itemprop="position" content="">
			</li>
		</ul>
	</div>
</section>