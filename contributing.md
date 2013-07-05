# How to Contribute

We are doing this starter site project for the community and it can only grow so much without it's support. Here are a few guidelines we would like the contributors to follow to help us keep track.

## Getting Started

* Make sure you have a [GitHub](https://github.com/signup/free) account.
* Submit an [issue](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues/new) for your contribution. The issue name starts with the type of pull request, either ***[feature]*** or ***[hotfix]***, followed by a short description. Then a longer description of what you plan on doing.
* Fork the repository on GitHub.

## Make Your Changes

* Create a feature/featurename or a hotfix/versionnumber branch on your fork.
	* ***Features*** branch off ***develop***.
	* ***Hotfixes*** branch off ***master***.
	* Ask in your issue ticket before targeting a ***release*** branch.
	* Quick way to start your feature branch, `git branch feature/myfeature develop` then `git checkout feature/myfeature`.
	* Add an upstream remote towards our repository so you can fetch and merge changes made to the `develop` or `master` branch.
* Commit often and in logical units.
* We are moving to [Codeception](http://codeception.com/) for our testing suite. Add tests to your changes. Only refactoring and documentation changes require no new tests. (This will be edited once the tests are refactored into Codeception suite)
* These tests must fail without your code, and pass with it.
* Update the `readme.md` if it is affected by your changes.

## Submit Your Changes

* Push the branch you worked on to your fork.
* Submit a pull request on the right branch. `develop` for features, `master` for hotfixes. Make sure to reference the initial issue you opened with `closes #xxx` in your pull request message.
* That's it, the pull request will be discussed and merged.

# Contributing with Git flow

This part of the contributing guidelines will be for official contributors to the project, as a cheat sheet reference. But you can also use those tools when you work on your fork or your own project. Just as we try to build a Laravel 4 starter site project, this could be a good guide to help structure the git and git hub workflow in your projects.

## Get The Tools

We follow the Git Flow model and suggest getting the [Git-Flow](https://github.com/nvie/gitflow) tools.
You can find a explanation of this specific workflow [here](http://nvie.com/posts/a-successful-git-branching-model/).

You might also want to read this [blog](http://mislav.uniqpath.com/2013/02/merge-vs-rebase/) by Mislav from GitHub about rebasing and merging with no-ff flag, which is exactly what GitHub is doing when using the pull request and merge feature.

## Initialization

Clone the project:

	git clone git@github.com:andrew13/Laravel-4-Bootstrap-Starter-Site.git project
	cd project
	git flow init -d

This will initialize git flow tools on your machine for the current project with sensible defaults.

`git branch -a` (hint: or `gba` if you have git plugin on oh-my-zsh) will give you an idea of what features or hotfixes are already being worked on.

## Feature Branches

As with regular pull request, start by making an [issue](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues/new) for your contribution.

Start a new feature on your local repository.

	git flow feature start MyFeature

This creates a new branch called feature/MyFeature, off of the latest `develop` branch.

Once you feel the feature is ready to be shared and discussed, publish it.

	git flow feature publish MyFeature

This will create the feature branch on the GitHub repository and track it. Others can now see it when they `git branch -a`.

If you want to contribute to a feature already published to GitHub that is named feature/SomeFeature.

	git flow feature pull SomeFeature

This will pull, track and checkout the feature branch.

Keep working on the newly created feature/SomeFeature just like you would if you had started it.

Before pushing your changes on the repository do a pull --rebase, then push the feature.

	git pull --rebase origin feature/SomeFeature
	git push origin feature/SomeFeature

Once you feel your feature is ready do not use the git flow feature finish command! Instead create a pull request from the `feature` branch to the `develop` branch referencing the initial issue #xxx. It will then be discussed, corrected and merged. It is better if the feature is merged by someone else that you assigned to the pull request.

## Hotfix Branches

These are handled in the same manner as `feature` branches. Only differences are that you will be working on the `master` branch and hotfixes are named after version numbers. Make sure your `master` local repository is up to date.

	git checkout master
	git pull origin master
	git flow hotfix start v.x.x.x

This creates a new branch called hotfix/VersionNumber, off of the latest `master` branch.

## Release Branches

Again just like `feature` branches, these will start with an issue ticket where the `release` branch will be discussed before it is started. Who ever started the issue will be starting the release branch on his local repository.

	git checkout develop
	git pull origin master
	git flow release start v.x.x.x

Same work flow as a feature. But this time two pull requests will be made on GitHub. One to `develop` and one to `master`. Same guidelines as a feature branch apply.

## Contributor's Workflows

### ~Nekwebdev

I'll first go into the tools I think you really need to be efficient [Git-Flow](https://github.com/nvie/gitflow) and [oh-my-zsh](https://github.com/robbyrussell/oh-my-zsh) with git and git-flow plugins. Git-extras is nice to have but not a part of the day to day workflow for me yet.

There are a TON of aliases and shortcuts built in these tools and with autocompletion there is no need to clutter our brain with all those aliases.... but a few still are worth it.

There is only one Git custom alias I add to my shell initialization script, `.zshrc` in our case with zsh.

`alias gfo="git fetch origin -v"`

I'll try to present all those aliases in a typical workflow.

First I make sure I am up to date and I like verbose too :)

`gfo` <=> `git fetch origin -v`

I see that I need to pull in changes on the feature branch I am working on but I have develop checked out:

`gco feature/featurename` <=> `git checkout feature/featurename`

`ggpur` <=> `git pull --rebase origin feature/featurename`

Remember from the guidelines, always rebase the pull. Now I am up to date and can start making changes. I commit along the way, ya know commit early, commit often...

`gst` <=> `git status` or `gss` <=> `git status -s`

`gca` <=> `git commit -v -a`

Make sure you have your editor configured for git.

I use Sublime Text: `git config --global core.editor "subl -n -w"`

Again the verbose option is nice as you will have the diff output in your editor after the commented block which will help give you context while writing the commit message.

Now I feel ready to push my changes back up to the remote. I will start by making sure I have the last commits that could have been pushed on the remote.

`ggpur` <=> `git pull --rebase origin feature/featurename`

Now I'll prepare my commits before pushing them to the remote.

`grbi` <=> `git rebase -i`

What this does is bring me up to date with the state of the remote the branch tracks and then allow me to easily pick and squash my individual commits to clean it all up before my push. Let's check the logs real quick before the push.

`glo` <=> `git log --oneline`

Looking good, another option is `glg` => `git log --stat --max-count=5`

`ggpush` <=> `git push origin feature/featurename`

What will then happen with the pull request of this feature being merged is a `git merge --no-ff feature/featurename` on the develop branch.

Most of these aliases are initials of the commands and very easy to remember.

Please comment on this page with your own workflows, we will be happy to add them here!