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
            .baseApiUrl('../api/v2/')
            .transformParams(function(params) {
                // Default parameters to override: page, per_page, q, _sort, _sortDir.
                if (typeof params._sort === 'undefined') {
                    params._sort = 'id';
                }
                return params;
            });

        var test = new Entity('tests');
        var user = new Entity('users');
        var category = new Entity('category');
        var role = new Entity('roles');
        var permission = new Entity('permissions');

        app
            .addEntity(test)
            .addEntity(user)
            .addEntity(category)
            .addEntity(role)
            .addEntity(permission);

        /*
         * Menu View
         */
        test.menuView().icon('<i class="glyphicon glyphicon-th"></i> ').title('Đề Thi');
        user.menuView().icon('<i class="glyphicon glyphicon-user"></i> ').title('Thành viên');
        category.menuView().icon('<i class="glyphicon glyphicon-th-large"></i> ');

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


        test.editionView().disable();
        test.dashboardView()
            .title('Recent tests')
            .addField(new Field('id').label('ID'))
            .addField(new Field('questions'))
            .addField(new Field('name').map(truncate))
            .order(1)
            .limit(10);

        test.listView()
            .title('All tests')
            .addField(new Field('id').label('ID'))
            .addField(new Field('name').isDetailLink(true))
            .addField(new Field('questions'))
            .addField(new Reference('user_id').label('Posted by')
                .targetEntity(user)
                .targetField(new Field('username'))

            )
            .addField(new Reference('category_id').label('Subject')
                .targetEntity(category)
                .targetField(new Field('name'))
            )
            .addQuickFilter('File PDF', function () {
                return {
                    is_file: 1
                };
            })
            .addQuickFilter('Not approved', function () {
                return {
                    is_approve: 0
                };
            })
            .addField(new Field()
                .type('template')
                .label('Frontend')
                .template('<test-show-link></test-show-link><test-edit-link></test-edit-link>')
            )
            .listActions(['show', 'edit', 'delete']);

        test.showView()
            .title('Details of "{{ entry.values.name }}"')
            .addField(new Field('id'))
            .addField(new Field('name'))
            .addField(new Reference('user_id').label('User')
                .targetEntity(user)
                .targetField(new Field('username'))
            )
            .addField(new Reference('category_id').label('Subject')
                .targetEntity(category)
                .targetField(new Field('name'))
            )
            .addField(new Field('content').type('wysiwyg'))
            .addField(new Field('is_file').type('boolean').label('File PDF'))
            .addField(new Field('questions'))
            .addField(new Field('description').label('Desc'))
            .addField(new Field()
                .type('template')
                .label('Frontend')
                .template(function () {
                    return '<test-show-link></test-show-link>' +
                        '<test-edit-link></test-edit-link>';
                })
            );
        test.editionView()
            .title('Edit test "{{ entry.values.user }}"')
            .actions(['list', 'show', 'delete'])
            .addField(new Field('id'))
            .addField(new Field('name'))
            .addField(new Field('description').type('wysiwyg'))
            .addField(new Field('is_approve').type('boolean'));

        user.filterView()
            .addField( new Field('query').label('Search').attributes({placeholder: 'Name / Username'}) );

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
            .addField(new Field('id').label('ID'))
            .addField(new Field('name').label('Tên'))
            .addField(new Field('email'))
            .addField(new Field('history').label('Số lần làm bài'))
            .filterQuery(function(searchQuery) {
                return { q: searchQuery };
            })
            .listActions(['show', 'edit', 'delete']);

        user.showView() // a showView displays one entry in full page - allows to display more data than in a a list
            .title('User Info {{ entry.values.username }}')
            .addField(new Field('id'))
            .addField(new Field('name'))
            .addField(new Field('username'))
            .addField(new Field('email'))
            .addField(new Field('avatar'))
            .addField(new Field('history').label('Số lần làm bài'));

        user.editionView()
            .title('Edit user "{{ entry.values.user }}"')
            .actions(['list', 'show', 'delete'])
            .addField(new Field('id'))
            .addField(new Field('name'))
            .addField(new Field('username'))
            .addField(new Field('email'));

        category.dashboardView()
            .title('All subjects')
            .limit(10)
            .addField(new Field('name'))
            .addField(new Field()
                .type('template')
                .label('Color')
                .template('<color></color>')
            );

        category.listView()
            .title('All subjects')
            .addField(new Field('id').label('ID'))
            .addField(new Field('name'))
            .addField(new Field()
                .type('template')
                .label('Color')
                .template('<color></color>')
            )
            .addField(new Field('slug').label('Slug'))
            .listActions(['show', 'edit', 'delete']);

        category.showView()
            .addField(new Field('id'))
            .addField(new Field('name').label('Tên'))
            .addField(new Field('description').label('Mô tả'))
            .addField(new Field('color').label('Màu'))
            .addField(new Field('slug').label('Slug'))
            .addField(new Field()
                .type('template')
                .label('Màu')
                .template(function () {
                    return '<color></color>';
                })
            )
            .addField(new ReferencedList('tests')
                .label('Đề thi')
                .targetEntity(test)
                .targetReferenceField('category_id')
                .targetFields([
                    new Field('id').label('ID'),
                    new Field('name').label('Đề thi').isDetailLink(true)
                ])
            )
        category.creationView()
            .addField(new Field('name').validation({required: true, minlength: 5}) )
            .addField(new Field('description').validation({required: true, minlength: 10}) )
            .addField(new Field('color').label('Color (hex)').validation({required: true, minlength: 6, maxlength: 6}) )
            .addField(new Field('slug').label('Custom Slug').validation({minlength: 8}) )

        category.editionView()
            .title('Edit subject info "{{ entry.values.name }}"')
            .addField(new Field('name'))
            .addField(new Field('description'))
            .addField(new Field('color'))
            .addField(new Field('slug')
                .label('Slug')
                .editable(false)
            )

        NgAdminConfigurationProvider.configure(app);
    });
}());
