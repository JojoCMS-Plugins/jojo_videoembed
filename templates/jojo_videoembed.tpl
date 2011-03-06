{if $youtubeid}
<div class="youtube-video">
<iframe class="youtube-player" width="{$videow}" height="{$videoh}" src="http://www.youtube.com/embed/{$youtubeid}" frameborder="0">
</iframe>
</div>
{elseif $vimeoid}
<iframe src="http://player.vimeo.com/video/{$vimeoid}" width="{$videow}" height="{$videoh}" frameborder="0"></iframe>
{else}
<a href="{$videourl}">{$videourl}</a>
{/if}