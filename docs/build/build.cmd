@echo off

SET API_VERSION=1.0.0
SET API_VERSION_HYPHEN=1-0-0

cd ..
SET SRC_PATH=%cd%\src
SET OUTPUT_PATH=%cd%\output
cd build
SET API_DEFINITION=perftest-v%API_VERSION%.apib
SET OUTPUT_FILENAME=perftest-v%API_VERSION%.html
SET TEMPLATE_OUTPUT_FILENAME=perftest-v%API_VERSION_HYPHEN%.blade.php

docker run --rm -v %SRC_PATH%:/tmp/input/ -v %OUTPUT_PATH%:/tmp/output/ -t aglio -i /tmp/input/%API_DEFINITION% -o /tmp/output/%OUTPUT_FILENAME%  --theme-full-width --theme-template triple --theme-variables flatly
copy /Y %OUTPUT_PATH%\%OUTPUT_FILENAME% %OUTPUT_PATH%\..\..\src\resources\views\%TEMPLATE_OUTPUT_FILENAME%