<% if AutoRefresh %>
<div class="refresh-auto-refresh hide">$AutoRefresh</div>
<div class="refresh-delay hide">$RefreshDelay</div>
<div class="refresh-grid-field-id hide">$GridFieldID</div>
<% else %>
<button name="action_refresh" value="Refresh" class="font-icon-sync grid-refresh-button btn btn-secondary">
    <span class="btn__title">Refresh</span>
</button>
<% end_if %>