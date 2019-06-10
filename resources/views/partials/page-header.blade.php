@if(is_page() || is_singular( 'ai1ec_event' ))
<div class="page-header d-flex flex-column-reverse" style="background-image: url({{\App\App::getThumbUrl($post->ID)}});">
	<div class="container-fluid">
		<div class="d-flex">
			<h1 itemprop="name" class="d-flex entry-title blue-bkgd">{!! App::title() !!}</h1>
		</div>
	</div>
</div>
		@else
		<div class="d-flex flex-column-reverse">
		<div class="container-fluid">
				<h1 itemprop="name" class="d-flex entry-title blue-bkgd">{!! App::title() !!}</h1>
			</div>
		</div>
			 @endif
@if( ! is_front_page() )
	<div class="container-fluid">
		<nav class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
			@foreach ( $bread_crumbs as $key => $item )
				<span class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				@if ( empty( $item['link'] ) )
						<span itemscope itemtype="http://schema.org/Thing" itemprop="item">
						<span itemprop="name">{{ esc_html( $item['title'] ) }}</span>
					</span>
					@else
						<a itemscope itemtype="http://schema.org/Thing" itemprop="item"
						   href="{{ esc_url( $item['link'] ) }}"><span
								itemprop="name">{{ esc_html( $item['title'] ) }}</span></a>
					@endif
					<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>"/>
				</span>
			@endforeach
		</nav>
	</div>
@endif
