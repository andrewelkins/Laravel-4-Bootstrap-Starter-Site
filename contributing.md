# How to Contribute

We are doing this starter site project for the community and it can only grow so much without it's support. Here are a few guidelines we would like the contributors to follow to help us keep track.

## Getting Started

* Make sure you have a [GitHub](https://github.com/signup/free) account.
* Submit an [issue](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues/new) for your contribution. The issue name starts with the type of pull request, either ***[feature]*** or ***[hotfix]***, followed by a short description. Then a longer description of what you plan on doing.
* Fork the repository on GitHub.

## Make Your Changes

* Create a feature/featurename or a hotfix/hotfixname branch on your fork.
	* ***Features*** branch off ***develop***.
	* ***Hotfixes*** branch off ***master***.
	* Ask in your issue ticket before targeting a ***release*** branch.
	* Quick way to start your feature branch, `git branch feature/myfeature master` then `git checkout feature/myfeature`.
* Commit often and in logical units.
* We are moving to [Codeception](http://codeception.com/) for our testing suite. Add tests to your changes. Only refactoring and documentation changes require no new tests. (This will be edited once the tests are refactored into Codeception suite)
* These tests must fail without your code, and pass with it.
* Update the `readme.md` if it is affected by your changes.

## Submit Your Changes

* Push the branch you worked on to your fork.
* Submit a pull request on the right branch. Develop for features, Master for hotfixes. Make sure to reference the initial issue you opened with `closes #xxx` in your pull request message.
* That's it, the pull request will be discussed and merged.

# Contributing with Git flow

These guidelines will be for official contributors to the project, as a cheat sheet reference.

## Get The Tools

We follow the Git Flow model and I highly suggest getting the [Git-Flow](https://github.com/nvie/gitflow) tools.
You can find a explanation of this specific workflow [here](http://nvie.com/posts/a-successful-git-branching-model/).

## Initialization

Clone the project:

	git clone git@github.com:andrew13/Laravel-4-Bootstrap-Starter-Site.git project
	cd project
	git flow init -d

This will initialize git flow on your machine for the current project with sensible defaults.

`git branch -a` will give you an idea of what features or hotfixes are already being worked on.

## Feature Branches

# New Feature

As with regular pull request, start with by making an [issue](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues/new) for your contribution.

Start a new feature on your local repository.

	git checkout develop
	git pull origin develop
	git flow feature start MyFeature

This creates a new branch called feature/MyFeature, off of the latest develop branch.

Once you feel the feature is ready to be shared and discussed, publish it.

	git flow feature publish MyFeature

This will create the feature branch on the GitHub repository and track it. Now everytime you go back to working on your feature branch locally, make sure it is up to date as others could now be working on it as well.

	git checkout feature/MyFeature
	git pull origin feature/MyFeature

After each commit you make you might want to push your changes as others might also be working on that feature since it has been published.

	git push origin feature/MyFeature

Once you feel your feature is ready do not use the git flow feature finish command! Instead create a pull request from your feature branch to the develop branch. It will then be discussed, corrected and merged. It is better if the feature is merged by someone else that you assigned to the pull request.

# Existing feature

When you `git branch -a` there might be a feature already beign worked on that you would like to checkout and work on as well.

	git flow feature pull SomeFeature

This will pull, track and checkout the feature. Once you have committed some changes push them.

	git push origin feature/SomeFeature

When you come back to working on a feature, make sure you update it first.

	git checkout feature/SomeFeature
	git pull origin feature/SomeFeature

Keep pushing commits, usually the maker of the feature should be the one creating the pull request. In general it is better to wait for a feature to be in a pull request before contributing to it.

## Hotfix Branches

These are handled in the same manner as feature branches. Only differences are that you will be working on the master branch and hotfixes are named after version numbers.

# New Hotfix

	git checkout master
	git pull origin master
	git flow hotfix start VersionNumber

This creates a new branch called hotfix/VersionNumber, off of the latest master branch.

## Release Branches