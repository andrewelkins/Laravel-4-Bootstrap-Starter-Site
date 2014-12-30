<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ng-admmin Admin CP for Laravel 4 Bootstrap Starter Site</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{URL::to('/') }}/assets/ngadmin/vendor/ng-admin.min.css">
    <link rel="stylesheet" href="{{URL::to('/') }}/assets/ngadmin/style.css">
    <csrf content="{{ csrf_token() }}">
    <script src="{{URL::to('/') }}/assets/ngadmin/vendor/angular.min.js"></script>
    <script src="{{URL::to('/') }}/assets/ngadmin/vendor/ng-admin.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/') }}/assets/ngadmin/app.js" type="text/javascript"></script>
</head>

<body ng-app="myApp" ng-controller="main">
<div ui-view></div>
</body>
</html>
