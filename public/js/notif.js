const applicationServerPublicKey = window.Laravel.vapidPublicKey;
const applicationServerPrivate = "AVcyjrus-o_05NbhZbFZZZpu9j3shMZJ553Am1x6AO0";

function urlBase64ToUint8Array(base64String) {
    var padding = '='.repeat((4 - base64String.length % 4) % 4);
    var base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    var rawData = window.atob(base64);
    var outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}



if("serviceWorker" in navigator && "PushManager" in window) {
    //document.getElementById("push-support").innerHTML = navigator.serviceWorker;
    navigator.serviceWorker.register('../sw.js').then(function(swReg) {
        console.log("Service Worker has been registed",swReg);
        swRegistration = swReg;
        checkSubscription();
    }).catch(function(error) {
        console.log("Error happened!",error);
    });
}
else {
    console.log("Push Manager not supported");
    //document.getElementById("push-support").style.display = "block";
}

function checkSubscription() {
    swRegistration.pushManager.getSubscription().then(function(subscription) {
        isSubscribed = !(subscription === null);

        if(isSubscribed) {
            console.log("Subscribed.");
        }
        else {
            console.log("Not Subscribed.");
            subscribeUser(subscription);
        }


    });
}


function subscribeUser() {
    const applicationServerKey  = urlBase64ToUint8Array(applicationServerPublicKey);
    
    swRegistration.pushManager.subscribe({
        userVisibleOnly:true,
        applicationServerKey:applicationServerKey
    }).then(function(subscription) {
        console.log("User is subscribed.");
        updateSubscriptionOnServer(subscription);
        isSubscribed = true;
    }).catch(function(err) {
        console.log('Failed to subscribe the user: ', err);
      });
    }

    function updateSubscriptionOnServer(subscription) {
        const key = subscription.getKey('p256dh')
        const token = subscription.getKey('auth')
        console.log(subscription);
        
        const data = {
          user:window.Laravel.user,
          endpoint: subscription.endpoint,
          key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
          token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null
        }

        axios.post('/user/push/subscribe',data)
        .then(() => { this.loading = false })
       
        
        this.loading = true
       
      }
      