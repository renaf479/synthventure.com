angular.module('synthApp').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('contact-us.html',
    "<div id=contact-us data-in-view=lineInView($inview)><div class=container><h3 class=title>{{title}}</h3><div class=content>{{content}}</div><a href={{link}} class=link>{{linkContent}}</a></div></div>"
  );

}]);
