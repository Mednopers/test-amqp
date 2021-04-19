Symfony AMQP application
========================

Simple symfony application

Installation
------------

Clone repository with Git, switch to the directory and run:

```bash
$ make init
```

It'll install dependencies

Run containers with:
```bash
$ make up
```

Add database migrations:
```bash
$ make db-migrate
```

Usage
-----

There is no need to configure a virtual host in your web server just use:

```bash
$ make up
```

It will start a built-in web server for the application at <http://localhost:8080>.

To stop containers use:

```bash
$ make down
```

To get more info use:

```bash
$ make help
```
