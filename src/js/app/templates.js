angular.module('synthApp').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('contact-us.html',
    "<div id=contact-us><div class=container><h3 class=title>{{title}}</h3><div class=content>{{content}}</div><div class=\"link synth-circle\"><a href={{link}}>{{linkContent}}</a></div></div></div>"
  );

}]);
