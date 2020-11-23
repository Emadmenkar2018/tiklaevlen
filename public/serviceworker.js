var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/public/css/app.css',
    '/public/js/app.js',
    '/public/images/icons/s.png',
    '/public/images/icons/m.png',  
    '/public/images/icons/l.png',
    '/public/images/icons/xl.png', 
]
//     '/images/icons/splash-1242x2208.png',
//     '/images/icons/splash-1125x2436.png',
//     '/images/icons/splash-828x1792.png',
//     '/images/icons/splash-1242x2688.png',
//     '/images/icons/splash-1536x2048.png',
//     '/images/icons/splash-1668x2224.png',
//     '/images/icons/splash-1668x2388.png',
//     '/images/icons/splash-2048x2732.png'
// ];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            }).catch(err =>{
                console.log(err)
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});