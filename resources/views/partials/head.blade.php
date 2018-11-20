<head>
	<meta charset="utf-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="google-site-verification" content="IQ5X6Lwp0QSIiwWqxeZHv8v7D30eoVamvKnDF66-6ck"/>
	@foreach($get_micro_data as $itemprop => $content)
		<meta itemprop="{{$itemprop}}" content="{{$content}}" id="{{$itemprop}}"/>
	@endforeach
	@php(wp_head())
</head>
