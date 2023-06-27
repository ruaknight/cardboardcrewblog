<div class="p-5">
    <h1>Hottest games</h1>
    <?php $i=0?>
    @while($i < 11)
        <a href="{{ config('services.bgg.redirectUrl').$hotBgs [$i]['@attributes']['id']}}">{{ $hotBgs [$i]['name']['@attributes']['value']  }}</a><br>
        <?php $i++ ?>
    @endwhile
</div>
