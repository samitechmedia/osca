#!/bin/bash
cd $(dirname $0)

env USER_ID="$(id -u)" docker-compose start