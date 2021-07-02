<!-- notification.blade.php --> 

<!DOCTYPE html>
<head>
  <title>Laravel Real Time Notification Tutorial With Example</title>
  <h1>Laravel Real Time Notification Tutorial With Example</h1>
  <h1 id="notif"></h1>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>
    let count=0;
   var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
      cluster: '{{env("PUSHER_APP_CLUSTER")}}',
      encrypted: true
    });

    var channel = pusher.subscribe('notify-channel');
    channel.bind('App\\Events\\Notify', function(data) {
      count++;
      console.log(count);
      document.getElementById('notif').innerHTML=count;
    });
  </script>
</head>