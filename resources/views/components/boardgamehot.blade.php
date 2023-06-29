{{--{{ dd($hotBgs) }}--}}

<div class="p-5 ">
    <h1 class="uppercase py-5 px-1" style="font-family: Montserrat; font-size: large; font-weight: 500;">Hottest games</h1>
    <?php $i=0?>
    @while($i < 10)
        <div class="border-t-2 border-gray-100 py-2 px-1">
        <a href="{{ config('services.bgg.redirectUrl').$hotBgs[$i]['@attributes']['id']}}">
            {{ $hotBgs[$i]['name']['@attributes']['value']  }}</a><br>
        <?php $i++ ?>
        </div>
    @endwhile
</div>
