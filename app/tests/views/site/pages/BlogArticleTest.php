<?php

class BlogArticleTest extends BaseControllerTestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexResponse()
    {
        $crawler = $this->client->request('GET', '/vivendo-suscipiantur-vim-te-vix');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCommentCountResponse()
    {
        $crawler = $this->client->request('GET', '/vivendo-suscipiantur-vim-te-vix');

        $this->assertCount(1, $crawler->filter('h3:contains("Vivendo suscipiantur vim te vix")'));
    }



}