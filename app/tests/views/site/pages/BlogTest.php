<?php

class BlogTest extends BaseControllerTestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexResponse()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());
    }


    public function testBlogPostTitle()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertCount(1, $crawler->filter('h4:contains("In Iisque Similique Reprimique Eum")'));
    }

    public function testFirstArticleLink()
    {
        $crawler = $this->client->request('GET', '/');

        $link = $crawler->selectLink('In Iisque Similique Reprimique Eum')->link();

        $url = $link->getUri();

        $this->assertEqualsUrlPath($url, 'in-iisque-similique-reprimique-eum');
    }

    public function testBlogPostTitle2()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertCount(1, $crawler->filter('h4:contains("Vivendo Suscipiantur Vim Te Vix")'));
    }

    public function testFirstArticleLink2()
    {
        $crawler = $this->client->request('GET', '/');

        $link = $crawler->selectLink('Vivendo Suscipiantur Vim Te Vix')->link();

        $url = $link->getUri();

        $this->assertEqualsUrlPath($url, 'vivendo-suscipiantur-vim-te-vix');
    }

    public function testBlogPostTitle3()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertCount(1, $crawler->filter('h4:contains("Lorem Ipsum Dolor Sit Amet")'));
    }

    public function testFirstArticleLink3()
    {
        $crawler = $this->client->request('GET', '/');

        $link = $crawler->selectLink('Lorem Ipsum Dolor Sit Amet')->link();

        $url = $link->getUri();

        $this->assertEqualsUrlPath($url, 'lorem-ipsum-dolor-sit-amet');
    }

}