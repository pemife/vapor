#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]; then
    psql -h localhost -U vapor -d vapor < $BASE_DIR/vapor.sql
fi
psql -h localhost -U vapor -d vapor_test < $BASE_DIR/vapor.sql
