#!/bin/bash

# Fix permissions
chmod -R 777 /app/storage
chmod -R 777 /app/bootstrap/cache

# Ensure logs directory exists
mkdir -p /app/storage/logs
chmod -R 777 /app/storage/logs

# Start supervisord
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
