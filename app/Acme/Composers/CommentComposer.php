<?php namespace Acme\Composers;

class CommentComposer {

    public function compose($view)
    {

        $viewData = $view->getData();
        if (!\Auth::check()) {
            return $view->nest('commentForm', 'site.partials.comment_auth');
        }

        if (!$viewData['canComment']) {
            return $view->nest('commentForm', 'site.partials.comment_perm');
        }

        return $view->nest('commentForm', 'site.partials.comment_form', $viewData);
    }

}
