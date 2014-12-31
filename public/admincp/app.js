/*global angular*/
(function () {
    "use strict";

    var app = angular.module('myApp', ['ng-admin']);

    app.controller('main', function ($scope, $rootScope, $location) {
        $rootScope.$on('$stateChangeSuccess', function () {
            $scope.displayBanner = $location.$$path === '/dashboard';
        });
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

        var app = new Application('ng-admin Admin CP') // application main title
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
        var post = new Entity('posts');
        var comment = new Entity('comments');

        app
            .addEntity(post)
            .addEntity(comment)
            .addEntity(user)
            .addEntity(role)
            .addEntity(permission);

        /*
         * Menu View
         */
        user.menuView().icon('<i class="glyphicon glyphicon-user"></i> ');
        post.menuView().icon('<i class="glyphicon glyphicon-list-alt"></i> ');
        comment.menuView().icon('<i class="glyphicon glyphicon-comment"></i> ');

        /*
         * Post section
         *
         */
        post.dashboardView()
            .title('Blog Post')
            .order(1)
            .limit(10)
            .addField(new Field('id'))
            .addField(new Field('title').isDetailLink(true))

        post.creationView()
            .addField(new Field('title').validation({required: true, minlength: 3}) )
            .addField(new Field('content').type('wysiwyg').validation({required: true, minlength: 3}) )
            .addField(new Field('meta_title').defaultValue(''))
            .addField(new Field('meta_description').defaultValue(''))
            .addField(new Field('meta_keywords').defaultValue(''))

        post.editionView()
            .addField(new Field('title').validation({required: true, minlength: 3}) )
            .addField(new Field('content').type('wysiwyg').validation({required: true, minlength: 3}) )
            .addField(new Field('meta_title'))
            .addField(new Field('meta_description'))
            .addField(new Field('meta_keywords'))
            .addField(new ReferencedList('comments')
                .targetEntity(comment)
                .targetReferenceField('post_id')
                .targetFields([
                    new Field('id'),
                    new Field('content').label('Comment'),
                    new Field('created_at').type('template').label('Created Date')
                        .template('<created-at></created-at>')
                ])
            )
        post.showView()
            .addField(new Field('title').validation({required: true, minlength: 3}) )
            .addField(new Field('content').type('wysiwyg').validation({required: true, minlength: 3}) )
            .addField(new Field('meta_title'))
            .addField(new Field('meta_description'))
            .addField(new Field('meta_keywords'))
            .addField(new ReferencedList('comments')
                .targetEntity(comment)
                .targetReferenceField('post_id')
                .targetFields([
                    new Field('id'),
                    new Field('content').label('Comment'),
                    new Field('created_at').type('template').label('Created Date')
                        .template('<created-at></created-at>')
                ])
            )

        post.listView()
            .addField(new Field('id'))
            .addField(new Field('title'))
            .addField(new Field('content').map(truncate).isDetailLink(true))
            .addField(new Field('created_at').type('template').label('Created Date')
                .template('<created-at></created-at>'))
            .listActions(['show','edit', 'delete']);

        /*
         * Comment section
         *
         */
        comment.dashboardView()
            .title('Recent Comment')
            .order(1)
            .limit(10)
            .addField(new Field('id'))
            .addField(new Field('content').isDetailLink(true))

        comment.creationView().disable()

        comment.editionView()
            .addField(new Field('content').type('wysiwyg').validation({required: true, minlength: 3}) )

        comment.showView()
            .addField(new Field('content').type('wysiwyg'))
            .addField(new Reference('post_id')
                .label('Post title')
                .targetEntity(post)
                .targetField(new Field('title'))
            )
            .addField(new Reference('user_id').label('User')
                .targetEntity(user)
                .targetField(new Field('username'))
            )

        comment.listView()
            .title('All comments')
            .addField(new Field('id'))
            .addField(new Field('content')
                .isDetailLink(true)
                .map(truncate)
            )
            .addField(new Reference('post_id').label('Post title')
                .label('Post title')
                .targetEntity(post)
                .targetField(new Field('title'))
            )
            .addField(new Reference('user_id').label('User')
                .targetEntity(user)
                .targetField(new Field('username'))
            )
            .addField(new Field().type('template').label('Created Date')
                .template('<created-at></created-at>')
            )
            .listActions(['show','edit', 'delete']);

        /*
         * Role section
         *
         */
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
            .listActions(['edit', 'delete']);

        permission.creationView()
            .addField(new Field('name').validation({required: true, minlength: 3}) )
            .addField(new Field('display_name').validation({required: true, minlength: 3}) )

        permission.editionView()
            .addField(new Field('name').validation({required: true, minlength: 3}) )
            .addField(new Field('display_name').validation({required: true, minlength: 3}) )

        /*
         * Role section
         *
         */
        role.dashboardView().disable();
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
