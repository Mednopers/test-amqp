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

There is no need to configure a virtual host in your web server.

To run containers use: 
```bash
$ make up
```

To stop containers use:

```bash
$ make down
```

To run development server use:
```bash
$ make server-run
```
The built-in web server will be available at <http://localhost:8080>.

To consume for messages use:
```bash
$ make consume
```

To get more info use:

```bash
$ make help
```
