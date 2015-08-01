<div class="youtube-video{if $OPTIONS.videoembed_responsive=='yes'} video-responsive{/if}">
{if $youtubeid}<iframe class="youtube-player" width="{$videow}" height="{$videoh}" src="http://www.youtube.com/embed/{$youtubeid}?rel=0" frameborder="0" allowfullscreen></iframe>
{elseif $vimeoid}<iframe src="http://player.vimeo.com/video/{$vimeoid}" width="{$videow}" height="{$videoh}" frameborder="0" allowfullscreen></iframe>
{else}<a href="{$videourl}">{$videourl}</a>
{/if}
</div>
