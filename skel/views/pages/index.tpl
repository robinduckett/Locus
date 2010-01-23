<span class="success">Success! Locus {$version} is running.</span>
{if $database}
  <span class="success">Success! Locus can connect to the database.</span>
{else}
  <span class="fail">Failure! Locus can <span class="bad">not</span> connect to the database.</span>
{/if}
<div style="clear: both"></div>
