/*global angular*/
(function () {
    "use strict";

    var app = angular.module('myApp', ['ng-admin']);

    app.controller('main', function ($scope, $rootScope, $location) {
        $rootScope.$on('$stateChangeSuccess', function () {
            $scope.displayBanner = $location.$$path === '/dashboard';
        });
    });

    app.directive('testEditLink', function () {
        return {
            restrict: 'E',
            template: '<a class="btn btn-warning btn-xs" ng-href="http://hoidapyhoc.com/quiz/edit/{{entry.values.id}}">' +
                '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Sửa</a>'
        };
    });
    app.directive('testShowLink', function () {
        return {
            restrict: 'E',
            template: '<a class="btn btn-primary btn-xs" ng-href="http://hoidapyhoc.com/quiz/t/{{entry.values.slug}}">' +
                '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;Xem</a>'
        };
    });
    app.directive('color', function () {
        return {
            restrict: 'E',
            template: '<span class="btn btn-primary btn-xs" style="background: #{{entry.values.color}}">' +
                '#{{entry.values.color}}</span>'
        };
    });
    app.directive('createdAt', function () {
        return {
            restrict: 'E',
            template: '<span>{{entry.values.created_at.date}}</span>'
        };
    });

    /* Pass csrf token to X-CSRF-TOKEN header on every request */
    app.config(['$httpProvider',function($httpProvider){
        $httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = document.getElementsByTagName('csrf')[0].getAttribute("content")
    }]);

    app.config(function (NgAdminConfigurationProvider, Application, Entity, Field, Reference, ReferencedList, ReferenceMany) {
        function truncate(value) {
            if (!value) {
                return '';
            }
            return value.length > 40 ? value.substr(0, 40) + '...' : value;
        }
        function transformParams (params) {
            params._sort = 'name';
            return params;
        }
        function dateParser(value){
            console.log(value.date);
            return value.date;
        }
        var app = new Application('ng-admmin Admin CP') // application main title
            // remember to change the following to your api link
            .baseApiUrl('http://localhost/laravel-ngadmin/public/api/')
            .transformParams(function(params) {
                // Default parameters to override: page, per_page, q, _sort, _sortDir.
                if (typeof params._sort === 'undefined') {
                    params._sort = 'id';
                }
                return params;
            });

        var user = new Entity('users');
        var role = new Entity('roles');
        var permission = new Entity('permissions');

        app
            .addEntity(user)
            .addEntity(role)
            .addEntity(permission);

        /*
         * Menu View
         */
        user.menuView().icon('<i class="glyphicon glyphicon-user"></i> ');

        role.dashboardView().disable();
        permission.dashboardView().disable();

        permission.listView()
            .title('All permissions')
            .addField(new Field('id'))
            .addField(new Field('name')
                .isDetailLink(true)
            )
            .addField(new Field('display_name')
                .label('Display Name')
                .isDetailLink(true)
            )

        /*
         * Role section
         *
         */
        role.listView()
            .title('All roles')
            .addField(new Field('id'))
            .addField(new Field('name').isDetailLink(true))
            .addField(new Field('count').label('# of Users'))
            .addField(new Field().type('template').label('Created Date')
                .template('<created-at></created-at>')
            )
            .listActions(['edit', 'delete']);
        role.creationView()
            .addField(new Field('name').validation({required: true, minlength: 3}) )
            .addField(new ReferenceMany('permissions')
                .targetEntity(permission)
                .targetField(new Field('display_name'))
            )
        role.editionView()
            .addField(new Field('name').validation({required: true, minlength: 3}) )
            .addField(new ReferenceMany('permissions')
                .targetEntity(permission)
                .targetField(new Field('display_name'))
            )

        /*
         * User section
         *
         */
        user.filterView()
            .addField( new Field('query').label('Search').attributes({placeholder: 'Name / Email'}) );

        user.dashboardView()
            .title('New User')
            .order(3)
            .limit(10)
            .addField(new Field('id').label('ID'))
            .addField(new Field('username'))
            .addField(new Field('name'));

        user.listView()
            .infinitePagination(true)
            .title('All users')
            .addField(new Field('id'))
            .addField(new Field('username'))
            .addField(new Field('email'))
            .filterQuery(function(searchQuery) {
                return { q: searchQuery };
            })
            .listActions(['edit', 'delete']);

        user.editionView()
            .title('Edit user "{{ entry.values.user }}"')
            .actions(['list', 'delete'])
            .addField(new Field('id'))
            .addField(new Field('username'))
            .addField(new Field('email'));

        NgAdminConfigurationProvider.configure(app);
    });
}());
