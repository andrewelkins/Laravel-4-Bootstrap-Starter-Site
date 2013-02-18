<?php

class PostsTableSeeder extends Seeder {

    protected $content = 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?

Est hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!

Sed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.

Sed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.

Te amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!

Cu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.

Te dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.

Mutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.

Ex dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!

Te his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?';

    public function run()
    {
        DB::table('posts')->delete();

        $user_id = User::first()->id;

        DB::table('posts')->insert( array(
            array(
                'user_id'    => $user_id,
                'title'      => 'Lorem ipsum dolor sit amet',
                'slug'       => 'lorem-ipsum-dolor-sit-amet',
                'content'    => $this->content,
                'meta_title' => 'meta_title1',
                'meta_description' => 'meta_description1',
                'meta_keywords' => 'meta_keywords1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'    => $user_id,
                'title'      => 'Vivendo suscipiantur vim te vix',
                'slug'       => 'vivendo-suscipiantur-vim-te-vix',
                'content'    => $this->content,
                'meta_title' => 'meta_title2',
                'meta_description' => 'meta_description2',
                'meta_keywords' => 'meta_keywords2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'    => $user_id,
                'title'      => 'In iisque similique reprimique eum',
                'slug'       => 'in-iisque-similique-reprimique-eum',
                'content'    => $this->content,
                'meta_title' => 'meta_title3',
                'meta_description' => 'meta_description3',
                'meta_keywords' => 'meta_keywords3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ))
        );
    }

}
