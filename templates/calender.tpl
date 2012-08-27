
<div id="main">

<table id='calender' >
{section name=var loop=$calender}
    <tr>
        {section name=var2 loop=$calender[var]}
            <td class="{$calender[var][var2]['class']}" id="{$calender[var][var2]['id']}"> {$calender[var][var2]['value']}</td>
        {/section}
    </tr>
{/section}
</table>

</div>