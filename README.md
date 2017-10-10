# Performance Testing Frontend

## Introduction

This is a frontend service for performance testing that will persist data to a local database
and optionally send data to an external service as well.

You can CRUD data to a simple key/value object store. This is backed by MariaDB. There is a
scheduled task that runs every 24 hours to clear up any data older than 72 hours. The aim of
this is to keep the deployment tidy.

## Requirements

The application requires a [performance testing data router](https://hub.docker.com/r/mintopia/perftest-router/)
and a MariaDB/MySQL database.

## Configuration

You can configure the container using environment variables. The usual Laravel variables are
available as well as some custom ones. The most interesting will be:

 - `DB_HOST` - The hostname of the database server
 - `DB_DATABASE` - The name of the database
 - `DB_USERNAME` - Username for the database
 - `DB_PASSWORD` - Password for the database
 - `PERFTEST_ROUTER` - A URL for the data router, eg. `http://router:8080/send/`

## Usage

There is a basic REST API that returns JSON. The endpoint is at `/data`. Visiting the root of the service
will present the API docs.

## Author

Jessica Smith - <jessica.smith@fasthosts.com>