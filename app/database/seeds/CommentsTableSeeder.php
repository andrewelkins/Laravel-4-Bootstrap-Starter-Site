<?php

class CommentsTableSeeder extends Seeder {

    protected $content1 = 'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.';
    protected $content2 = 'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.';
    protected $content3 = 'Et consul eirmod feugait mel! Te vix iuvaret feugiat repudiandae. Solet dolore lobortis mei te, saepe habemus imperdiet ex vim. Consequat signiferumque per no, ne pri erant vocibus invidunt te.';


    public function run()
    {
        DB::table('comments')->delete();

        $user_id = User::first()->id;
        $post_id = Post::first()->id;

        DB::table('comments')->insert( array(
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id,
                'content'    => $this->content2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id,
                'content'    => $this->content3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id+1,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id+1,
                'content'    => $this->content2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'user_id'    => $user_id,
                'post_id'    => $post_id+2,
                'content'    => $this->content1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ))
        );
    }

}
