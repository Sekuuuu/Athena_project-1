<h1>
    <?php echo $heading; ?>
</h1>

@if (count($listings) == 0)
    {{ 'No listings' }}
@endif


@foreach ($listings as $listing)
    <h2>
        <a href="/listings/{{ $listing['id'] }}">
            {{ $listing['title'] }}
        </a>
    </h2>
    <p>
        {{ $listing['description'] }}
    </p>
@endforeach
