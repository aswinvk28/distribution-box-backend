#!/usr/bin/env bash

LIST=`git diff --name-status HEAD^^..HEAD`

while IFS= read -r line
do
file_mode="${line:0:1}"
file_path="${line}"
cut -f1 $file_path
done < <(echo "$LIST")