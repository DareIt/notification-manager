# Notification manager

Notification manager is a very simple and lightweight library to handle notifications.

# Usage

Most Basic use of the lib
```
 $handlerA = new BasicAHandler('foo');
 $handlerB = new BasicBHandler('bar');

 $map = new InMemoryNotificationHandlerMap();
 $map->mapNotificationToHandler(Basic1Notification::class, $handlerA);
 $map->mapNotificationToHandler(Basic2Notification::class, $handlerB);
 $map->mapNotificationToHandler(Basic3Notification::class, $handlerB);

 $notificationManager = new NotificationManager($map);

 $notification1 = new Basic1Notification('foo1', 'bar1');
 $notificationManager->dispatch($notification1);

 $notification2 = new Basic3Notification('foo2', 'bar2');
 $notificationManager->dispatch($notification2);

 $notification3 = new Basic3Notification('foo3', 'bar3');
 $notificationManager->dispatch($notification3);

 $notification4 = new Basic1Notification('foo11', 'bar11');
 $notificationManager->dispatch($notification4);
```