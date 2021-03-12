#!/usr/bin/env bash

LIST=`git diff --name-status HEAD^^..HEAD`

STAGING_FTP_PASSWORD='?p_M7ZOl'

while IFS= read -r line
do
file_mode="${line:0:1}"
if [ "$file_mode" == 'A' ] || [ "$file_mode" == 'M' ]; then
    file_path="${line:2:80}"
    directory_name=`dirname "$file_path"`
    file_name=`basename "$file_path"`
    echo "$directory_name"

    if [ ! -d "${directory_name}" ]; then
        lftp -c "open -u javawebmaster,$STAGING_FTP_PASSWORD 134.209.85.146; set ssl:verify-certificate no; mirror -R ./$directory_name /buildyourbox/$directory_name"
    else
        lftp -c "open -u javawebmaster,$STAGING_FTP_PASSWORD 134.209.85.146; set ssl:verify-certificate no; cd /buildyourbox/$directory_name; put $file_path"
    fi
fi
done < <(echo "$LIST")