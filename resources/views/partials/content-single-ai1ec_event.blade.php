<article itemscope itemtype="http://schema.org/Article" @php(post_class()) itemref="dateModified">
    <meta itemprop="headline" content="{!! get_the_title() !!}"/>
    <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
	<meta itemprop="name" content="BCCampus"/>
	<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
	  <meta itemprop="url" content="https://bccampus.ca/wp-content/themes/bcc-sage/dist/images/bccampus-logo.png"/>
	</span>
  </span>
    <header class="entry-header">
        <h2 itemprop="name">{!! get_the_title() !!}</h2>
    </header>
    <div itemprop="articleBody" class="entry-content ai1ec-single">
        <div itemprop="articleBody" class="entry-content">
            @php(the_content())
        </div>
    </div>
    <footer class="post-footer">
        @include('partials.events-related')
    </footer>
</article>