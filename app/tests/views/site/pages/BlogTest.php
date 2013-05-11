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

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBlogPostTitle()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertCount(1, $crawler->filter('h4:contains("In Iisque Similique Reprimique Eum")'));
    }

    public function testGetInTouch()
    {
        $crawler = $this->client->request('GET', '/');

        $link = $crawler->selectLink('In Iisque Similique Reprimique Eum')->link();

        $url = $link->getUri();

        $this->assertEqualsUrlPath($url, 'in-iisque-similique-reprimique-eum');
    }

}