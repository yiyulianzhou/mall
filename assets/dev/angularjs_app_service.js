/* ------------------------------------------------------------------------------
 *
 * appService
 * appFactory 中封装一些简单的功能,在appService也可以调用
 *
 * ---------------------------------------------------------------------------- */
app.service('appService',['$rootScope','$http','$q', 'appFactory','common', function($rootScope, $http, $q, appFactory,common) {

    // this.functionName = function(a) {
    //     return appFactory.pagerInit(a);
    // }

}]);
