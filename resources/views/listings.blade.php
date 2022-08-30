<h1>{{$heading}}</h1>


@if(count($listings) ==0 )

    <p>No Listings Found</p>
    
@endif



@foreach ($listings as $listing)
    <h2>{{$listing['title']}}</h2>
    <h3>{{'Post ID: '. $listing ['id'] }} </h3>
    <p>{{ $listing['description'] }}</p>

@endforeach