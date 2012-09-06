
<div id="admin">
    <h3> Promoter stuff </h3>
    <form method="POST" action="/bristolhouse/">
    <input type="hidden" name="kind" value="admin" />
    
    {$admin_message} <br />
    To add an event, copy and paste the URL of the event and press add. <br />
    event url: <input type="text" name="url" /> <br />
    e.g https://www.facebook.com/events/344420992304181/ <br />
    
    <input type="submit" value="Add" />
    </form>
</div>