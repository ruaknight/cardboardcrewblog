<div class="p-5">
    <?php $i=0?>
    @while($i < 11)
        <h1>{{ $hotBgs [$i]['name']['@attributes']['value']  }}</h1>
        <?php $i++ ?>
    @endwhile
</div>
