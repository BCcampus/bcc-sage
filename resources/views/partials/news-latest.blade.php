<div class="row-fluid">
  <h4 class="pad">BCcampus News</h4>
  @foreach($get_latest_news as $news)
    <h3><a href="{{$news->guid}}" rel="bookmark" title="{{$news->post_title}}">{{$news->post_title}}</a></h3>
    <p><a href="{{$news->guid}}" rel="bookmark" title="{{$news->post_title}}">Read the Article</a> <i class="fa fa-arrow-right fa-lg"></i></p>
    @endforeach
</div>
