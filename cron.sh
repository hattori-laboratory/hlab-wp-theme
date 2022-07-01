#/bin/bash

cd `dirname $0`
CWD=$(pwd)

DATE=`TZ='Asia/Tokyo' date`
echo $DATE >> "$CWD/git-cron.log"

git fetch

# Remote branch log
GITREMOTE=$(git log main origin/main --pretty=format:"%H" | head -n 1)

# Local branch log
GITLOCAL=$(git log -n 1 --pretty=format:"%H")

if [ "$GITREMOTE" = "$GITLOCAL" ] ; then
    echo 'no changed' >> "$CWD/git-cron.log"
else
    echo 'Remote branch is changed' >> "$CWD/git-cron.log"
    git pull origin main

    PRDNAME="ホームページ"
    PRDURL="https://www.hattori-lab.cs.teu.ac.jp"
    CMTURL="https://github.com/hattori-laboratory/hlab-wp-theme/commit/"
curl -X POST $(cat .webhookurl) -H 'Content-type: application/json' --data @- <<EOS 
{
    "text": '$PRDNAMEの本番環境が変更されたことをお知らせするのである！\n変更者は必ず<$PRDURL | $PRDNAME>を確認せよ😈🔱\n $(git log --date=iso --pretty=format:"=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n変更者: %an \n[<$CMTURL/%H | %h>] %s\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" -1)' 
} 
EOS
fi