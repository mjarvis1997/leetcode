#!/bin/bash
echo "Welcome to Jarvis's leetcode solutions! What language would you like to see?"
echo */ | sed 's/[=/]//g'

read language

if [[ $language == 'python' ]];
then
python3 python/main.py
elif [[ $language == 'php' ]];
then
php php/main.php
fi