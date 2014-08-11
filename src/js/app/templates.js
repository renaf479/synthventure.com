angular.module('synthApp').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('contact-us.html',
    "<div id=contact-us><div class=container><h3 class=title>{{title}}</h3><div class=content>{{content}}</div><div class=\"link synth-circle\"><a href={{link}}>{{linkContent}}</a></div></div></div>"
  );


  $templateCache.put('services-nav.html',
    "<nav class=subNav><div class=container></div></nav>"
  );


  $templateCache.put('synth-button.html',
    "<div class=\"link synth-circle\"><a href={{link}}>{{linkContent}}</a></div>"
  );


  $templateCache.put('synth-logo.html',
    "<svg class=synth-logo version=1.1 id=Layer_1 xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink x=0px y=0px viewbox=\"0 0 462 125.5\" enable-background=\"new 0 0 462 125.5\" xml:space=preserve><g class=s><path d=M59.5,117.9c7.1,0,13.2-2.6,18.3-7.7c5.1-5.1,7.6-11.2,7.6-18.1c0-7-2.5-13-7.6-18.1c-5.1-5.1-11.2-7.7-18.3-7.7H33.4c-9.2,0-17.1-3.3-23.6-9.8C3.3,50,0,42.2,0,33.2c0-9,3.3-16.8,9.8-23.4C16.3,3.3,24.2,0,33.4,0h54.7l0,7.3l-54.8,0c-7.1,0-13.2,2.6-18.3,7.7C10,20.1,7.4,26.2,7.4,33.2c0,7,2.5,13,7.6,18.1c5.1,5.1,11.2,7.7,18.3,7.7h26.1c9.2,0,17.1,3.3,23.6,9.8c6.5,6.5,9.8,14.3,9.8,23.4c0,9-3.3,16.8-9.8,23.4c-6.5,6.5-14.4,9.8-23.6,9.8H0.1v-7.4H59.5z></path><path d=M44,5.5h15.4c0,0-24.8,11.5-26.5,28.6c0,0-2.6,18.3,6.2,25.9h-5C34,60,16.2,28.5,44,5.5z></path><path d=M47.4,119.7H32c0,0,24.8-11.5,26.5-28.6c0,0,2.6-18.3-6.2-25.9h5C57.3,65.2,75.1,96.7,47.4,119.7z></path></g><path d=M372.9,7h7.4l0,30h37.2c12.2,0,22.6,3.7,31.3,12.4c8.8,8.8,13.1,19.2,13.1,31.4v44.5h-7.4V80.9c0-10.1-3.7-18.8-11-26.1c-7.3-7.3-16-11-26.1-11h-37.1v81.6H373L372.9,7z></path><path d=M332.6,113.6c-0.1-1.1-0.1-106.7-0.1-106.7h8.2l0,30.1H353l0,6.6l-12.2,0l0,69.9c0.1,0.5,2,4.8,8,4.7h4.2l0,7.1h-7.9C334.7,124.6,332.8,115.8,332.6,113.6z></path><path d=M223.1,81.3c0-12.1,4.4-22.5,13.1-31.2c8.7-8.7,19.3-13,31.6-13c12.2,0,22.7,4.3,31.5,13c8.8,8.7,13.2,19.1,13.2,31.2v44.2h-7.4V81.3c0-10-3.7-18.7-11-25.9c-7.3-7.3-16.1-10.9-26.2-10.9c-10.2,0-19,3.6-26.3,10.9c-7.3,7.3-10.9,15.9-10.9,25.9v44.2h-7.4V81.3z></path><path d=M203.1,125.5H195l0-26.7h-36.6c-12.2,0-22.8-4.4-31.6-13.1c-8.8-8.8-13.2-19.2-13.2-31.4V37h7.4l0,17.2c0,10.1,3.7,18.8,11,26.1c7.4,7.3,16.1,11,26.3,11h36.5l0-54.3l8.2,0V125.5z></path></svg>"
  );

}]);
