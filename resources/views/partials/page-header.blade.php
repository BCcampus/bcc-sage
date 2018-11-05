<div class="page-header d-flex flex-column-reverse">
	<div class="container-fluid">
		<div class="d-flex">
			<h1 itemprop="name" class="d-flex entry-title blue-bkgd">{!! App::title() !!}</h1>
		</div>
	</div>
</div>
@if( ! is_front_page() )
	<div class="container-fluid">
		<nav class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
			@foreach ( $bread_crumbs as $key => $item )
				@if ( empty( $item['link'] ) )
					<span class="breadcrumb-item" itemprop="itemListElement" itemscope
						  itemtype="http://schema.org/ListItem">{{ esc_html( $item['title'] ) }}
					</span>
				@else
					<a class="breadcrumb-item" itemprop="item"
					   href="{{ esc_url( $item['link'] ) }}"><span
							itemprop="name">{{ esc_html( $item['title'] ) }}</span></a>
				@endif
			@endforeach
		</nav>
	</div>
@endif
