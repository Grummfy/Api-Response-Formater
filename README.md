# Api Response Formater
This project wants to help people generate output from api without the need to think to one unique format of output.

[![Build Status](https://travis-ci.org/Grummfy/Api-Response-Formater.svg)](https://travis-ci.org/Grummfy/Api-Response-Formater)

## Key concept
Split between data and they representation. One side you have a set of container and the other side a builder, a format information and a renderer. 

## Collection+Json formatter
[Collection+json format documentation](http://amundsen.com/media-types/collection/)

### Support
* version : OK
* data :
  * item : OK
  * collection of items : OK
* links
  * self representation link : OK
  * collection of related links : OK
* error : OK
* representation help :
  * queries : KO
  * templates : KO
  * update templates : na
