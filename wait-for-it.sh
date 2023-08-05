#!/bin/bash
# wait-for-it.sh

# This script waits for the specified host and port to be reachable before proceeding.

set -e

host="$1"
port="$2"
shift 2
cmd="$@"

until nc -z "$host" "$port"; do
  >&2 echo "$host:$port is unavailable - sleeping"
  sleep 1
done

>&2 echo "$host:$port is available - executing command"
exec $cmd
