<html>
<head>
<link type="text/css" href="src/index.css" rel="stylesheet">
<script>

</script>
<link href="notify/themes/relax.css" rel="stylesheet">
<script src="notify/noty.js" type="text/javascript"></script>
<script src="src/index.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="?controller=pages&action=home">
<img src="src/cropped-logo-png.png">
</a>
<div class="collapse navbar-collapse" id="navbarsExampleDefault">
<ul class="collapse navbar-collapse justify-content-end navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href='?controller=pages&action=home'>Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href='?controller=events&action=calendar'>Calendario</a>
</li>
<li class="nav-item">
<a class="nav-link" href='?controller=events&action=index'>Eventi</a>
</li>
<li class="nav-item">
<a class="nav-link" href='?controller=pages&action=manual'>Manuale</a>
</li>
</ul>
</div>

</nav>
</header>
<div class="main">
<div class="container first-container">
<?php require_once('routes.php'); ?>
</div>
</div>

<footer>
<script>
  function Noty_setCookie( cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie =  "notification=" + cvalue + ";" + expires + ";path=/";
  }

  function Noty_getCookie() {
    var name = "notification=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


  document.addEventListener('DOMContentLoaded', function() {
    
    
    <?php $notification_events = Event::all_open(); ?>
    
    
    event_notifications = [
      <?php foreach ($notification_events as $event): ?>
        {
        "start_date": "<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $event->start_date);  echo $date->format('Y-m-d H:i:s'); ?>", 
        "end_date": "<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $event->end_date);  echo $date->format('Y-m-d H:i:s'); ?>", 
        "end_time": "<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $event->end_date);  echo $date->format('H:i'); ?>", 
        "start_time": "<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $event->start_date);  echo $date->format('H:i'); ?>", 
        "name": "<?php echo $event->name; ?>",
        "id": "<?php echo $event->id; ?>",
        "type": "<?php echo $event->type; ?>",
        "urgency": "<?php echo $event->urgency; ?>"},
      <?php endforeach; ?>
      ]
      
      for (i = 0; i < event_notifications.length; i++) { 

        var event = event_notifications[i]
        var now = moment();
        var end_date = moment(event['end_date'],'YYYY-MM-DD HH:mm');
        var start_date = moment(event['start_date'],'YYYY-MM-DD HH:mm');
        var end_time = moment(event['end_time'],'HH:mm');
        var start_time = moment(event['start_time'],'HH:mm');
        
        
        var id = event['id'];
        // console.log('end_date',end_date.format('HH:mm'))
        var tmp_start_date = start_date
        var tmp_start_time = start_time
        var tmp_end_time = end_time 
        var tmp_end_date = end_date
        
        event.notify_time = []

        console.log("Nome evento:", event.name);
        console.log("Inizia alle:", event.start_date);
        console.log("Finisce alle:", event.end_date)
        console.log("Notifica alle:", event.notify_time);
        console.log("Tipologia evento:", event.type);
        console.log("Urgenza:", event.urgency);
        console.log("id:", event.id);
       

        var days_duration = moment.duration(end_date.diff(moment()));
        var hours = parseInt(days_duration.asHours());
        var minutes = parseInt(days_duration.asMinutes());
        var days_duration1 = moment.duration(start_date.diff(moment()));
        var hours1 = parseInt(days_duration1.asHours());
        var minutes1 = parseInt(days_duration1.asMinutes());
        

        
        // if( event.urgency == "3" ){
        //   if( hours < 20 && now < end_date && now > start_date){
        //     console.log("Finisce oggi");
        //       while( now < tmp_end_time ){
        //         event.notify_time.push(tmp_end_time.format('HH:mm'))
        //         tmp_end_time = tmp_end_time.add(-1, 'hours')
        //       }
        //   }
        //  } 

        // Massima urgenza e Data Breach
          if ( event.type == "1"){
            if (now < end_date && now > start_date) {
              console.log("Non finisce oggi");
              tmp_end_counter = moment().add(3, 'days')
              while( moment().format('YYYY-MM-DD HH:mm') < tmp_end_counter.format('YYYY-MM-DD HH:mm') ){
                event.notify_time.push(tmp_end_date.format('HH:mm'))
                tmp_end_date = tmp_end_date.add(-1, 'hours')
                tmp_end_counter = tmp_end_counter.add(-1, 'hours')
              }
            } 
          }

        // Massima urgenza
        if ( event.urgency == "3" ){
          if (now < start_date) {
                tmp_start_counter = moment().add(1, 'days')
                while( moment().format('YYYY-MM-DD HH:mm') <= tmp_start_counter.format('YYYY-MM-DD HH:mm') ){
                  event.notify_time.push(tmp_start_date.format('HH:mm'))
                  tmp_start_date = tmp_start_date.add(-1, 'hours')
                  tmp_start_counter = tmp_start_counter.add(-1, 'hours')
              }
            }
          } 

          // if (now < start_time) {
          //   //  console.log("Non finisce oggi");
          //   //  tmp_end_counter = moment().add(1, 'days')
          //   
          


        // Urgente modificare
        if( event.urgency == "2"){
          if(now < start_date){
           event.notify_time.push('10:00')
           event.notify_time.push('15:30')
          }
        }

        // Non urgente
        if( event.urgency == "1"){
          if(now < start_date){
           event.notify_time.push(start_date.add(-1, 'hours').format('HH:mm'))
          }
        }        
        console.log('@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@')
      }
      
      

      function setNotifications(){
        var now_time = moment().format('HH:mm');
        
        for (j = 0; j < event_notifications.length; j++) { 
          
          console.log(event_notifications[j]);
          console.log(event_notifications[j].id);
         
          if(event_notifications[j].notify_time.includes(now_time)){


            // Data Breach
            if ( event_notifications[j].type == '1' /*&& event_notifications[j].urgency == '3'*/) {

              var duration = moment.duration(moment(event_notifications[j].end_date,'YYYY-MM-DD HH:mm').diff(moment()));
              var hours = parseInt(duration.asHours());
              hours = hours + 1;
              var minutes = parseInt(duration.asMinutes());
              var noty_type = 'error'
              var notification_id = event['id']+'-'+hours
              var already_showed_notifications = Noty_getCookie().split('|');

              if(!already_showed_notifications.includes(notification_id)){              
                if ( hours < 2 ) {
                  new Noty({
                  text: "Mancano "+minutes+" minuti alla scadenza dell'evento '"+event_notifications[j].name+"'",
                  layout   : 'topRight',
                  theme    : 'relax',
                  type : noty_type,
                  closeWith: ['click','button'],
                  
                  callbacks: {
                    onShow: function() {
                    },
                    onClose: function() {
                      Noty_setCookie(Noty_getCookie()+'|'+notification_id)
                    },
                  },
                  animation: {
                  open : 'animated fadeInRight',
                  close: 'animated fadeOutRight'
                  }
                  }).show();

                } else {
                    new Noty({
                    text: "Mancano "+hours+" ore alla scadenza dell'evento '"+event_notifications[j].name+"'",
                    layout   : 'topRight',
                    theme    : 'relax',
                    type : noty_type,
                    closeWith: ['click', 'button'],
                    
                    callbacks: {
                        onShow: function() {
                        },
                        onClose: function() {
                          Noty_setCookie(Noty_getCookie()+'|'+notification_id)
                        },
                    },
                    animation: {
                    open : 'animated fadeInRight',
                    close: 'animated fadeOutRight'
                    }
                    }).show();
                }
              }

              // Urgente
             } else if (event_notifications[j].urgency == '2'){

                 var noty_type = 'warning'
                 var notification_id = event['id']
                 var already_showed_notifications = Noty_getCookie().split('|');

                 if(!already_showed_notifications.includes(notification_id)){ 
                  new Noty({
                    text: "L'evento '"+event_notifications[j].name+"' inizia alle ore: '"+event_notifications[j].start_time+"'",
                    layout   : 'topRight',
                    theme    : 'relax',
                    type : noty_type,
                    closeWith: ['click', 'button'],
                    callbacks: {
                        onShow: function() {
                        },
                        onClose: function() {
                          Noty_setCookie(Noty_getCookie()+'|'+notification_id)
                        },
                    },
                    animation: {
                    open : 'animated fadeInRight',
                    close: 'animated fadeOutRight'
                    }
                    }).show();
                  }
                
                  

              
              } else {            /*if (event_notifications[j].urgency == '1' || event_notifications[j].urgency == '3' )*/

              var duration1 = moment.duration(moment(event_notifications[j].start_date,'YYYY-MM-DD HH:mm').diff(moment()));
              var hours1 = parseInt(duration1.asHours());
              hours1 = hours1 + 1;
              var minutes1 = parseInt(duration1.asMinutes());

              if(event_notifications[j].urgency == '3'){
                var noty_type = 'error'
              }
              
              if(event_notifications[j].urgency == '1'){
                var noty_type = 'alert'
              hours1 = 1
              }

              var notification_id1 = event['id']+'-'+hours1
              var already_showed_notifications = Noty_getCookie().split('|');

              if(!already_showed_notifications.includes(notification_id1)){
                if ( hours1 < 2){
                  new Noty({
                  text: "Mancano "+minutes1+" minuti all'inizio dell'evento '"+event_notifications[j].name+"'",
                  layout   : 'topRight',
                  theme    : 'relax',
                  type : noty_type,
                  closeWith: ['click', 'button'],
                  callbacks: {
                    onShow: function() {
                    },
                    onClose: function() {
                      Noty_setCookie(Noty_getCookie()+'|'+notification_id1)
                    },

                  },
                  animation: {
                  open : 'animated fadeInRight',
                  close: 'animated fadeOutRight'
                  }
                  }).show();

                } else {
                new Noty({
                text: "Mancano "+hours1+" ore all'inizio dell'evento '"+event_notifications[j].name+"'",
                layout   : 'topRight',
                theme    : 'relax',
                type : noty_type,
               
                closeWith: ['click', 'button'],
                callbacks: {
                    onShow: function() {
                    },
                    onClose: function() {
                      Noty_setCookie(Noty_getCookie()+'|'+notification_id1)
                    },
                },
                animation: {
                  open : 'animated fadeInRight',
                  close: 'animated fadeOutRight'
                }
              }).show();
              } 
              }
            }
          }
        }
      };

      setNotifications();

      setInterval(function(){ 
        setNotifications();
      }, 20000);
      
    });
    
</script>
</footer>
<body>
<html>