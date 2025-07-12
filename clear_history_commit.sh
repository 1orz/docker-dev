#!/bin/bash

# 清除所有 commit 历史
git checkout --orphan latest_branch
git add .
git commit -m "Initial commit"
git branch -D main
git branch -m main
git push -f origin main