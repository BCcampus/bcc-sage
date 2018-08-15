<div class="page-header">
    <h1 itemprop="name" class="entry-title blue-bkgd">{!! App::title() !!}</h1>
</div>
@if( ! is_front_page() )
	<nav class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		@foreach ( $bread_crumbs as $key => $item )
			@if ( empty( $item['link'] ) )
				<span class="breadcrumb-item" itemscope itemtype="http://schema.org/ListItem"
					  itemprop="itemListElement">{{ esc_html( $item['title'] ) }}</span>
			@else
				<a class="breadcrumb-item" itemprop="item"
				   href="{{ esc_url( $item['link'] ) }}"><span
						itemprop="name">{{ esc_html( $item['title'] ) }}</span></a>
			@endif
		@endforeach
	</nav>
@endif
