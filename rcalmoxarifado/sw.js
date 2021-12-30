/*var VERSION = '91';
this.addEventListener('install', function(e) {
    e.waitUntil(caches.open(VERSION).then(cache => {
        return cache.addAll([  
                       'login_novo.php',
                       
                     
                       
                       
    
    
    ]);
    }))
});
this.addEventListener('fetch', function(e) {
    var tryInCachesFirst = caches.open(VERSION).then(cache => {
        return cache.match(e.request).then(response => {
            if (!response) {
                return handleNoCacheMatch(e);
            }
            fetchFromNetworkAndCache(e);
            return response
        });
    });
    e.respondWith(tryInCachesFirst);
});
this.addEventListener('activate', function(e) {
    e.waitUntil(caches.keys().then(keys => {
        return Promise.all(keys.map(key => {
            if (key !== VERSION)
                return caches.delete(key);
        }));
    }));
});

function fetchFromNetworkAndCache(e) {
    if (e.request.cache === 'only-if-cached' && e.request.mode !== 'same-origin') return;
    return fetch(e.request).then(res => {
        if (!res.url) return res;
        if (new URL(res.url).origin !== location.origin) return res;
        return caches.open(VERSION).then(cache => {
            return res;
        });
    }).catch(err => console.error(e.request.url, err));
}

function handleNoCacheMatch(e) {
    return fetchFromNetworkAndCache(e);
}*/
// 2ª versao do sw
const CACHE_NAME = 'offline';
const OFFLINE_URL = 'offline.php';

self.addEventListener('install', function(event) {
  console.log('[ServiceWorker] Install');
  
  event.waitUntil((async () => {
    const cache = await caches.open(CACHE_NAME);
    // Setting {cache: 'reload'} in the new request will ensure that the response
    // isn't fulfilled from the HTTP cache; i.e., it will be from the network.
    await cache.add(new Request(OFFLINE_URL, {cache: 'reload'}));
  })());
  
  self.skipWaiting();
});

self.addEventListener('activate', (event) => {
  console.log('[ServiceWorker] Activate');
  event.waitUntil((async () => {
    // Enable navigation preload if it's supported.
    // See https://developers.google.com/web/updates/2017/02/navigation-preload
    if ('navigationPreload' in self.registration) {
      await self.registration.navigationPreload.enable();
    }
  })());

  // Tell the active service worker to take control of the page immediately.
  self.clients.claim();
});

self.addEventListener('fetch', function(event) {
  // console.log('[Service Worker] Fetch', event.request.url);
  if (event.request.mode === 'navigate') {
    event.respondWith((async () => {
      try {
        const preloadResponse = await event.preloadResponse;
        if (preloadResponse) {
          return preloadResponse;
        }

        const networkResponse = await fetch(event.request);
        return networkResponse;
      } catch (error) {
        console.log('[Service Worker] Fetch failed; returning offline page instead.', error);

        const cache = await caches.open(CACHE_NAME);
        const cachedResponse = await cache.match(OFFLINE_URL);
        return cachedResponse;
      }
    })());
  }
});

