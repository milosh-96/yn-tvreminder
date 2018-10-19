self.addEventListener('push', function(event) {
    console.log('[Service Worker] Push Received.');
    console.log("[Service Worker] Push had this data");
  
    let data = event.data.json();
      let title = data.title;
      let options = {
        body: data.body,
        icon: 'images/logo.png',
        badge:'images/logo.png',
        image:data.image
      };
   

    event.waitUntil(self.registration.showNotification(title,options));
  });
  