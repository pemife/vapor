#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE vapor_test;"
    psql -U postgres -c "CREATE USER vapor PASSWORD 'vapor' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists vapor
    sudo -u postgres dropdb --if-exists vapor_test
    sudo -u postgres dropuser --if-exists vapor
    sudo -u postgres psql -c "CREATE USER vapor PASSWORD 'vapor' SUPERUSER;"
    sudo -u postgres createdb -O vapor vapor
    sudo -u postgres psql -d vapor -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O vapor vapor_test
    sudo -u postgres psql -d vapor_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:vapor:vapor"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
