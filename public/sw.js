self.addEventListener('push', function(event) {
    console.log('[Service Worker] Push Received.');
    console.log("[Service Worker] Push had this data");
  
    const title = 'Bejzbol: Astros - Red Sox';
    const options = {
      body: 'The event start in 15 minutes (16:03) on Arena Sport 2!',
      icon: 'images/logo.png',
      badge:'images/logo.png'
    };

    console.log(title);
    event.waitUntil(self.registration.showNotification(title,options));
  });
  