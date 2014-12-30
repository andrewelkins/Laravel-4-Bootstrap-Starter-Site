<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ng-admin Admin CP for Laravel 4 Bootstrap Starter Site</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="bower_components/ng-admin/build/ng-admin.min.css">
    <link rel="stylesheet" href="style.css">
    <csrf content="{{ csrf_token() }}">
</head>

<body ng-app="myApp" ng-controller="main">
<div ui-view></div>
<script src="bower_components/angular/angular.js" type="text/javascript"></script>
<script src="bower_components/ng-admin/build/ng-admin.min.js" type="text/javascript"></script>
<script src="app.js" type="text/javascript"></script>
</body>
</html>
