#!/bin/bash

node_modules/apidoc/bin/apidoc -i resources/api-doc -o public/api-doc

cp resources/api-doc/Redefined/index.html public/api-doc/index.html
cp resources/api-doc/Redefined/send_sample_request.js public/api-doc/utils/send_sample_request.js
cp resources/api-doc/Redefined/vendor/crypto-js.min.js public/api-doc/vendor/crypto-js.min.js
cp resources/api-doc/Redefined/vendor/jsencrypt.min.js public/api-doc/vendor/jsencrypt.min.js

