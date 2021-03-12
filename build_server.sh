#!/usr/bin/env bash

COMMITS=`git log -3 --format='%H'`
i=0
commit_1=''
commit_2=''
while IFS= read -r line
do
if [ "$i" = '0' ]; then
commit_1="$line"
else
commit_2="$line"
fi
echo "I: $i"
i=$((i+1))
done < <(echo "$COMMITS")

echo "Commits considered: $commit_1 $commit_2"

LIST=`git diff --name-status $commit_2..$commit_1`

echo "$LIST"

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
elif [ "$file_mode" == 'D' ]; then
    file_path="${line:2:80}"
    directory_name=`dirname "$file_path"`
    file_name=`basename "$file_path"`
    echo "$directory_name"

    if [ -d "${directory_name}" ]; then
        lftp -c "open -u javawebmaster,$STAGING_FTP_PASSWORD 134.209.85.146; set ssl:verify-certificate no; rmdir /buildyourbox/$directory_name"
    else
        lftp -c "open -u javawebmaster,$STAGING_FTP_PASSWORD 134.209.85.146; set ssl:verify-certificate no; cd /buildyourbox/$directory_name; delete $file_path"
    fi
fi
done < <(echo "$LIST")