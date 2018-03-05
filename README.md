# Notification manager

Notification manager is a very simple and lightweight library to handle notifications.

# Usage

Most Basic use of the lib
```
 $handler = new FooHandler();
 $notification = new FooNotification();
 
 $map = new InMemoryNotificationHandlerMap();
 $map->mapNotificationToHandler($notification, $handler);
 
 $logger = new Logger();
 
 $manager = new NotificationManager($map, $logger);
 $manager->dispatch($notification);

```